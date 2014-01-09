<?php
class Test_MyModul_Controller_Routers_Router extends Mage_Core_Controller_Varien_Router_Abstract
{
    public static $VALID_ACTIONS = array('view', 'all', 'source', 'sourcenews');

    public function initControllerRouters($observer)
    {
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
            $action = (isset($data[1])) ? $data[1] : null;
        }
        
        $arrParams = array();
        
        if ($params = substr($data[1], $firstSlashPos + 1)) {                           
            $tempParams = explode('/', $params);        

            for($i = 0; $i < count($tempParams); $i++) {                
                $i % 2 == 0 ? $arrParams[$tempParams[$i]] = '' : $arrParams[$tempParams[$i - 1]] = $tempParams[$i];                                
            }
        }

        if (!$action || !in_array($action, self::$VALID_ACTIONS))
            return false;

        $request->setModuleName('mymodul')
            ->setControllerName('index')
            ->setActionName($action)
            ->setParams($arrParams);

        return true;        
    }
}