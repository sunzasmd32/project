<?php
/* @var $this BookController */
/* @var $data Book */
?>

<div class="view">


	<b><?php echo CHtml::encode($data->getAttributeLabel('ชื่อหนังสือ :')); ?>:</b>
	<?php echo CHtml::encode($data->bookname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ราคา/วัน')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('จำนวนหนังสือ')); ?>:</b>
	<?php echo CHtml::encode($data->quantity); ?>
	<br />

	<div  align="center">
	<br>

	<?php echo CHtml::image(Yii::app()->baseUrl.'/upload/'.$data->image,'',array('height'=>'250', 'width'=>'250')); ?>

</div>


</div>