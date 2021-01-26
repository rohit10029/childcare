<?php use Illuminate\Support\Facades\URL; ?>
<html>
    <head>
        <title>User signup</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
<body>
  <div>
   
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#"><?=
              Auth::user()!=null?"Wellcome!.." .Auth::user()->name:"Wellcome!.. guest"
              ?></a>
          </div>
          <ul class="nav navbar-nav">
            <li class="active"><a href=<?= Url::to('/home')?>>Home</a></li>
            <?php if(Auth::user()==null){ ?>
            <li><a href=<?= Url::to('/')?>>login</a></li>
            <?php }else{ ?>
              <li><a href=<?= Url::to('/state')?>>state</a></li>
              <li><a href=<?= Url::to('/district')?>>district</a></li>
              <li><a href=<?= Url::to('/child')?>>child</a></li>
              <li><a href=<?= Url::to('/logout')?>>logout</a></li>
              <?php }?>
              
          </ul>
        </div>
      </nav>
  </div>
  @yield('content')
</body>

</html>