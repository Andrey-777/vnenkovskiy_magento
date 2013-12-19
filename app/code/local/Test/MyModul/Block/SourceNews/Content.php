<?php
class Test_MyModul_Block_SourceNews_Content extends Mage_Core_Block_Template
{
    protected $_rowUrl   = '';
    protected $_sourceId = 0;
    const COUNT_NEWS_ON_PAGE = 15; 
    
    protected function _construct()
    {             
        $this->_sourceId = Mage::registry('sourceId');        
        $this->_rowUrl   = Mage::helper('test_paginator')
                                ->getRowUrl('sourcenews', array('id'         => $this->_sourceId, 
                                                                'numberPage' => $numberPage));     
        Mage::register('countOnPage', self::COUNT_NEWS_ON_PAGE);
        Mage::register('countElements', $this->getCountNews());        
        Mage::register('rowUrl', $this->_rowUrl);
    }    
    
    public function getCollection()
    {                  
        $collection = Mage::getModel('test_mymodul/mymodul')
                        ->getCollection()
                          ->addFilter('chanel_Id', $this->_sourceId)
                          ->setOrder('pubDate', 'DESC')
                          ->setPageSize(self::COUNT_NEWS_ON_PAGE)
                          ->setCurPage($this->getRequest()->getParam('numberPage') ? : 1);
        
        return $collection->getData();
    }
    
    public function getRowUrl($id) 
    {        
        return $this->getUrl('*/*/view', array('id' => $id));
    }  

    public function getRowUrlPage($numberPage = '')
    {     
        return $this->getUrl('*/*/sourceNews', array('id' => $this->_sourceId, 'numberPage' => $numberPage));
    }
    
    public function getCountNews() {                           
        return (int)Mage::getModel('test_mymodul/mymodul')
                    ->getCollection()
                        ->addFilter('chanel_Id', $this->_sourceId)
                        ->count();
    }    
}

