<?php
/*
    Получаем данные корзины
*/
require_once MODX_CORE_PATH . 'components/modxsite/processors/site/web/getdata.class.php';

class modBasketMgrOrdersProductsGetdataProcessor extends modSiteWebGetdataProcessor{
    
    public $classKey = 'OrderProduct';
    
    protected $sum = 0;         // Общая сумма заказа
    protected $original_sum = 0;         // Общая сумма заказа без учета скидки
    protected $positions = 0;   // Количество позиций
    protected $quantity = 0;    // Общее количество товаров
    protected $discount = 0;    // Скидка. Todo: Надо будет переделать, так как сейчас это не расчитано на выборку более одного заказа
    
    
    public function prepareQueryBeforeCount(xPDOQuery $c){
        $c = parent::prepareQueryBeforeCount($c);
        
        $where = array();
        
        if($order_id = (int)$this->getProperty('order_id')){
            $where['order_id'] = $order_id;
        }
        
        if(!$this->getProperty('show_canceled', false)){
            $where['quantity:>'] = 0;
        }
        
        if($where){
            $c->where($where);
        }
        
        return $c;
    }
    
    public function setSelection(xPDOQuery $c){
        $c = parent::setSelection($c);
        
        $c->innerJoin('Order');
        $c->innerJoin('ShopmodxProduct', 'Product');
        $c->leftJoin('modResource', "currency_doc", "currency_doc.id = {$this->classKey}.currency_id");
        
        $c->select(array(
            "Product.resource_id",  
            "{$this->classKey}.price as order_price",
            "{$this->classKey}.quantity as order_quantity", 
            "{$this->classKey}.currency_id as order_currency", 
            "currency_doc.pagetitle as order_currency_code", 
        ));
        
        if($columns = $this->modx->getSelectColumns('Order', 'Order', 'order_', array ('id'), true)){
            $c->select(explode(",", $columns));
        }
        
        return $c;
    }
    
    public function afterIteration(array $list){
        $list = parent::afterIteration($list);
        
        $this->quantity = 0;
        $this->sum = 0;
        
        // Получаем id всех товаров и подсчитываем общее число товаров и сумму
        $ids = array();
        foreach($list as $l){
            $this->quantity += $l['quantity'];
            
            $sum = $l['quantity'] * $l['price'];
            $this->original_sum += $sum;
            
            if(!empty($l['order_discount'])){
                $this->discount = $l['order_discount'];
                $sum = round($sum * ((100 - $l['order_discount']) / 100), 2);
            }
            
            $this->sum += $sum;
            $ids[] = $l['resource_id'];
        }
        
        // Получаем данные товаров
        $resources = array();
        
        if($ids){
            $ids = array_unique($ids);
            
            if(
                $response = $this->modx->runProcessor('web/catalog/products/getdata', array(
                    "limit"    => 0,
                    "showhidden"    => true,
                    "where" => array(
                        "id:in" => $ids,
                    ),    
                ), array(
                    'processors_path' => MODX_CORE_PATH . 'components/modxsite/processors/',    
                ))
                AND $resources = $response->getObject())
            {
                // print_r($response->getResponse());
                foreach($list as & $l){
                    if(!empty($resources[$l['resource_id']])){
                        $l = array_merge($resources[$l['resource_id']], $l);
                    }
                }
            }
            
        }
        
        return $list;
    }
    
    public function outputArray(array $array, $count = false){
        $result = parent::outputArray($array, $count);
        
        $result['sum'] = $this->sum;
        $result['original_sum'] = $this->original_sum;
        $result['discount'] = $this->discount;
        $result['quantity'] = $this->quantity;
        $result['positions'] = $count;
        
        return $result;
    }    
    
}

return 'modBasketMgrOrdersProductsGetdataProcessor';