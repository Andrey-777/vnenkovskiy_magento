<?php
class Test_MyModul_Block_All_Content extends Mage_Core_Block_Template
{      
    const COUNT_NEWS_ON_PAGE = 15;        
  
    protected function _construct()
    {
        Mage::register('countOnPage', self::COUNT_NEWS_ON_PAGE);
        Mage::register('countElements', $this->getCountNews());
        Mage::register('rowUrl', Mage::helper('test_paginator')->getRowUrl('all'));
    }                               
    
    public function getCollection()
    {   
        $collection = $this->getModel()
            ->getCollection()
                ->setOrder('pubDate', 'DESC')
                ->setPageSize(self::COUNT_NEWS_ON_PAGE)
                ->setCurPage($this->getRequest()->getParam('numberPage') ? : 1);
        $collection->getSelect()
            ->join( array('c' => $collection->getTable('test_mymodul/chanel')), 
                    'main_table.chanel_Id = c.Id', array('c.link'));
        return $collection;
    }        
    
    public function getCountNews() {
        return (int)$this->getModel()->getCollection()->count();
    }
    
    public function getQuantityPage()
    {      
        return (int)ceil($this->getCountNews() / self::COUNT_NEWS_ON_PAGE); 
    }
    
    protected function getModel()
    {
        return Mage::getModel('test_mymodul/mymodul');
    }
    
    protected function getServiceHelper()
    {
        return Mage::helper('test_paginator');
    }
}