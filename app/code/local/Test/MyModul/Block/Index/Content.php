<?php
class Test_MyModul_Block_Index_Content extends Mage_Core_Block_Template
{    
    public function getCollection()
    {         
        $collection = Mage::getModel('test_mymodul/mymodul')->getCollection();
        $collection->getSelect()
                    ->join( array('c' => $collection->getTable('test_mymodul/chanel')), 
                            'main_table.chanel_Id = c.Id', array('c.name', 'c.link', 'count_news' => 'COUNT(main_table.id)'))
                    ->group('c.name');

        return $collection->getData();                 
    }
    
    public function getRowUrl($id) 
    {
        return $this->getUrl('*/*/sourcenews', array('id' => $id));
    }
}
?>
