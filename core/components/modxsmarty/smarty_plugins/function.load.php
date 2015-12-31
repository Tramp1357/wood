<?php
/**
 * Smarty plugin
 *
 * @package Smarty
 * @subpackage PluginsFunction
 */


function smarty_function_load($params, & $smarty)
{
    if(!isset($params['file']) OR !$file = $params['file']){return;}

    if(!empty($params['assign'])){
        $assign = (string)$params['assign'];
    }

    $output = $smarty->fetch($file);
    return !empty($assign) ? $smarty->assign($assign, $output) : $output;
}

?>