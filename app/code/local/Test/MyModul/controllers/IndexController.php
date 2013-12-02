<?php
class Test_MyModul_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout()
             ->renderLayout();
    }
    
    public function viewAction()
    {
        $news_id = (int)$this->getRequest()->getParam('id');         
        $this->loadLayout();
        $this->getLayout()
           ->getBlock('news.item')
           ->setNewsId($news_id);
        $this->renderLayout();         
    }    
}