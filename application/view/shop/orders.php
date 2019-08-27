
<div id="main_left">



<?php 
if($orders){ 

	 echo "<h2> Your orders </h2>";

	foreach($orders as $order) : ?>

	<a href=" <?php echo URL."shop/order/". $order->oID ?>">

	<p> Order Id : <?php echo $order->oID ?></p>
	
	<p> Placed the : <?php echo $order->date ?></p></a>

<?php endforeach; 

} else {

	echo "<h2>You have no orders</h2>";
}  ?>

</div>



