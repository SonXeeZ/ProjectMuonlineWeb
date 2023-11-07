<?php
/**
 * Top Ranking
 * https://webenginecms.org/
 * 
 * @version 1.0.0
 * @author Lautaro Angelico <http://lautaroangelico.com/>
 * @copyright (c) 2013-2019 Lautaro Angelico, All Rights Reserved
 * @build w641ba01901cb0925ec50f543e59acbd
 */

try {
	
	$TopRanking = new \Plugin\TopRanking\TopRanking();
	$TopRanking->loadModule('top');
	
} catch(Exception $ex) {
	message('error', $ex->getMessage());
}