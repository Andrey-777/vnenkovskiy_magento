<?php
    class Test_MyModul_Block_News_Content extends Mage_Core_Block_Template
    {
        protected function _construct()
        {                       
            $this->setTemplate('test/mymodul/news/view.phtml');
        }                   
        
        public function getNews()
        {          
            return Mage::getModel('test_mymodul/mymodul')->load($this->getNewsId());
        }        
    }

