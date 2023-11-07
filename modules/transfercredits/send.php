<?php
/**
 * Transfer Credits
 * https://webenginecms.org/
 * 
 * @version 1.0.0
 * @author Lautaro Angelico <http://lautaroangelico.com/>
 * @copyright (c) 2013-2019 Lautaro Angelico, All Rights Reserved
 * @build w641ba01901cb0925ec50f543e59acbd
 */

try {
	
	$TransferCredits = new \Plugin\TransferCredits\TransferCredits();
	$TransferCredits->loadModule('send');
	
} catch(Exception $ex) {
	message('error', $ex->getMessage());
}