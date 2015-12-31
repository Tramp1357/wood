<?php

/*
    Форма обратной связи
*/

require_once dirname(dirname(dirname(__FILE__))) . '/site/web/form.class.php';

class modWebFormsCallorderProcessor extends modSiteWebFormProcessor{

    protected $manager_message_tpl = "message/forms/callorder.tpl";
    

    public function initialize(){
        

        return parent::initialize();
    }


	protected function getManagerMailSubject(){
		$site_name = $this->modx->getOption('site_name');
		$subject = "Заказ телефонного звонка с сайта «{$site_name}»";
		return $subject;
	}

    /*
        Example: 
        $fields = array(
            'email' => array(
                'required' => true,
                'noparse' => true, (jevix фильтрация, по умолчанию выполняется)
                'error_message' => 'Fill email',
            ),
        );
    */
    protected function getFields(){
        $fields = array_merge(
            parent::getFields(), array(
                'phone' => array(
	                'required' => true,
                    'error_message' => 'Укажите телефон',
                ), 
                'fullname' => array(
                    'required' => true,
                    'error_message' => 'Укажите имя',
                ), 
            )
        );
        return $fields;
    }
    
}


return 'modWebFormsCallorderProcessor';

