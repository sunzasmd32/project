<?php
/* @var $this BookController */
/* @var $data Book */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_book')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_book), array('view', 'id'=>$data->id_book)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bookname')); ?>:</b>
	<?php echo CHtml::encode($data->bookname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('quantity')); ?>:</b>
	<?php echo CHtml::encode($data->quantity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image')); ?>:</b>
	<?php echo CHtml::encode($data->image); ?>
	<br />


</div>