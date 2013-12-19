<?php
echo "<pre>";
echo var_dump('!!!!!!!!!!!!!!!!!!!!!!!!');
echo "</pre>";

class Test_MyModul_Controllers_Router extends Mage_Core_Controller_Varien_Router_Abstract
{
    public static $VALID_ACTIONS = array('view', 'all', 'source', 'sourcenews');    
    
    public function initControllerRouters($observer)
    {
        /* @var $front Mage_Core_Controller_Varien_Front */
        $front = $observer->getEvent()->getFront();
        $front->addRouter('mymodul_index', $this);
    }
    
    public function match(Zend_Controller_Request_Http $request) 
    {
        $pathInfo = trim($request->getPathInfo(), '/');
        preg_match('/^mymodul\/(.*)$/', $pathInfo, $data);                        
   
        if ($firstSlashPos = strpos($data[1], '/')) {
            $action = (isset($data[1])) ? substr($data[1], 0, $firstSlashPos) : null;                
        } else {
            $action = (isset($data[1]))?$data[1]:null;
        }
        
        $newArr = array();
        
        if ($strParam = substr($data[1], $firstSlashPos + 1)) {                   
            //$strParam = substr($data[1], $firstSlashPos + 1);        
            $arrParam = explode('/', $strParam);        

            for($i = 0; $i < count($arrParam); $i++) {
                if($i % 2 == 0) {
                    $newArr[$arrParam[$i]] = '';
                } else {
                    $newArr[$arrParam[$i - 1]] = $arrParam[$i];
                }
            }
        }
        
        //$action = (isset($data[1]))?$data[1]:null;

        if (!$action || !in_array($action, self::$VALID_ACTIONS))
            return false;

        $request->setModuleName('mymodul')
            ->setControllerName('index')
            ->setActionName($action)
            ->setParams($newArr);

        return true;        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
//    private static $_module = 'mymodul';
//    private static $_realModule = 'Test_MyModul';
//    private static $_controller = 'index';
//    private static $_controllerClass = 'Test_MyModul_Controllers_Index';
//    private static $_action = 'view';    
//
//    /**
//     * @var Zend_Controller_Request_Http
//     */
//    protected $_request;
//    
//    public function __construct() {
//    }
//
//    public function initControllerRouters($observer)
//    {
//        $front = $observer->getEvent()->getFront();
//
//        $front->addRouter('mymodul', $this);
//    }    
//    
//    public function match(Zend_Controller_Request_Http $request)
//    {        
//        $this->_request = $request;
//        $identifier = trim($request->getPathInfo(), '/');
//
//        $temp = strpos($identifier, '/');         
//        $temp = strpos($identifier, '/', $temp + 1);
//        $str = substr($identifier, 0, $temp + 1);
//echo "<pre>";
//echo var_dump($str);
//echo "</pre>";  
//
//  
//        //If Magento Is Not Installed Reroute To Installer
//        if (!Mage::isInstalled()) {
//            Mage::app()->getFrontController()->getResponse()
//                ->setRedirect(Mage::getUrl('install'))
//                ->sendResponse();
//            exit;
//        }
//        //If we dont match our router then let another router take over
//        if(!substr($identifier,0,strlen('mymodul')) == 'mymodul'){
//            return false;
//        }
//        //If we do match the our router then lets add some data and dispatch our controller
//            else{
////            $route_params = str_replace ( "mymodul/" , "" , $identifier );
//            $rewrite = Mage::getModel('core/url_rewrite');
//            $rewrite->setStoreId(1);
//            
//            $str1 = $rewrite->loadByIdPath('view');           
//            
////            $rewrite->loadByRequestPath($str);           
//            $category_route = $rewrite->getIdPath();
//            
//                //Check to see if the route exists before we do anything else
//                if(!$category_route != ""){
//                    return false;
//                }//Otherwise send the parameters to the request
//                else{
//                    //$id = str_replace ( "category/" , "" , $category_route );
////                    $this->_request->setParam('id', 20550);          
//                }
//            }
//            $this->_setRequestRoute();
//
//            return true;
//        }   
//        
//        protected function _setRequestRoute()
//        {
//            $this->_request->setModuleName(self::$_module)
//                ->setControllerName(self::$_controller)
//                ->setActionName(self::$_action)
//                ->setControllerModule(self::$_realModule);   
//echo "<pre>";
//echo var_dump($this->_request);
//echo "</pre>";
////die();
//            return true;
//        }            
}