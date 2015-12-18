<html>
<head>
  <title>Signin Page</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <style type="text/css">
    body{
      background-color:#eee;
    }
    .form-signin{
      max-width:330px;
      margin-top:100px;
    }
    .btn-primary{
      margin-top:20px;
      border-color:#101010;
      background-color:#222;
      color:#9d9d9d;
    }
    .btn-primary:hover{
      color:#fff;
      background-color:black;
    }
    .form-signin input[type="email"] {
      margin-bottom:10px;
    }

    a{
      text-decoration:underline;
    }
    h3.error {
      color:red;
    }

  </style>
</head>

<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Test App</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="/">Home <span class="sr-only">(current)</span></a></li>
      </ul>   
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="/signin">Sign In</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  
      </div>
    </nav>

    <div class="container">

      <form action="/Sessions/create" method="post" class="form-signin">
    <?php
      if ($this->session->flashdata("error")) {
        echo "<h3 class='error'>".$this->session->flashdata("error")."</h3>";
      }




      ?>
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
       
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
      <a href="/register">Don't have an account? Register.</a>

    </div> <!-- /container -->
</body>
</html>