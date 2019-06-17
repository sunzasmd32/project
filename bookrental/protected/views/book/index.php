<?php
/* @var $this BookController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Books',
);

// $this->menu=array(
// 	array('label'=>'Create Book', 'url'=>array('create')),
// 	array('label'=>'Manage Book', 'url'=>array('admin')),
// );
?>

<h1>Books</h1>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'book-grid',
	'dataProvider'=>$model->search(),

	'columns'=>array(
		'id_book',
		'bookname',
		'price',
		'quantity',
		array(
			'name'=>'image',
			'type'=>'raw',
			'value'=>'CHtml::link( CHtml::image(Yii::app()->baseUrl . "/admin/upload/" . $data->image,"",array(\'height\'=>\'100\', \'width\'=>\'100\')), Yii::app()->baseUrl."/index.php/book/".$data->id_book)'
		
		),

	),
)); ?>
