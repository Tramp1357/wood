<?php

class modSiteWebBreadcrumbsProcessor extends modProcessor{

	public function initialize(){
		$this->setDefaultProperties(array(
			'startId'       => 0,
			'excludeDocs'   => array(),
			'showHidden'    => true,
			'showUnpub'     => false,
			'showDeleted'   => false,
			'showHome'     => false,
		));
		return parent::initialize();
	}

	public function process() {
		$bc_path = array();
		$resource = $this->modx->resource;
		$index=$this->modx->getOption('site_start',1);
		//стоим в голове, нечего выводить
		if($resource->get('id') != $this->getProperty('startId')){
			//соберем цепочку родителей
			$r=$resource->toArray();
			unset($r['content']);
			$bc_path[]=$r;

			while($resource = $resource->getOne('Parent')) {
				if (in_array($resource->id, $this->getProperty('excludeDocs'))
					|| !$this->getProperty('showHidden') && $resource->hidemenu
					|| !$this->getProperty('showUnpub') && !$resource->published
					|| !$this->getProperty('showDeleted') && $resource->deleted
				){
					continue;
				}

				$r=$resource->toArray();
				unset($r['content']);
				array_unshift($bc_path,$r);

				if($r['id']==$index) $index=0;

				if($resource->id==$this->getProperty('startId')) break;
			}
			if($index && $this->getProperty('showHome')){
				$r=$this->modx->getObject('modResource',$index)->toArray();
				array_unshift($bc_path,$r);
			}
		}
		return $this->success('', $bc_path);
	}
}
return 'modSiteWebBreadcrumbsProcessor';