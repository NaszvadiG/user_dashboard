<html>
<head>
	<title> <?php    
		if ($this->session->userdata('user_level')=='admin') {
			echo "Admin ";
		}   else {
			echo "User ";
		}
	?>Dashboard </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <style  type="text/css">
  		 div.page-header{
  		 	margin-top:100px;
  		 	margin-left:50px;
  		 }
  		 div.row{
  		 	margin-left:50px;
  		 }
  		 div.row a{
  		 	margin-right:20px;
  		 	color:rgb(43,120,228);
  		 }
  		 h1{
  		 	display:inline-block;
  		 }
  		 button{
  		 	margin-left:800px;
  		 }
  		 a{
  		 	color:white;
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
        <li class='active'><a href="<?php

        if ($this->session->userdata('user_level')=='admin') {
          echo "/dashboard/admin";
        } else {
          echo "/dashboard";
        }

        ?>">Dashboard <span class="sr-only">(current)</span></a></li>
        <li><a href="/users/edit">Profile <span class="sr-only">(current)</span></a></li>
        <li><a href="/users/show/<?=$this->session->userdata('user_id') ?>">Messages</a></li>
      </ul>   
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/Sessions/destroy">Log off</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
 
      </div>
    </nav>

    <div class="page-header">
       <?php    
		if ($this->session->userdata('user_level')=='admin') {
			echo "<h1>Manage Users</h1><button type='button' class='btn btn-xs btn-success'><a href='/users/new'>Add New</a></button>";
		}   else {
			echo "<h1>All Users</h1>";
		}
	?>

      </div>
      <div class="row">
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created at</th>
                <th>User_level</th>
           <?php 
           if ($this->session->userdata("user_level") == 'admin') {
           		echo "<th>Actions</th>";
           }



           ?>
              </tr>
            </thead>
            <tbody>
              <?php
              	foreach($users AS $user) {
        			$id = $user['id'];
              		echo "<tr><td>".$user['id']."</td><td><a href='/users/show/$id'>".$user['first_name']." ".
              		$user['last_name']."</a></td><td>".$user['email']."</td><td>".$user['created_at']."</td><td>".
              		$user['admin']."</td>";
              		if ($this->session->userdata('user_level') == 'admin') {
              			echo "<td><a href='/Users/edit/$id'>Edit</a><a href='/Users/delete/$id'>Remove</a></td>";
              		}
              		echo "</tr>";

              	}






              ?>
            </tbody>
          </table>
       </div>
</body>
</html>
