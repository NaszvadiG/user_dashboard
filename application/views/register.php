<html>
<head>
	<title> <?php  
	if ($this->session->userdata('user_id')) {
		$add_user = true;
		echo "New User";
	} else {
		$add_user = false;
		echo "Register";
	}


	?></title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <style type="text/css">
		div.row{
			margin-top:100px;
		}

		span.error{
			color:red;
		}
		h3.success{
			color:green;
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
  <?php 
  if ($add_user) { ?>
  	 <li ><a href="/">Dashboard <span class="sr-only">(current)</span></a></li>
        <li><a href="/">Profile <span class="sr-only">(current)</span></a></li>
        <li><a href="/users/show/<?=$this->session->userdata('user_id') ?>">Messages</a></li>
      </ul>   
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/Sessions/destroy">Log off</a></li>
      </ul>

<?php  } else { ?>
  	<li><a href="/">Home <span class="sr-only">(current)</span></a></li>
      </ul>   
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/signin">Sign In</a></li>

 <?php } ?>
      






    </div><!-- /.navbar-collapse -->
 
      </div>
    </nav>
    <div class="container">
    <div class="row">
    	<?php
    	if ($add_user) {
    		echo "<h3 class='success'>".$this->session->flashdata('success')."</h3>";
    	}


    	?>
    	
    <form class="form-horizontal" action='/Users/create' method="POST">
  <fieldset>
    <div id="legend">
      <legend class="">

      	<?php
      	if ($add_user) {
      		echo "Add a new User";
      	} else {
      		echo "Register";
      	}

      	?>

</legend>
    </div>
    <div class="control-group">
      <!-- First -->
      <label class="control-label"  for="username">First Name</label>
      <div class="controls">
        <input type="text" id="firstname" name="first_name" placeholder="" class="input-xlarge">
        <span class="help-block">Please provide <?php  if ($add_user){echo "the user's ";} else {echo "your";}   ?>First Name</span>
      </div>
    </div>
    <div class="control-group">
      <!-- Last Name -->
      <label class="control-label"  for="username">Last Name</label>
      <div class="controls">
        <input type="text" id="lastname" name="last_name" placeholder="" class="input-xlarge">
        <span class="help-block">Please provide<?php  if ($add_user){echo "the user's ";} else {echo "your";}   ?>Last Name</span>
      </div>
    </div>
 
    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
        <input type="text" id="email" name="email" placeholder="" class="input-xlarge">
        <?php if ($this->session->flashdata('email')) {
        	echo "<span class='help-block error'>".$this->session->flashdata('email')."</span>";
        } else {
        	echo "<span class='help-block'>Please provide " ;
        	if ($add_user){
        		echo "the user's ";
        	} else {
        		echo "your";
        	}
        	echo "Email</span>";

        	
        }

         ?>


        
      </div>
    </div>
 
    <div class="control-group">
      <!-- Password-->
      <label class="control-label" for="password">Password</label>
      <div class="controls">
        <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
        <?php if ($this->session->flashdata('password')) {
        	echo "<span class='help-block error'>".$this->session->flashdata('password')."</span>";
        } else {
        	echo "<span class='help-block'>Please Enter password</span>";
        }

         ?>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Password -->
      <label class="control-label"  for="password_confirm">Password (Confirm)</label>
      <div class="controls">
        <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="input-xlarge">
          <?php if ($this->session->flashdata('password_conf')) {
        	echo "<span class='help-block error'>".$this->session->flashdata('password_conf')."</span>";
        } else {
        	echo "<span class='help-block'>Please confirm password</span>";
        }

         ?>

      </div>
    </div>
 
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button class="btn btn-success"><?php 
        if ($add_user) {
        	echo "Create";
        } else {
        	echo "Register";
        }
        ?></button>
      </div>
    </div>
  </fieldset>
</form>
    </div>
</div>
</body>
</html>