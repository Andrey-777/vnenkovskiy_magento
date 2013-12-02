<?php
    class Test_Paginator_Helper_Data extends Mage_Core_Helper_Abstract
    {
        public function paginator($numberPage, $quantityPagin) 
        {                           
            $pages = array('startFor' => 1, 'endFor' => 6, 'firstPage' => 1, 'lastPage' => $quantityPagin);

            if ($numberPage == $quantityPagin) {                           
                $pages['startFor'] = $numberPage - 5;
                $pages['endFor']   = $numberPage;
            } else {
                $pages['startFor'] = $numberPage > 5 ? $numberPage - 5 : 1;
                $pages['endFor']   = 
                    ($numberPage + 5) > $quantityPagin 
                        ? $quantityPagin 
                        : $numberPage + 5;
            }              

            return $pages;
        }        
    }
?>
