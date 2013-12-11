<?php
class Test_MyModul_Block_SourceNews_Content extends Mage_Core_Block_Template
{
    public function getCollection()
    {
        $collection = Mage::getModel('test_mymodul/mymodul')
                        ->getCollection()
                          ->addFilter('chanel_Id', $this->getSourceId())
                          ->setOrder('pubDate', 'DESC')
                          ->setPageSize(15)
                          ->setCurPage(1);
        
        return $collection->getData();
    }
    
    public function getRowUrl($id) 
    {
        return $this->getUrl('*/*/view', array('id' => $id));
    }    
}
?>
