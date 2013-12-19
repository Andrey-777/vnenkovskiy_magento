<?php
class Test_Paginator_Helper_Data extends Mage_Core_Helper_Abstract
{    
    public function paginator($numberPage, $total, $countElements, $pagesOnPage = 5) 
    {                 
        $countPages = (int)ceil($total / $countElements);
        
        $pages = array('startFor'     => 1, 
                       'endFor'       => 6, 
                       'firstPage'    => 1,
                       'nextPage'     => $numberPage + 1,
                       'previousPage' => $numberPage - 1,
                       'lastPage'     => $countPages);

        $pages['hasNextPage']     = $numberPage != $countPages ? true : false;                
        $pages['hasPreviousPage'] = $numberPage > $pages['firstPage'] ? true : false;            
        $pages['isFirstPage']     = $numberPage > $pagesOnPage + 1 ? true : false;
        $pages['isLastPage']      = $numberPage < ($countPages - $pagesOnPage) ? true : false;            

        if ($numberPage == $countPages) {                           
            $pages['startFor'] = $numberPage - $pagesOnPage;
            $pages['endFor']   = $numberPage;
        } else {
            $pages['startFor'] = $numberPage > $pagesOnPage ? $numberPage - $pagesOnPage : 1;
            $pages['endFor']   = 
                ($numberPage + $pagesOnPage) > $countPages 
                    ? $countPages 
                    : $numberPage + $pagesOnPage;
        }              

        return $pages;
    }      
    
    public function getDomainName($link) 
    {
        preg_match("/^http\:\/\/(.*?)\/.*/i", $link . '/', $matches);
        
        return $matches[1];
    }
    
    public function getRowUrl($action = '', array $param = null) 
    {
        return $param ? str_replace('/index', '', Mage::getUrl("*/*/$action", $param)) : Mage::getUrl("*/$action");
    }
}
