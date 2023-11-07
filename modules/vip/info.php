<?php
/**
 * VIP
 * https://webenginecms.org/
 * 
 * @version 1.0.0
 * @author Lautaro Angelico <http://lautaroangelico.com/>
 * @copyright (c) 2013-2019 Lautaro Angelico, All Rights Reserved
 * @build w641ba01901cb0925ec50f543e59acbd
 */

try {
	if(!class_exists('Plugin\VIP\VIP')) throw new Exception('Plugin disabled.');
	$VIP = new Plugin\VIP\VIP();
	$VIP->loadModule('info');
} catch(Exception $ex) {
	message('error', $ex->getMessage());
}