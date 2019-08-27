
<div id="main_left">


<?php 
if($cart){	

	foreach($cart as $event) : ?>


<img src="<?php echo URL; ?>images/<?php if(isset($event['pic'])) echo $event['pic'] ?>" />

<h2>Where</h2>
<h5><?= $event['city'] ?></h5></a>
<p>Price : <?= $event['price'] ?>£</p></a>
	<p> Tickets: <?php echo $event['qt'];?></p>

	<a href=" <?php echo URL."shop/deleteCart/". $event['pID']."/".$_SESSION['user_id']?>">Delete from cart</a>
	</div>
<?php endforeach; 

echo "<div class='button'>
<a href='".URL."shop/addOrder/".$_SESSION['user_id']."'> Add to Orders </a>
</div>";

} else { ?>


<h2>Your cart is empty </h2>




<?php } ?>



	 

</div>
