<?php
class RssReader_News_Block_Content extends Mage_Core_Block_Template
{   
    protected function _construct()
    {            
        $this->setTemplate('RssReader/News/view.phtml');
    }   
    
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
}