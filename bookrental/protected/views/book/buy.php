<?php
/* @var $this BookController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Books',
);

$book = Book::model()->findByAttributes(array('id_book'=>$_POST['id_book']));

$num=$_POST['num'];
$rentaldate=$_POST['rentaldate'];

$sum = $num * $book->price * $rentaldate ; 
?>
<h1>Cart</h1><br>
<?php echo CHtml::image(Yii::app()->baseUrl.'/admin/upload/'.$book->image,'',array('height'=>'250', 'width'=>'250')); ?><br>

<b><?php echo CHtml::encode($book->getAttributeLabel('ชิ่อหนังสือ ')); ?>:</b>
	<?php echo CHtml::encode($book->bookname); ?>
	<br />

		<b><?php echo CHtml::encode($book->getAttributeLabel('ราคา/วัน ')); ?>:</b>
	<?php echo CHtml::encode($book->price); ?>
	<br />
<?php echo "เช่าทั้งหมด ".$num." เล่ม"; ?><br>
<?php echo "รวมเป็นเงิน ".$sum." บาท"; ?>

