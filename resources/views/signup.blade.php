@extends('layout')
@section('content')
        <div class="container">
            <div id=center>
                <div class="row">
                    <div class="col-sm-6">
                        <a href="javascript:void(0);" style="color:green" id=showSignup>signup</a>
                    </div>
                    <div class="col-sm-6">
                        <a href="javascript:void(0);" style="color:green" id=showLogin>login</a>
                    </div>
                </div>
                <form method="post" action= "<?=URL::to('/signup');?>" id=signup>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="row">
                        <div class="col-sm-12">
                            <input type="text" class="text-line col-sm-12" name="name"  required placeholder="name"/>
                        </div>
                        <br>
                        <div class="col-sm-12">
                            <input type="text" class="text-line col-sm-12" name="email" required placeholder="email"/>
                        </div>
                        <br>
                        <div class="col-sm-12">
                            <input type="text" class="text-line col-sm-12" name="pwd"   required placeholder="password"/>
                        </div>
                        <div class="col-sm-12">
                            <button class="btn col-sm-12" type="submit" style="background-color: green;color:white">signup</button>
                        </div>
                      </div>
                    
                    
                </form>
                <form method="post" action="<?=URL::to('/login');?>" id=login style="display:none">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="row">
                        
                        <br>
                        <div class="col-sm-12">
                            <input type="text" class="text-line col-sm-12" name="email" placeholder="email"/>
                        </div>
                        <br>
                        <div class="col-sm-12">
                            <input type="text" class="text-line col-sm-12" name="pwd" placeholder="password"/>
                        </div>
                        <div class="col-sm-12">
                            <button class="btn col-sm-12" type="submit" style="background-color: green;color:white">login</button>
                        </div>
                      </div>
                    
                    
                </form>
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
    /* #center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 40%;
 
} */
.container {
  display: flex;
  justify-content: center;
  align-items: center;
}

    </style>
    <script>
        $("#showSignup").on('click',function()
        {
            $("#login").hide()
            $("#signup").show()

        })
        $("#showLogin").on('click',function()
        {
            $("#login").show()
            $("#signup").hide()

        })
    </script>
@endsection