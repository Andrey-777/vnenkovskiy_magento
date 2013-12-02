<?php
class Test_MyModul_Block_Content extends Mage_Core_Block_Template
{   
    protected $_numberPage = 0;    
    
    const COUNT_NEWS_ON_PAGE = 15;        
    
    protected function _construct()
    {
        $this->_numberPage = (int)$this->getRequest()->getParam('numberPage') ? : 1;        
        $this->setTemplate('test/mymodul/view.phtml');                
    }        
    
    public function getRowUrl($id) 
    {
        return $this->getUrl('*/*/view', array('id' => $id));
    }
    
    public function getRowUrlPage($nambPage)
    {                
        return $this->getUrl('*/*/index', array('numberPage' => $nambPage));
    }
    
    public function getCollection()
    {     
        return Mage::getModel('test_mymodul/mymodul')->getCollection()
                                                     ->setOrder('pubDate', 'DESC')
                                                     ->setPageSize(self::COUNT_NEWS_ON_PAGE)
                                                     ->setCurPage($this->_numberPage);
    }   
    
    public function getCountNews() {
        return (int)Mage::getModel('test_mymodul/mymodul')->getCollection()->count();
    }
    
    public function getQuantityPage()
    {
        return (int)ceil($this->getCountNews() / self::COUNT_NEWS_ON_PAGE); 
    }  
}