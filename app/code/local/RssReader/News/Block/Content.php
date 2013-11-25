<?php
class RssReader_News_Block_Content extends Mage_Core_Block_Template
{
    protected function _construct()
    {       
        $this->setTemplate('RssReader/News/view.phtml');
    }
    
    public function getRowUrl(Freaks_Quotes_Model_Quote $quote)
    {
        return $this->getUrl('*/*/view', array(
            'id' => $quote->getId()
        ));
    }
    
    public function getCollection()
    {
        return Mage::getModel('RssReader_News/News')->getCollection();
    }
}