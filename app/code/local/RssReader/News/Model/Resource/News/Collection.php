<?php
class RssReader_News_Model_Resource_News_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    protected function _construct()
    {
        $this->_init('RssReader_News/news');
    }
}