<div id="main_left">



<h2> Order  </h2>

<?php 
if($order){ 
	$total='';


	foreach($order as $details) : ?>
<div id="img-div">
<img src="<?php echo URL; ?>images/<?php if(isset($details->pic)) echo $details->pic ?>" />

<h2>Where</h2>
<h5><?= $details->city ?></h5></a>
<p>Price : <?= $details->price ?>£</p></a>
<p> Tickets: <?php echo $details->qt;?></p>


	<?php $total += ($details->price*$details->qt);

 endforeach; 
 echo "<div class='button'> Total : ".$total." £ </div>";

} ?>



	 

</div>