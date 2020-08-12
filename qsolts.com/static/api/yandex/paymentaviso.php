<?php
	include('config.php');
	$hash = md5($_POST['action'].';'.$_POST['orderSumAmount'].';'.$_POST['orderSumCurrencyPaycash'].';'.$_POST['orderSumBankPaycash'].';'.$configs['shopId'].';'.$_POST['invoiceId'].';'.$_POST['customerNumber'].';'.$configs['ShopPassword']);		
	if (strtoupper($hash) != strtoupper($_POST['md5'])){ 
		$code = 1;
	}
	else {
		$code = 0;
	}



	if($code == 0){
		$auth_token = 'app.16257.841868b9e47dd3a7bb2c3573747468a7307d7f40e5ac935b';
		$url = 'http://api.carrotquest.io/v1/users/'.$_POST['qqshop_uid'].'/props?auth_token='.$auth_token;
		$operations = json_encode(array(
			array('op' => 'update_or_create',
			'key' => '$email',
			'value' => $_POST['new_email']
			),
			array('op' => 'update_or_create',
			'key' => 'Цена покупки методички',
			'value' => $_POST['orderSumAmount']
			),
		));
		$result = file_get_contents($url, false, stream_context_create(array(
			'http' => array(
			'method' => 'POST',
			'header' => 'Content-type: application/x-www-form-urlencoded',
			'content' => http_build_query(array('operations' => $operations,'by_user_id' => 'false')),
			)
		)));

		$url2 = 'http://api.carrotquest.io/v1/users/'.$_POST['qqshop_uid'].'/events?auth_token='.$auth_token;
		$product = $_POST['product'];
		if ($product == 3) {
		$event = 'Оплачена методичка Ontarget';
		$result2 = file_get_contents($url2, false, stream_context_create(array(
			'http' => array(
			'method' => 'POST',
			'header' => 'Content-type: application/x-www-form-urlencoded',
			'content' => http_build_query(array('event' => $event,'by_user_id' => 'false')),
			)
		)));
		}
		else if ($product == 2) {
		$event = 'Оплачена методичка SHL';
		$result2 = file_get_contents($url2, false, stream_context_create(array(
			'http' => array(
			'method' => 'POST',
			'header' => 'Content-type: application/x-www-form-urlencoded',
			'content' => http_build_query(array('event' => $event,'by_user_id' => 'false')),
			)
		)));
		}
		else {
        $event = 'Оплачена методичка Talent Q';
		$result2 = file_get_contents($url2, false, stream_context_create(array(
			'http' => array(
			'method' => 'POST',
			'header' => 'Content-type: application/x-www-form-urlencoded',
			'content' => http_build_query(array('event' => $event,'by_user_id' => 'false')),
           )
        )));
		}   
	}
		print '<?xml version="1.0" encoding="UTF-8"?>';
		print '<paymentAvisoResponse performedDatetime="'.$_POST['requestDatetime'].'" code="'.$code.'" invoiceId="'.$_POST['invoiceId'].'" shopId="'.$configs['shopId'].'"/>';
?>

