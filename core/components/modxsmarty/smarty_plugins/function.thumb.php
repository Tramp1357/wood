<?php
/**
 * Smarty plugin
 *
 * @package Smarty
 * @subpackage PluginsFunction
 */


function smarty_function_thumb($params, & $smarty)
{
    if(!isset($params['input']) OR !$input = $params['input']){return;}
    if(!isset($params['options']) OR !$options = $params['options']){return;}

    if(!empty($params['assign']))
        $assign = (string)$params['assign'];

	$output=$smarty->modx->runSnippet('pthumb',array('input'=>$input,'options'=>$options));
return !empty($assign) ? $smarty->assign($assign, $output) : $output;
}
?>