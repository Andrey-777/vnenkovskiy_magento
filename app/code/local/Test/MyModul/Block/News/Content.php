<?php
class Test_MyModul_Block_News_Content extends Mage_Core_Block_Template
{   
    public function getNews()
    {         
        return $this->getItemNews();
    }        
}