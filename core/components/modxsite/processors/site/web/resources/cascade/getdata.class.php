<?php

/*
    Base class for get modResources data
*/

require_once dirname(dirname(__FILE__)).'/getdata.class.php';

class modSiteWebResourcesCascadeGetdataProcessor extends modSiteWebResourcesGetdataProcessor{

    public function initialize()
    {
        $this->setDefaultProperties(array(
            'startId' => $this->modx->resource->id,
        ));
        return parent::initialize();
    }


        public function prepareQueryBeforeCount(xPDOQuery $c) {
            $c = parent::prepareQueryBeforeCount($c);

            $folders = array(startId);
            $where = array(
                'id:in'    => $this->getFolders((int)$this->getProperty('startId'), $folders),
                'or:parent:in'=> $this->getFolders((int)$this->getProperty('startId'), $folders),
            );
            $c->where($where);

            return $c;
        }

        protected function getFolders($parent, array & $folders){
            $q = $this->modx->newQuery('modResource', array(
                'deleted'   => 0,
                'published' => 1,
                'hidemenu'  => 0,
                'isfolder'  => 1,
                'parent'    => $parent,
            ));
            $q->select(array(
                'id',
            ));
            if($s = $q->prepare() AND $s->execute()){
                while($row = $s->fetch(PDO::FETCH_ASSOC)){
                    $folders[] = $row['id'];
                    $this->getFolders($row['id'], $folders);
                }
            }
            return $folders;
        }



}


return 'modSiteWebResourcesCascadeGetdataProcessor';