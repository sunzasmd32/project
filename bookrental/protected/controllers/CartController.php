<?php

class CartController extends Controller
{
	
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
	public $pid = null;
	public $totalItems = 0;
	public $totalPrice = 0.00;

	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionAdd(){

		if(isset($_GET['id_book'])){
			$id = $_GET['id_book'];
		}
		if(!isset(Yii::app()->session['cart'])){
			Yii::app()->session['cart'] = array();
			Yii::app()->session['total_items'] = 0;
			Yii::app()->session['total_price'] = 0.00;
		}
		$additem = $this->addtocart($id);
		Yii::app()->session['total_items'] = $this->totalItems(Yii::app()->session['cart']);
		Yii::app()->session['total_price'] = $this->totalPrice(Yii::app()->session['cart']);

		$this->totalItems = $this->totalItems(Yii::app()->session['cart']);
		$this->totalPrice = $this->totalPrice(Yii::app()->session['cart']);

		$this->redirect(array('/cart/update'));
		//$this->render('add');
	}
	public function addtocart($id){
		if(isset(Yii::app()->session['cart'][$id])){
			$session = Yii::app()->session['cart'];
			$session[$id] = $session[$id]+=1;
			Yii::app()->session['cart'] = $session;

		}else{
			$session = Yii::app()->session['cart'];
			$session[$id] = 1;
			Yii::app()->session['cart'] = $session;
		}
	}
	public function totalItems($cart){
		$totalItems = 0;
		if(is_array($cart)){
			foreach ($cart as $id => $quantity) {
				$totalItems += $quantity;
			
			}
			return $totalItems;
		}
	}
	public function totalPrice($cart){
		$netPrice = 0;
		if(is_array($cart)){
			foreach ($cart as $id => $quantity) {
				$sql = "SELECT price FROM book WHERE id_book=:Id";
				$command = Yii::app()->db->createCommand($sql);
				$command->bindValue(":Id",$id, PDO::PARAM_INT);
				$itemPrice = $command->queryRow();
				$netPrice += $itemPrice['product_price']* $quantity;
				
			}
			return $netPrice;
		}
	}

	public function actionUpdate(){
		$this->updateCart();
		$this->totalItems = $this->totalItems(Yii::app()->session['cart']);
		$this->totalPrice = $this->totalPrice(Yii::app()->session['cart']);

		Yii::app()->session['total_items'] = $this->totalItems(Yii::app()->session['cart']);
		Yii::app()->session['total_price'] = $this->totalPrice(Yii::app()->session['cart']);

		$this->render('update');

	}
	public function updateCart(){
		foreach (Yii::app()->session['cart'] as $id => $quantity) {
			if(isset($_POST[$id])){
				if($_POST[$id]=='0'){
				$session = Yii::app()->session['cart'];
				unset($session[$id]);
				Yii::app()->session['cart'] = $session;

			}else{
				$cart = Yii::app()->session['cart'];
				$cart[$id] = $_POST[$id];
				Yii::app()->session['cart'] = $cart;
				}
			}
		}
	}
	public function findProduct($id){
		$sql = "SELECT p.*,p.id as pid,pt.book_type FROM book p 
		LEFT JOIN book_types pt ON pt.id = p.product_types_id
		WHERE p.id=:Id";
		$command = Yii::app()->db->createCommand($sql);
		$command->bindValue(':Id',$id, PDO::PARAM_INT);
		$row = $command->queryRow();
		return $row;
	}
}
