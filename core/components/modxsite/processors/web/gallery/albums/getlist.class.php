<?php

require_once dirname(dirname(dirname(dirname(__FILE__)))). '/site/web/getlist.class.php';

class modWebGalleryAlbumsGetlistProcessor extends modSiteWebGetlistProcessor{

    public $classKey = 'galAlbum';

	public function initialize(){

		$this->setDefaultProperties(array(
			'parent'=> 0,
			'sort'  =>'rank',
			'dir'   =>'asc',
		));

		return parent::initialize();
	}

    public function prepareQueryBeforeCount(xPDOQuery $c){
        $c = parent::prepareQueryBeforeCount($c);   
        $where = array();
	    if($this->getProperty('parent')){
		    $c->where(array('parent'=>$this->getProperty('parent')));
	    }


	    if($this->getProperty('where')){
            $c->where((array)$this->getProperty('where'));
        }
        return $c;
    }

    public function prepareRow(xPDOObject $object) {
        $object->set('relativeImage', $object->get('relativeImage'));
        return parent::prepareRow($object);
    }
}

return 'modWebGalleryAlbumsGetlistProcessor';