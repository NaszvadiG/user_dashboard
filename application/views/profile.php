<html>
<head>
	<title> Edit Profile</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <style  type="text/css">
   div.row{
    margin-top:80px;
    margin-left:100px;
   }
   form{
    margin-top:20px;
  
   }
   label{
    margin-bottom:20px;
   }
   input{
    float:right;
    clear:both;
    margin-bottom:20px;
    vertical-align:top;
   }
   p.success{
    color:green;
   }
   p.error{
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
        <li><a href="/">Dashboard <span class="sr-only">(current)</span></a></li>
        <li class='active'><a href="/users/edit">Profile <span class="sr-only">(current)</span></a></li>
        <li><a href="/users/show/<?=$this->session->userdata('user_id') ?>">Messages</a></li>
      </ul>   
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/Sessions/destroy">Log off</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
 
      </div>
    </nav>
  
       <div class="row">
           <h3>Edit profile</h3>
           <?php
            if ($this->session->flashdata('message')) {
              echo "<p class='success'>".$this->session->flashdata('message')."</p>";
            }


           ?>
    <div class="col-sm-6">
        
        <form action="/users/update_info/<?=$id?>" method="post" class="form-horizontal" role="form">
          <fieldset>
            <legend>Edit information</legend>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email Address:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="email" placeholder="<?=$email?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">First name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="first_name"
              placeholder="<?=$first_name ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Last name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="last_name" placeholder="<?=$last_name ?>">
            </div>
          </div>
    
          
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" class="btn btn-primary" value="Save">
              <span></span>
              <input type="hidden" name="page" value="profile"/>
      
            </div>
          </div>
        </fieldset>
        </form>
    </div>
    <div class="col-sm-6">
      <?php
      if ($this->session->flashdata('error')) {
        echo "<p class='error'>".$this->session->flashdata('error')."</p>";
      } 
      if ($this->session->flashdata('password_message')) {
        echo "<p class='success'>".$this->session->flashdata('password_message')."</p>";
      }




      ?>
        <form action="/users/update_password/<?=$id?>" method="post" class="form-horizontal" role="form">
          <fieldset>
            <legend>Change Password</legend>
          <div class="form-group">
            <label class="col-lg-3 control-label">Password:</label>
            <div class="col-lg-8">
              <input class="form-control" type="password" name="password" >
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Password Confirmation:</label>
            <div class="col-lg-8">
              <input class="form-control" type="password" name="conf_password"
             >
            </div>
          </div>
         
      
          
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" class="btn btn-primary" value="Update Password">
              <span></span>
              <input type="hidden" name="page" value="profile"/>
      
            </div>
          </div>
        </fieldset>
        </form>
    </div>
    <div class="row">
      <div class="col-sm-10">
      <form action="/users/update_info/<?=$id?>" method="post" class="form-horizontal" role="form">
          <fieldset>
            <legend>Edit description</legend>
          <div class="form-group">
            <div class="col-lg-8">

              <textarea cols="100" rows="5" name="description"
              placeholder="<?= $description?>" ></textarea>
            </div>
          </div>
      
         
      
          
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" class="btn btn-primary" value="Save">
              <span></span>
              <input type="hidden" name="page" value="profile"/>
      
            </div>
          </div>
        </fieldset>
        </form>
      </div>
    </div>
</div>
</body>
</html>