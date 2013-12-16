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
    
    public function custom_sef_url($id_path, $request_path, $target_path, $store_id ="0", $is_system=false){

        $isrewrite = Mage::getModel('core/url_rewrite')->load($id_path,id_path);

            if($isrewrite->url_rewrite_id !=""){
              throw new Exception("Your Id path must be unique, given id path already in use !");
            }

              $rewrite = Mage::getModel('core/url_rewrite');
              $rewrite->setStoreId($store_id)
                ->setIdPath($id_path)
                ->setRequestPath($request_path)
                ->setTargetPath($target_path)
                ->setIsSystem($is_system)
                ->save();        
        return;
    }    
}
