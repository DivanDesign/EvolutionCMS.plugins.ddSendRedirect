//<?php
/** 
 * ddSendRedirect
 * @version 1.0 (2012-02-16)
 * 
 * @see README.md
 * 
 * @copyright 2012 DD Group {@link https://DivanDesign.biz }
 */

$redirectionRules = array(
	
);

if ($modx->Event->name == 'OnPageNotFound'){
	$oldUrl = $_SERVER['REQUEST_URI'];
	
	//Если для текущего url есть правило  
	if (isset($redirectionRules[$oldUrl])){
		//Если редиректить надо на ID, сформируем url
		if (is_numeric($redirectionRules[$oldUrl])){
			$redirectionRules[$oldUrl] = $modx->makeUrl(
				$redirectionRules[$oldUrl],
				'',
				'',
				'full'
			);
		}
		
		$modx->sendRedirect(
			$redirectionRules[$oldUrl],
			0,
			'REDIRECT_HEADER',
			'HTTP/1.1 301 Moved Permanently'
		);
		
		exit;
	}
}
//?>