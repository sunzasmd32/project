<div class="row-fluid">
	<h1>รายการสมุดในรถเข็น</h1>
	<?php echo CHtml::beginForm();?>
	<table class="table table-hover table-bordered table-condensed table-striped">
		<tr>
			<th>สมุด</th>
			<th>ราคา</th>
			<th>จำนวน</th>
			<th>รวม</th>

		</tr>
		<?php foreach(Yii::app()->session['cart'] as $id => $qty) { 
		$product = $this->findProduct($id);
		?>
		
		<tr>
			<td><?php echo $product['product_type'].'-'.$product['product_name'];?></td>
			<td><?php echo $product['product_price'];?></td>
			<td><input type="text" name="<?php echo $id;?>" value="<?php echo $qty;?>"/></td>
			<td><?php echo $product['product_price']*$qty;?></td>
		</tr>
	<?php } ?>
		<tr>
			<td colspan="2">รวมทั้งหมด</td>
			<td><?php echo $this->totalItems;?></td>
			<td><?php echo $this->totalPrice;?></td>
		</tr>
		



	</table>
	<div class="pull-left">
		<input type="submit" value="ปรับปรุง" class="btn btn-primary"/>
	</div>
	<div class="pull-right">
		<?php echo CHtml::link('เลือกซื้อสินค้าต่อ',array('/site/index'),array('class'=>'btn btn-success'));?>
		<?php echo CHtml::link('ชำระเงิน',array('/cart/checkout'),array('class'=>'btn btn-warning'));?>
		
	</div>
	<?php echo CHtml::endForm();?>
</div>