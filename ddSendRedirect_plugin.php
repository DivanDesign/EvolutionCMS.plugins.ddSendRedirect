//<?php
/** 
 * ddRedirectMoved plugin
 * @version 1.0 (2012-02-16)
 * 
 * Переадресовывает несуществующие страницы на необходимые адреса (url или id документа).
 * 
 * @events OnPageNotFound
 * 
 * @copyright 2012, DivanDesign
 * http://www.DivanDesign.ru
 */

$rules = array(
	
);

$e = &$modx->Event;

if ($e->name == 'OnPageNotFound'){
	$oldUrl = $_SERVER['REQUEST_URI'];

	//Если для текущего url есть правило  
	if (isset($rules[$oldUrl])){
		//Если редиректить надо на id, сформируем url
		if (is_numeric($rules[$oldUrl])){
			$rules[$oldUrl] = $modx->makeUrl($rules[$oldUrl], '', '', 'full');
		}
		
		$this->sendRedirect($rules[$oldUrl], 0, 'REDIRECT_HEADER', 'HTTP/1.1 301 Moved Permanently');
		exit;
	}
}
//?>