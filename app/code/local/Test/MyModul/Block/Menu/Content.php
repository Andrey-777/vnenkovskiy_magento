<?php
class Test_MyModul_Block_Menu_content extends Mage_Core_Block_Template
{
    protected function getServiceHelper()
    {
        return Mage::helper('test_paginator');
    }    
}
