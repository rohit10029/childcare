
@extends('layout')
@section('content')
        <div class="container">
            <div id="center" >
               
                <form method="post" action= "<?=URL::to('/add-child');?>"  enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="row">
                        <div class="col-sm-12">
                            <input type="text" class="text-line col-sm-12" name="name"  required placeholder="name"/>
                        </div>
                        <br>
                        <div class="col-sm-12">
                            <select class="text-line col-sm-12" name="sex" >
                                <option value=" ">sex</option>
                                <option value="1">male</option>
                                <option value="0">female</option>
                            </select>
                        </div>
                        <br>
                        <div class="col-sm-12">
                            <input type="date" class="text-line col-sm-12" name="dob"   required placeholder="date of birth"/>
                        </div>
                        <div class="col-sm-12">
                            <input type="text" class="text-line col-sm-12" name="father"   required placeholder="father's name"/>
                        </div>
                        <div class="col-sm-12">
                            <input type="text" class="text-line col-sm-12" name="mother"   required placeholder="Mother's name"/>
                        </div>
                        <div class="col-sm-12">
                            <select id="state" class="text-line col-sm-12" name="state" required >
                                <option value="">state</option>
                                <?php for($i=0;$i<count($state);$i++){?>
                                    <option value="<?=$state[$i]->id?>"><?=$state[$i]->name?></option>
                                    <?php } ?>
                            </select>
                        </div>
                        <div class="col-sm-12">
                            <select id="district" class="text-line col-sm-12" name="district" required >
                                <option value="">district</option>
                            </select>
                        </div>
                        <div class="col-sm-12">
                            <div class="upload-btn-wrapper">
                                <button class="btn">Upload a file</button>
                                <input type="file" name="file" accept="image/*" onchange="loadFile(event)">
                                <img id="output" width="50px" height="50px"  class="img-circle"/>
                              </div>
                        </div>
                        <div class="col-sm-12">
                            <button class="btn col-sm-12" type="submit" style="background-color: green;color:white">submit</button>
                        </div>
                      </div>
            </div>
          </div>
        
    <style>
         
    .text-line {
        background-color: transparent;
        color: gray;
        outline: none;
        outline-style: none;
        outline-offset: 0;
        border-top: none;
        border-left: none;
        border-right: none;
        border-bottom: solid #eeeeee 1px;
        padding: 3px 10px;
    }
    #center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 40%;
 
}
.container {
  display: flex;
  justify-content: center;
  align-items: center;
}
.upload-btn-wrapper {
  position: relative;
  overflow: hidden;
  display: inline-block;
}

.btn {
  border: 2px solid green;
  color: green;
  background-color: white;
  padding: 8px 20px;
  border-radius: 8px;
  font-size: 20px;
  font-weight: bold;
}

.upload-btn-wrapper input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
}

    </style>
    <script>
        $("#state").on('change',function()
        {
            var id=$(this).val();
            $.ajax({
                url:"<?=URL::to('/get-district/')?>"+"/"+id,
                data:{},
                type:"get",
                success:function(res)
                {
                    var k=JSON.parse(res);
                    var s="<option value="+">district</option>"
                    for(var i=0;i<k.length;i++)
                    {
                      s+="<option value="+k[i].id+">"+k[i].name+"</option>"
                    }
                    $("#district").html(s)
                }


            })

        })
        var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
    </script>
@endsection
