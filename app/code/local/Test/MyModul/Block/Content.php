<?php
class Test_MyModul_Block_Content extends Mage_Core_Block_Template
{
    protected function _construct()
    {
        $this->setTemplate('test/mymodul/view.phtml');
    }    
    /*
    protected function _getNews() 
    {
        $conf = array(
                        'host'     => 'localhost',
                        'username' => 'root',
                        'password' => '',
                        'dbname'   => 'rss'
                     );
        $_resource = Mage::getSingleton('core/resource');
        $_conn = $_resource->createConnection('customConnection', 'pdo_mysql', $conf);
        return $_conn->query('SELECT * FROM news N ORDER BY N.pubDate DESC')->fetchAll();
    }
     * 
     */
    
    public function getRowUrl($id) 
    {
        return $this->getUrl('*/*/view', array('id' => $id));
    }
    
    public function getCollection()
    {
        return Mage::getModel('test_mymodul/mymodul')->getCollection()->setOrder('pubDate', 'DESC');;
    }
}