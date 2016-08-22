<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function paginate_function( $current_page,$item_per_page,$total_records )
{
    
    
      $pagination = '';
      $minPagesForPaging = 3; 
      define('Offset', '2');
      $firstPage = 1;
      $lastPage;
      $previous       = $current_page - 1; //previous link 
      $next           = $current_page + 1;
         
        
      if ($total_records == 0){
          
          $total_pages = 1;
          $current_page = 1;
      }else{
          
      //  $total_pages =  (int)($total_records/$item_per_page)+(($total_records%$item_per_page)== 0) ? 0 : 1; 
         $total_pages=(($total_records % $item_per_page) ==0) ? (int)$total_records/$item_per_page : (int)($total_records/$item_per_page)+1;
         
         
      }
      $pagination .= '<div class="pagination-wrapper"> <ul class="pagination">';
      
       if ($total_pages == 1) {
           
            
            
            $pagination .=  '<li class="disabled"><a href="#" data-page="" title="Previous" >&lt;</a></li>';
            $pagination .= '<li><a href="#" data-page="1" title="Page 1">1</a></li>';
            $pagination .= '<li class="disabled"><a href="#" data-page="" title="Next" disabled>&gt;</a></li>';
            
        }else{
            $lastPage=$total_pages;
           $pagination.= '<li><a href="#" data-page="'.$previous.'" title="Previous" >&lt;</a></li>';
            if ($total_pages <= $minPagesForPaging){
                
                    for ($i = 1; $i <= $total_pages; $i++){ 
                       
                    $pagination .= '<li><a href="#" data-page="'.$i.'" title="Page'.$i.'">'.$i.'</a></li>';
                    }
                    $pagination .= '<li><a href="#" data-page="'.$next.'" title="Next">&gt;</a></li>';
                 
                }
            else{
               
               if ($current_page==$firstPage){
           
                    for($i=$current_page ;$i<= $current_page+Offset; $i++)
                    {
                  $pagination .= '<li><a href="#" data-page="'.$i.'" title="Page'.$i.'">'.$i.'</a></li>';  
                    }
                    $pagination .= '<li><a href="#" data-page="'.$total_pages.'" title="Last">..'.$total_pages.'</a></li>';
                  $pagination .= '<li><a href="#" data-page="'.$next.'" title="Next">&gt;</a></li>';
                  
                }
                else{
                     if ($current_page < $total_pages)
                        {

                            if ($total_pages - $firstPage <= Offset)
                            {

                                for ($i = (int)($current_page - $firstPage); i <= $current_page; $i++)
                                {
                                    $pagePrev = $i - 1;
                                    if ($pagePrev > 0) {   
                                        $pagination .= '<li><a href="#" data-page="'.$pagePrev.'" title="Page'.$pagePrev.'">'.$pagePrev.'</a></li>';  
                                    }
                                }
                            }
                            else
                            {
                               $pagination .= '<li><a href="#" data-page="1" title="First">..'.$firstPage.'</a></li>';
                               // res.Add(firstPage.ToString()+ prefixPage);
                                for ($i = $current_page - Offset; $i < $current_page; $i++)
                                {
                                    $pagePrev = $i;
                                    if ($pagePrev > $firstPage) {
                                    $pagination .= '<li><a href="#" data-page="'.$pagePrev.'" title="Page'.$pagePrev.'">'.$pagePrev.'</a></li>';  
                                    }
                                    //res.Add(pagePrev.ToString());
                                }
                            }

                            if ($current_page + Offset < $total_pages)
                            {
                                for ($i = $current_page; $i <= $current_page + Offset; $i++)
                                {  $pagination .= '<li><a href="#" data-page="'.$i.'" title="Page'.$i.'">'.$i.'</a></li>';}

                                $pagination .= '<li><a href="#" data-page="'.$total_pages.'" title="Page'.$total_pages.'">..'.$total_pages.'</a></li>';  
                               // res.Add(prefixPage + totalPages.ToString());
                            }
                            else
                            {
                                for ($i = $current_page; $i <= $total_pages; $i++)
                                {  $pagination .= '<li><a href="#" data-page="'.$i.'" title="Page'.$i.'">'.$i.'</a></li>'; }
                            }
                           
                            $pagination .= '<li><a href="#" data-page="'.$next.'" title="Next">&gt;</a></li>';
                        }
                        else //currentpage=totalpage
                        {

                             
                            $pagination .= '<li><a href="#" data-page="1" title="First">..'.$firstPage.'</a></li>';
                            for ($i = $current_page - Offset; $i <= $current_page; $i++)
                            { $pagination .= '<li><a href="#" data-page="'.$i.'" title="Page'.$i.'">'.$i.'</a></li>';}
                            //res.Add(Next);
                            $pagination .= '<li class="disabled"><a href="#" data-page="'.$next.'" title="Next">&gt;</a></li>';
                        }
                }
            }
      }
      
         $pagination .= '</ul></div>' ;
         
       return $pagination;
}

function paginate_function1( $current_page,$item_per_page,$total_records )
{
 
   //  echo $current_page, $item_per_page,$total_records;
    $total_pages=(($total_records % $item_per_page) ==0) ? (int)$total_records/$item_per_page : (int)($total_records/$item_per_page)+1;
     
    $pagination = '';
    if($total_pages > 0 && $total_pages != 1 && $current_page <= $total_pages){ //verify total pages and current page number
        $pagination .= '<div class="pagination-wrapper"> <ul class="pagination">';
        
        $right_links    = $current_page + 3; 
        $previous       = $current_page - 2; //previous link 
        $next           = $current_page + 1; //next link
        $first_link     = true; //boolean var to decide our first link
        
        if($current_page > 1){
	   $previous_link = ($previous==0)? 1: $previous;
            $pagination .= '<li class="active"><a href="#" data-page="1" title="First">&laquo;</a></li>'; //first link
            $pagination .= '<li><a href="#" data-page="'.$previous_link.'" title="Previous" >&lt;</a></li>'; //previous link
                for($i = ($current_page-2); $i < $current_page; $i++){ //Create left-hand side links
                    if($i > 0){
                        $pagination .= '<li><a href="#" data-page="'.$i.'" title="Page'.$i.'">'.$i.'</a></li>';
                    }
                }   
            $first_link = false; //set first link to false
        }
        
        if($first_link){ //if current active page is first link
            $pagination .= '<li class="active">'.$current_page.'</li>';
        }elseif($current_page == $total_pages){ //if it's the last active link
            $pagination .= '<li class="active"><span>'.$current_page.'</span></li>';
        }else{ //regular current link
            $pagination .= '<li class="active"><span>'.$current_page.'</span></li>';
        }
                
        for($i = $current_page+1; $i < $right_links-1 ; $i++){ //create right-hand side links
            if($i<=$total_pages){
                $pagination .= '<li><a href="#" data-page="'.$i.'" title="Page '.$i.'">'.$i.'</a></li>';
            }
        }
        if($current_page < $total_pages){ 
				$next_link = ($i > $total_pages) ? $total_pages : $i;
                $pagination .= '<li><a href="#" data-page="'.$next_link.'" title="Next">&gt;</a></li>'; //next link
                $pagination .= '<li class="active"><a href="#" data-page="'.$total_pages.'" title="Last">&raquo;</a></li>'; //last link
        }
        
        $pagination .= '</ul></div>' ; 
    }
    else
    {
        // condition si nbtotal=0  on affiche une seule page
    }
   // echo "pagination return".$pagination;
    return $pagination; //return pagination links
    
}