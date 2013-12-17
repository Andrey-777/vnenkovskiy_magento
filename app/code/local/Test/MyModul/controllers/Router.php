<?php
class Test_MyModul_Controllers_Router extends Mage_Core_Controller_Varien_Router_Abstract
{
    private static $_module = 'test_mymodul';
    private static $_realModule = 'Test_MyModul';
    private static $_controller = 'index';
    private static $_controllerClass = 'Test_MyModul_IndexController';
    private static $_action = 'view';    
    
    public function __construct() {
echo "<pre>";
echo var_dump('AAAAAAAAAAAAAA');
echo "</pre>";
    }

        /**
     * @var Zend_Controller_Request_Http
     */
    protected $_request;

    /**
     * Front controller looks for collectRoutes() although it is not defined
     * in abstract router class!
     * 
     * (non-PHPdoc)
     * @see Mage_Core_Controller_Varien_Router_Standard::collectRoutes()
     */
    public function collectRoutes()
    {
echo "<pre>";
echo var_dump(Mage::getUrl('*/*/', array('BBBBBB' => 1)));
echo "</pre>"; 
        // nothing to do here
    }

    /* (non-PHPdoc)
     * @see Mage_Core_Controller_Varien_Router_Abstract::match()
     */
    public function match(Zend_Controller_Request_Http $request)
    {
echo "<pre>";
echo var_dump('CCCCCCCCCCCCCCCCC');
echo "</pre>";        
        $this->_request = $request;

        // here you will have to implement your matching:
        // - detect if the request should be matched by this router
        //   (i.e. check for "frontname" after base url)
        // - return false if not

        // - otherwise:
        $this->_setRequestRoute();
        $this->_dispatch();
        return true;
    }
    /**
     * @return void
     */
    protected function _setRequestRoute()
    {
echo "<pre>";
echo var_dump('DDDDDDDDDDDDD');
echo "</pre>";        
        $this->_request->setModuleName(self::$_module);
        $this->_request->setControllerName(self::$_controller);
        $this->_request->setActionName(self::$_action);
        $this->_request->setControllerModule(self::$_realModule);

    }
    /**
     * @return void
     */
    protected function _dispatch()
    {
echo "<pre>";
echo var_dump('EEEEEEEEEEEEEEEE');
echo "</pre>";        
        $this->_request->setDispatched(true);
        $controller = Mage::getControllerInstance(
            self::$_controllerClass, $this->_request, $this->_response
        );
        $controller->dispatch(self::$_action);
    }
    
    
    
//    public function initControllerRouters($observer)
//    {     
//        /* @var $front Mage_Core_Controller_Varien_Front */
//        $front = $observer->getEvent()->getFront();
//
////        $front->addRouter('test_mymodul', $this);
//        $front->addRouter('mymodul_index', $this);         
//    }           
    
//    public function match(Zend_Controller_Request_Http $request)
//    {              
//echo "<pre>";
//echo var_dump('in match');
//echo "</pre>";         
//        $request->setModuleName('test_mymodul')        
//                    ->setControllerName('index')
//                    ->setActionName('index');
//echo "<pre>";
//echo var_dump($request);
//echo "</pre>";        
//
//        return true;
//    }
}