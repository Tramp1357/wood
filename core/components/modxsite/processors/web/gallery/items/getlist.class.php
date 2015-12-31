<?php

require_once dirname(dirname(dirname(dirname(__FILE__)))). '/site/web/getlist.class.php';

class modWebGalleryItemsGetlistProcessor extends modSiteWebGetlistProcessor{

    public $classKey = 'galItem';

    public function prepareQueryBeforeCount(xPDOQuery $c){
        $c = parent::prepareQueryBeforeCount($c);   
        $where = array(); 
        $c->innerJoin('galAlbumItem', "AlbumItems");
        $c->innerJoin('galAlbum', "Album", "AlbumItems.album = Album.id");
        if($album_id = (int)$this->getProperty('album_id')){
            $where['Album.id'] = $album_id;
        }
        if($where){
            $c->where($where);
        }
        $c->select('AlbumItems.rank');
        $c->sortBy('AlbumItems.rank','ASC');
        return $c;
    }

    public function prepareRow(xPDOObject $object) {
        $object->set('relativeImage', $object->get('relativeImage'));
        return parent::prepareRow($object);
    }
}

return 'modWebGalleryItemsGetlistProcessor';
	
	
	