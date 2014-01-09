<?php
class Test_Mymodul_Model_Resource_Mymodul extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init('test_mymodul/mymodul', 'id');
    }
}