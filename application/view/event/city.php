
<div id="main">

<h3> <?php echo "$city";?></h3>


<?php 
if($events){ # if $animal variable is not false

	foreach($events as $event) :
	
	$city= $event->city?>

	<a href=" <?php echo URL."home/event/". $event->pID ?>">
	 <div class="img-div-thumbs">
	<img src='<?php echo URL; ?>images/<?= $event->pic ?>' alt='<?= $event->pic ?>' /> 
	<p><?= $event->title ?></p><br><p><?= $event->city ?></p></div></a>

	

<?php endforeach;



} else { ?>

<div class="container">
    <div id='content-div'><?php if(isset($error)) echo $error ?> </div>
</div>

<?php } ?>



	 

</div>

