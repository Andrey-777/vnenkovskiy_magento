<?php
    class Test_Paginator_Helper_Data extends Mage_Core_Helper_Abstract
    {
        public function paginator($numberPage, $totalElements, $countElementsOnPage) 
        {                 
            $countPages = (int)ceil($totalElements / $countElementsOnPage);
            
            $pages = array('startFor'     => 1, 
                           'endFor'       => 6, 
                           'firstPage'    => 1,
                           'nextPage'     => $numberPage + 1,
                           'previousPage' => $numberPage - 1,
                           'lastPage'     => $countPages);
            
            $pages['isNextPage']     = $numberPage != $countPages ? true : false;                
            $pages['isPreviousPage'] = $numberPage > 1 ? true : false;            
            $pages['isFirstpPage']   = $numberPage > 6 ? true : false;
            $pages['isLastPage']     = $numberPage < ($countPages - 5) ? true : false;            
            
            if ($numberPage == $countPages) {                           
                $pages['startFor'] = $numberPage - 5;
                $pages['endFor']   = $numberPage;
            } else {
                $pages['startFor'] = $numberPage > 5 ? $numberPage - 5 : 1;
                $pages['endFor']   = 
                    ($numberPage + 5) > $countPages 
                        ? $countPages 
                        : $numberPage + 5;
            }              
                        
            return $pages;
        }        
    }
?>
