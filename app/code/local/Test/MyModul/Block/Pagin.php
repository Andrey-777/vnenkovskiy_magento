<?php
class Test_MyModul_Block_Pagin extends Mage_Core_Block_Template
{
    protected $_numberPage = 0;
    protected $_pages      = array();
    protected $_rowUrl     = '';        
    
    function __construct() {    
        if (is_null(Mage::registry('countElements')) || 
            is_null(Mage::registry('countOnPage')) || is_null(Mage::registry('rowUrl'))) 
        {                       
            throw new Exception('Register does not has required values for Test_MyModul_Block_Pagin');
        } else {
            $this->_rowUrl     = Mage::registry('rowUrl');
            $this->_numberPage = (int)$this->getRequest()->getParam('numberPage') ? : 1;        
            $this->_pages      = Mage::helper('test_paginator')->paginator( 
                $this->_numberPage,
                Mage::registry('countElements'), 
                Mage::registry('countOnPage')
            );         
        }
    }
}
?>
