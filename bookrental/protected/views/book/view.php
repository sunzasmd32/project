<?php
/* @var $this BookController */
/* @var $model Book */

$this->breadcrumbs=array(
	'Books'=>array('index'),
	$model->id_book,
);

// $this->menu=array(
// 	array('label'=>'List Book', 'url'=>array('index')),
// 	array('label'=>'Create Book', 'url'=>array('create')),
// 	array('label'=>'Update Book', 'url'=>array('update', 'id'=>$model->id_book)),
// 	array('label'=>'Delete Book', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_book),'confirm'=>'Are you sure you want to delete this item?')),
// 	array('label'=>'Manage Book', 'url'=>array('admin')),
// );
?>


<form action="" method="post">

<h1><?php echo $model->bookname; ?></h1>

	<?php echo CHtml::image(Yii::app()->baseUrl.'/admin/upload/'.$model->image,'',array('height'=>'250', 'width'=>'250')); ?><br>

	<b><?php echo CHtml::encode($model->getAttributeLabel('ชิ่อหนังสือ ')); ?>:</b>
	<?php echo CHtml::encode($model->bookname); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('ราคา/วัน ')); ?>:</b>
	<?php echo CHtml::encode($model->price); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('จำนวนคงเหลือ')); ?>:</b>
	<?php echo CHtml::encode($model->quantity); ?>
	<br />
	<input type="input" name="num">จำนวน<br><br>

	<input type="input" name="rentaldate">วัน<br>




	<input type="hidden" name="id_book" value="<?php echo $model->id_book; ?>">

<br>
	<input type="submit" name="addcart" value="เพิ่มลงตะกร้า" >
<hr>


</form>