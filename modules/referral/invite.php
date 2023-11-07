<?php
/**
 * Referral System
 * https://webenginecms.org/
 * 
 * @version 1.0.0
 * @author Lautaro Angelico <http://lautaroangelico.com/>
 * @copyright (c) 2013-2019 Lautaro Angelico, All Rights Reserved
 * @build w641ba01901cb0925ec50f543e59acbd
 */

try {
	if(!class_exists('Plugin\ReferralSystem\ReferralSystem')) throw new Exception('Plugin disabled.');
	$ReferralSystem = new Plugin\ReferralSystem\ReferralSystem();
	$ReferralSystem->loadModule('invite');
} catch(Exception $ex) {
	message('error', $ex->getMessage());
}