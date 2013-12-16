<?php
class Test_MyModul_Block_News_Content extends Mage_Core_Block_Template
{   
    public function getNews()
    {         
echo "<pre>";
echo var_dump(Mage::helper('core/url')->getCurrentUrl());
echo "</pre>";        
        return $this->getItemNews();
    }        
}