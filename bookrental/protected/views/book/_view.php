<?php
/* @var $this BookController */
/* @var $data Book */
?>
<form action="" method="post">

<div class=	"view">


	<?php echo CHtml::image(Yii::app()->baseUrl.'/admin/upload/'.$data->image,'',array('height'=>'250', 'width'=>'250')); ?><br>

	<b><?php echo CHtml::encode($data->getAttributeLabel('ชื่อหนังสือ')); ?>:</b>
	<?php echo CHtml::encode($data->bookname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ราคา/วัน')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('จำนวนคงเหลือ')); ?>:</b>
	<?php echo CHtml::encode($data->quantity); ?>
	<br />

<input type="text" name="test">
	<select name="<?php echo($data->id_book) ?>">
  		<option value="1">1เล่ม</option>
  		<option value="2">2เล่ม</option>
  		<option value="3">3เล่ม</option>
 		<option value="4">4เล่ม</option>
 		<option value="5">5เล่ม</option>
 		<option value="6">6เล่ม</option>
 		<option value="7">7เล่ม</option>
	</select>

	<select name="<?php echo($data->id_book) ?>">
  		<option value="1">1วัน</option>
  		<option value="2">2วัน</option>
  		<option value="3">3วัน</option>
 		<option value="4">4วัน</option>
 		<option value="5">5วัน</option>
 		<option value="6">6วัน</option>
 		<option value="7">7วัน</option>
	</select>
	<input type="submit" name="addcart" value="เพิ่มลงตะกร้า">
<hr><br>

</div>





</form>
