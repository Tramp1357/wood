<?php
/**
 * Smarty plugin
 *
 * @package Smarty
 * @subpackage PluginsFunction
 */


function smarty_function_galAlbum($params, & $smarty)
{
    if(!isset($params['album']) OR !$album = $params['album']){return;}

	$output = '';
    if(!$rowTpl = $params['rowTpl']){
		$output = array();
	}

    if(!empty($params['assign'])){
        $assign = (string)$params['assign'];
    }
    
    $modx = & $smarty->modx;

	// Получаем все элементы
	$q = $modx->newQuery('galItem');
	$q->join('galAlbumItem', 'AlbumItems');
	$q->where(array(
	    'AlbumItems.album' => $album,
	));

	if($items=$modx->getCollection('galItem', $q)){
		foreach($items as $item){
		    $item = array(
		        'name'			=>$item->get('name'),
                'description'	=>$item->get('description'),
//                'filename'	=>$item->get('filename'),
//                'mediatype'	=>$item->get('mediatype'),
//                'url'			=>$item->get('url'),
		        'relativeImage'	=> $item->get('relativeImage'),
//                'thumbnail'	=>$item->get('thumbnail'),
//                'image'	=>$item->get('image'),
//                'absoluteImage'	=>$item->get('absoluteImage'),
//                'filesize'	=>$item->get('filesize'),
//                'image_path'	=>$item->get('image_path'),
		    );
			if($rowTpl){
	            $smarty->assign('item',$item);
				$output.=$smarty->fetch($rowTpl);
			}
			else{
				$output[]=$item;
			}
		}
	}
    return !empty($assign) ? $smarty->assign($assign, $output) : $output;
}
