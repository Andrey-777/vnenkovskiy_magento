<?php
class Test_MyModul_Model_Resource_MyModul extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init('test_mymodul/mymodul', 'id');               
    }
}