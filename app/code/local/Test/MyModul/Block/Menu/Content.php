<?php
class Test_MyModul_Block_Menu_content extends Mage_Core_Block_Template
{   
    public function getRowUrl($action)
    {
        return $this->getUrl("*/$action");
//        return $this->getUrl("*/*/$action");
    }
}
