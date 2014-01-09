<?php
class Test_MyModul_Block_Sourcenews_Content extends Mage_Core_Block_Template
{
    protected $_sourceId = 0;
    
    const COUNT_NEWS_ON_PAGE = 15; 
    
    protected function _construct()
    {             
        $this->_sourceId = Mage::registry('sourceId');                  
        Mage::register('countOnPage', self::COUNT_NEWS_ON_PAGE);
        Mage::register('countElements', $this->getCountNews());        
        Mage::register('rowUrl', $this->getServiceHelper()            
            ->getRowUrl('sourcenews', array('id'         => $this->_sourceId, 
                                            'numberPage' => $numberPage)));
    }    
    
    public function getCollection()
    {
        $collection = $this->getModel()
                        ->getCollection()
                          ->addFilter('chanel_Id', $this->_sourceId)
                          ->setOrder('pubDate', 'DESC')
                          ->setPageSize(self::COUNT_NEWS_ON_PAGE)
                          ->setCurPage($this->getRequest()->getParam('numberPage') ? : 1);
        
        return $collection->getData();
    }
        
    public function getCountNews() {                           
        return (int)$this->getModel()
                    ->getCollection()
                        ->addFilter('chanel_Id', $this->_sourceId)
                        ->count();
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

