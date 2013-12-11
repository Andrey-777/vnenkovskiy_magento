<?php
class Test_MyModul_IndexController extends Mage_Core_Controller_Front_Action
{   
    public function indexAction()
    {
        $this->_myTheme();
         
        $this->loadLayout()
             ->renderLayout();         
    }

    public function sourceNewsAction()
    {
        $this->_myTheme();
        $sourceId = (int)$this->getRequest()->getParam('id');          
      
        $this->loadLayout();
        $this
            ->getLayout()
                ->getBlock('sourcenews.page')
                ->setSourceId($sourceId);
        $this->renderLayout();
    }    
//    public function sourceNewsAction()
//    {
//        $this->_myTheme();
//        $sourceId   = (int)$this->getRequest()->getParam('id');  
//        $collection = Mage::getModel('test_mymodul/mymodul')->getCollection()->addFilter('chanel_Id', $sourceId);        
//      
//        $this->loadLayout();
//        $this
//            ->getLayout()
//                ->getBlock('sourcenews.page')
//                ->setSourceNews($collection->getData());
//        $this->renderLayout();
//    }
    
    /*
    public function indexAction()
    {
        $this->_myTheme();
        
        try {
            $this->loadLayout()
                 ->renderLayout(); 
        } catch(Exception $e) {           
            if(Mage::getIsDeveloperMode())
            {
                echo $e->getMessage();            
            }
            Mage::logException($e);
            
        }
        return false;
    }
     * 
     */
    
    public function viewAction()
    {
        $this->_myTheme();
        
        $news_id = (int)$this->getRequest()->getParam('id');               
        $itemNews = Mage::getModel('test_mymodul/mymodul')->load($news_id);        
       
        if (!$itemNews->getId()) {
            $this
                ->getResponse()
                    ->setHeader('HTTP/1.1','404 Not Found')
                    ->setHeader('Status','404 File not found');          
            return $this->_forward('noRoute');
        }
        
        $this->loadLayout();
        $this
            ->getLayout()
                ->getBlock('news.item')
                ->setItemNews($itemNews);
        $this->renderLayout();                           
    }    
    
    protected function _myTheme() {
        Mage::getDesign()->setArea('frontend')
                         ->setPackageName('default')
                         ->setTheme('mytheme');           
    }
}