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
		}else{
			//Support for any kind of relative URLs
			$redirectionRules[$oldUrl] = \ddTools::convertUrlToAbsolute([
				'url' => $redirectionRules[$oldUrl]
			]);
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