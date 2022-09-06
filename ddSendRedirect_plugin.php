//<?php
/** 
 * ddSendRedirect
 * @version 1.0 (2012-02-16)
 * 
 * @see README.md
 * 
 * @copyright 2012 DD Group {@link https://DivanDesign.biz }
 */

if ($modx->Event->name == 'OnPageNotFound'){
	//Include (MODX)EvolutionCMS.libraries.ddTools
	require_once(
		//path to `assets`
		MODX_BASE_PATH .
		'assets/libs/ddTools/modx.ddtools.class.php'
	);
	
	//Prepare params
	$params = \DDTools\ObjectTools::convertType([
		'object' => $params,
		'type' => 'objectStdClass'
	]);	
	
	//Validate params
	if (
		!empty($params->docId) &&
		is_numeric($params->docId) &&
		!empty($params->tvName)
	){
		//Try to get rules
		$redirectionRules = \ddTools::getTemplateVarOutput(
			[$params->tvName],
			$params->docId
		);
		
		if (!empty($redirectionRules)){
			$redirectionRules = $redirectionRules[$params->tvName];
			
			$redirectionRules = \DDTools\ObjectTools::convertType([
				'object' => $redirectionRules,
				'type' => 'objectArray'
			]);
		}
		
		//If redirection rules are set
		if (!empty($redirectionRules)){
			$currentUrl = \ddTools::convertUrlToAbsolute([
				'url' => $_SERVER['REQUEST_URI']
			]);
			
			foreach (
				$redirectionRules as
				$rule
			){
				$rule = array_values($rule);
				
				$rule = (object) [
					'from' => $rule[0],
					'to' => $rule[1]
				];
				
				//Support for any kind of relative URLs
				$rule->from = \ddTools::convertUrlToAbsolute([
					'url' => $rule->from
				]);
				
				//Если для текущего url есть правило  
				if ($rule->from == $currentUrl){
					//Если редиректить надо на ID, сформируем url
					if (is_numeric($rule->to)){
						$rule->to = $modx->makeUrl(
							$rule->to,
							'',
							'',
							'full'
						);
					}else{
						//Support for any kind of relative URLs
						$rule->to = \ddTools::convertUrlToAbsolute([
							'url' => $rule->to
						]);
					}
					
					$modx->sendRedirect(
						$rule->to,
						0,
						'REDIRECT_HEADER',
						'HTTP/1.1 301 Moved Permanently'
					);
					
					exit;
				}
			}
		}
	}
}
//?>