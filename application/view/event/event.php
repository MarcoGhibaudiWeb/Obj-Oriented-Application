
<div id="main_left">

	<?php if($event) { ?>

		<h2><?php echo $event['title']; ?> </h2>

		<div id="img-diwv">
			<img src="<?php echo URL; ?>images/<?php if(isset($event['pic'])) echo $event['pic'] ?>" />
		</div>
			<h2>Where</h2>
			<h5><?= $event['city'] ?></h5></a>
			<h2>What</h2>
			<?php echo $event['description']; ?><br><br>
			<p>Price : <?= $event['price'] ?>£</p></a>
	
		<?php if(isset($_SESSION['user_id'])){
		 echo "<form action='".URL."shop/addCart/". $event['pID']."/".$_SESSION['user_id']."'  method='POST'> <input type='number' min='1' max='10' name='qt' required> <input type='submit' value='Add to Cart'>"; 
		
	 }}?>
</div>
