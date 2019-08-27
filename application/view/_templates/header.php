<?php ob_start(); 
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $pageTitle ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href='<?php echo URL."public/css/main.css";?>'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
  $(document).ready(function() {
  
    $(window).scroll(function () {
      console.log($(window).scrollTop())
      if ($(window).scrollTop() > 200.9) {
        $('.navbar').addClass('navbar-fixed');
      }
      if ($(window).scrollTop() < 201) {
        $('.navbar').removeClass('navbar-fixed');
      }
    });
  });
  </script>
  

</head>

<body>

<div class="jumbotron">
  <div class="container text-center">
    <h1>WAX Connection</h1>      
    <p>Tickets, Music & KickBacks</p>
  </div>
</div>

<nav class="navbar navbar-inverse ">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="<?php echo URL."home"?>">WAX</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"> <a href=" <?php echo URL."home"?>">All Events</a></li>
        <li><a href="<?php echo URL."home/cities"?>">Cities</a></li>
        <li><a href="<?php echo URL."contact"?>">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right" style="display: inline">
        <li>
        <?php if (isset($_SESSION['user_id'])){
              echo "<a href='".URL."user/account/".$_SESSION['user_id']."'><span class='glyphicon glyphicon-user'></span> Your Account</a>";
                }else{
                  echo "<a href='".URL."user/'> Register - Login </a>";}?>
          </li>
        <li><a href="<?php echo URL."shop/cart/".$_SESSION['user_id'];?>"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
      </ul>
    </div>
  </div>
</nav>


<?php if(isset($_SESSION['alert'])){echo "<div class='alert' style='text-decoration:none' ><a href='".URL."home/deleteAlert'>".$_SESSION['alert']."</a></div>";}?>
                


