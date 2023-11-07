<?php
/**
 * PaymentWall
 * https://webenginecms.org/
 * 
 * @version 1.0.0
 * @author Lautaro Angelico <http://lautaroangelico.com/>
 * @copyright (c) 2013-2019 Lautaro Angelico, All Rights Reserved
 * @build w3c8c718b75a0f1fa1a557f7f9d70877
 */

try {
	if(!class_exists('Plugin\PaymentWallGateway\PaymentWallGateway')) throw new Exception('Plugin disabled.');
	$PaymentWallGateway = new Plugin\PaymentWallGateway\PaymentWallGateway();
	$PaymentWallGateway->loadModule('paymentwall');
} catch(Exception $ex) {
	message('error', $ex->getMessage());
}