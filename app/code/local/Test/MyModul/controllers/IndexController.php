<?php
class Test_MyModul_IndexController extends Mage_Core_Controller_Front_Action
{       
    protected function _construct() {
        Mage::getDesign()->setArea('frontend')
            ->setPackageName('default')
            ->setTheme('mytheme');               
    }
    
    public function indexAction()
    {
        $this->loadLayout()->renderLayout();         
    }
    
    public function sourceAction()
    {
        $this->loadLayout()->renderLayout();          
    }

    public function sourceNewsAction()
    {        
        $sourceId = (int)$this->getRequest()->getParam('id');  
        Mage::register('sourceId', $sourceId);
        
        $this->loadLayout();
        $this->getLayout()->getBlock('sourcenews.page');
        $this->renderLayout();
    }    
        
    public function allAction()
    {
        $this->loadLayout()->renderLayout(); 
        
    }
    
    public function viewAction()
    {
        $news_id = (int)$this->getRequest()->getParam('id');          
        $itemNews = Mage::getModel('test_mymodul/mymodul')->load($news_id);        
       
        if (!$itemNews->getId()) {
            $this
                ->getResponse()
                    ->setHeader('HTTP/1.1','404 Not Found')
                    ->setHeader('Status','404 File not found');          
            return $this->_forward('noRoute');
        }
        
        $this->loadLayout()->getLayout()
            ->getBlock('news.item')
            ->setItemNews($itemNews);
        $this->renderLayout();                           
    }        
}