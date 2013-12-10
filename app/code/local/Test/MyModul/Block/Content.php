<?php
class Test_MyModul_Block_Content extends Mage_Core_Block_Template
{      
    protected $_rowUrl     = ''; 
    
    const COUNT_NEWS_ON_PAGE = 15;        
  
    protected function _construct()
    {
        $this->_rowUrl     = $this->getRowUrlPage();
echo "<pre>";
echo var_dump($this->getLayout());
echo "</pre>";        
        Mage::register('countOnPage', self::COUNT_NEWS_ON_PAGE);
        Mage::register('countElements', $this->getCountNews());
        Mage::register('rowUrl', $this->_rowUrl);
    }                       
    
    public function getRowUrl($id) 
    {
        return $this->getUrl('*/*/view', array('id' => $id));
    }
    
    public function getRowUrlPage($numberPage = '')
    {
        return $this->getUrl('*/*/index', array('numberPage' => $numberPage));
    }
    
    public function getCollection()
    {     
        return Mage::getModel('test_mymodul/mymodul')->getCollection()
                                                     ->setOrder('pubDate', 'DESC')
                                                     ->setPageSize(self::COUNT_NEWS_ON_PAGE)
                                                     ->setCurPage($this->getRequest()->getParam('numberPage') ? : 1);
    }   
    
    public function getCountNews() {
        return (int)Mage::getModel('test_mymodul/mymodul')->getCollection()->count();
    }
    
    public function getQuantityPage()
    {
        return (int)ceil($this->getCountNews() / self::COUNT_NEWS_ON_PAGE); 
    }  
}