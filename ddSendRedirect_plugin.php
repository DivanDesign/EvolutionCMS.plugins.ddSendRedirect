//<?php
/** 
 * ddSendRedirect
 * @version 1.0 (2012-02-16)
 * 
 * @see README.md
 * 
 * @copyright 2012 DD Group {@link https://DivanDesign.biz }
 */

//Include (MODX)EvolutionCMS.libraries.ddTools
require_once(
	//path to `assets`
	MODX_BASE_PATH .
	'assets/libs/ddTools/modx.ddtools.class.php'
);

$redirectionRules = array(
	
);

if ($modx->Event->name == 'OnPageNotFound'){
	$currentUrl = \ddTools::convertUrlToAbsolute([
		'url' => $_SERVER['REQUEST_URI']
	]);
	
	foreach (
		$redirectionRules as
		$oldUrl =>
		$newUrl
	){
		//Support for any kind of relative URLs
		$oldUrl = \ddTools::convertUrlToAbsolute([
			'url' => $oldUrl
		]);
		
		//Если для текущего url есть правило  
		if ($oldUrl == $currentUrl){
			//Если редиректить надо на ID, сформируем url
			if (is_numeric($newUrl)){
				$newUrl = $modx->makeUrl(
					$newUrl,
					'',
					'',
					'full'
				);
			}else{
				//Support for any kind of relative URLs
				$newUrl = \ddTools::convertUrlToAbsolute([
					'url' => $newUrl
				]);
			}
			
			$modx->sendRedirect(
				$newUrl,
				0,
				'REDIRECT_HEADER',
				'HTTP/1.1 301 Moved Permanently'
			);
			
			exit;
		}
	}
}
//?>