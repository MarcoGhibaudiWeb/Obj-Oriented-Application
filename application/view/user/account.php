<div id="main_left";>



<h2 style='text-transform: capitalize;'> welcome <?php echo$account['fname']." ".$account['lname'];?></h2>

<h3> Check your <a href='<?php echo URL."/shop/orders/".$_SESSION['user_id'];?>'> Orders </a></h3>
<br><br>
<h4><a href='<?php echo URL."/user/logout/";?>'> Logout </a></h4>

</div>
