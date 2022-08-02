//<?php
/** 
 * ddSendRedirect
 * @version 1.0 (2012-02-16)
 * 
 * @desc Переадресовывает несуществующие страницы на необходимые адреса (url или id документа).
 * 
 * @events OnPageNotFound
 * 
 * @copyright 2012 DD Group {@link https://DivanDesign.biz }
 */

$rules = array(
	
);

$e = &$modx->Event;

if ($e->name == 'OnPageNotFound'){
	$oldUrl = $_SERVER['REQUEST_URI'];
	
	//Если для текущего url есть правило  
	if (isset($rules[$oldUrl])){
		//Если редиректить надо на ID, сформируем url
		if (is_numeric($rules[$oldUrl])){
			$rules[$oldUrl] = $modx->makeUrl(
				$rules[$oldUrl],
				'',
				'',
				'full'
			);
		}
		
		$modx->sendRedirect(
			$rules[$oldUrl],
			0,
			'REDIRECT_HEADER',
			'HTTP/1.1 301 Moved Permanently'
		);
		
		exit;
	}
}
//?>