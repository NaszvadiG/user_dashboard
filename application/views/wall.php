<html>
<head>
	<title> User Information</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <style  type="text/css">

   div.row{
    margin-top:80px;
   

   }
   div.col-md-8 {
    margin-left:100px;
   }
   p{
    margin-left:40px;
   }
   form{
    margin-top:40px;
    margin-bottom:20px;

   }
    form legend{
      font-size:14pt;
    }
   input[type='submit'] {
    float:right;
   }

   p.success{
    margin-top:30px;
    color:green;
   }
   span.message{
    display:block;
    border:1px solid black;
    border-height:50px;
    padding:10px 10px 50px 10px;
   }

   span.comment{
    display:block;
    border:1px solid black;
    border-height:50px;
    padding:10px 10px 50px 10px;
    
   }
   p.comment{
    margin-top:20px;
    margin-left:100px;
   }

   textarea{
    width:650px;
    margin-left:40px;
    margin-bottom:20px;
   }
   div.form-group{
    margin-left:20px;
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
        <li><a href="/users/edit">Profile <span class="sr-only">(current)</span></a></li>
        <li 
<?php 
if ($id == $this->session->userdata['user_id']) {
  echo "class='active'";
}


?>


        ><a href="/users/show/<?=$this->session->userdata('user_id') ?>">Messages</a></li>
      </ul>   
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/Sessions/destroy">Log off</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
 
      </div>
    </nav>
  <div class="row">
    <div class="col-md-6 col-md-offset-1">
      <h3><?=$name?></h3>
      <p> Registered at: <?= $time?> </p>
      <p> User ID: # <?=$id?> </p>
      <p> Email address: <?=$email?> </p>
      <p> Description: <?= $description ?></p>
      <?php
      if ($this->session->flashdata('success')) {
        echo "<p class='success'>".$this->session->flashdata('success')."</p>";
      }

      ?>
      <form action="/messages/create/<?=$id?>" method="post" class="form-horizontal" role="form">
          <fieldset>
            <legend>Leave a message for <?=$name?></legend>
          <div class="form-group">
              <textarea  cols='80' rows='5'name="content" ></textarea>
            </div>
            <div class="form-group">
              <input type='submit' value='post'>
            </div>

        </fieldset>
      </form>
    </div>
    <div class='row'>
      <div class="col-sm-6 col-sm-offset-1">
    <?php 
      foreach($messages AS $message) {
        $message_id = $message['message_id'];
        echo "<p>".$message['name']." wrote <span class='message'>".$message['content']."</span></p>";
        foreach($message['comment'] AS $comment) {
          echo "<p class='comment'>".$comment['name']." wrote <span class='comment'>".$comment['content']."</span></p>";
        } 


        ?>
        <form action="/Comments/create" method="get" class="form-horizontal">
          <div class="form-group">
          <input type="hidden" name="id" value="<?=$message_id?>"/>
          <textarea class='col-sm-6 col-sm-offset-2' name='content' placeholder='write a message'></textarea>
          <input type='submit' value='post'/>
        </div>

        </form>

     


   <?php   } ?>



   
  </div>

</div>


  </div>
   
</div>
</body>
</html>