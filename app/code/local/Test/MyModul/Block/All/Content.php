<?php
class Test_MyModul_Block_All_Content extends Mage_Core_Block_Template
{      
    protected $_rowUrl = ''; 
    
    const COUNT_NEWS_ON_PAGE = 15;        
  
    protected function _construct()
    {         
        $this->_rowUrl = $this->getRowUrlPage();     
        Mage::register('countOnPage', self::COUNT_NEWS_ON_PAGE);
        Mage::register('countElements', $this->getCountNews());
        Mage::register('rowUrl', $this->_rowUrl);
    }                               
    
    public function getRowUrl($action, array $param)
    {
        return $this->getUrl("*/*/$action", $param);
    }
    
    public function getRowUrlPage($numberPage = '')
    {
        return $this->getUrl('*/*/all', array('numberPage' => $numberPage));
    }        
    
    public function getCollection()
    {     
        $collection = Mage::getModel('test_mymodul/mymodul')->getCollection()
                                                     ->setOrder('pubDate', 'DESC')
                                                     ->setPageSize(self::COUNT_NEWS_ON_PAGE)
                                                     ->setCurPage($this->getRequest()->getParam('numberPage') ? : 1);
        
        $collection->getSelect()
                    ->join( array('c' => $collection->getTable('test_mymodul/chanel')), 
                            'main_table.chanel_Id = c.Id', array('c.link'));
        
        $listNews = $collection->getData();
        
        foreach($listNews as $index => $news) {
            $listNews[$index]['link'] = Mage::helper('test_paginator')->getDomainName($listNews[$index]['link']);
        }

        return $listNews;
    }        
    
    public function getCountNews() {
        return (int)Mage::getModel('test_mymodul/mymodul')->getCollection()->count();
    }
    
    public function getQuantityPage()
    {      
        return (int)ceil($this->getCountNews() / self::COUNT_NEWS_ON_PAGE); 
    }   
}