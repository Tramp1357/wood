<?php

switch($_REQUEST['action']){
	case 'callorder':
		$result=$modx->runProcessor(
			'web/forms/callorder',
			$_REQUEST,
			['processors_path'=>$modx->getObject('modNamespace', 'modxsite')->getCorePath().'processors/'])->getResponse();
		return json_encode($result);
}