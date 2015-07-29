<?php 

function statusColor($status)
{
	$statusret = "";
	switch($status){
		case "Under Investigation":
			$statusret = ' style="color:yellow;"';
		break;
		case "Confirmed":
			$statusret = ' style="color:red;"';
		break;
		default:
			$statusret = ' style="color:white;"';
		break;
	}
	return $statusret;
}

function calcRates($rate, $amount, $type)
{
		$ret ="";
		switch ($type)
		{
			case "nxtogold":
				$ret = number_format(($rate + 100) * $amount);
			break;
			case "goldtonx":
				$ret = ($rate * $amount);
			break;
			default:
				$ret = "Input type not set!";
			break;
		}
		return $ret;
}

function paginate($item_per_page, $current_page, $total_records, $total_pages, $page_url)
{
    $pagination = '';
    if($total_pages > 0 && $total_pages != 1 && $current_page <= $total_pages){ //verify total pages and current page number
        $pagination .= '<ul class="pagination">';
        
        $right_links    = $current_page + 3; 
        $previous       = $current_page - 3; //previous link 
        $next           = $current_page + 1; //next link
        $first_link     = true; //boolean var to decide our first link
        
        if($current_page > 1){
            $previous_link = ($previous==0)?1:$previous;
            $pagination .= '<li class="first"><a href="'.$page_url.'?page=1" title="First">&laquo;</a></li>'; //first link
            $pagination .= '<li><a href="'.$page_url.'?page='.$previous_link.'" title="Previous">&lt;</a></li>'; //previous link
                for($i = ($current_page-2); $i < $current_page; $i++){ //Create left-hand side links
                    if($i > 0){
                        $pagination .= '<li><a href="'.$page_url.'?page='.$i.'">'.$i.'</a></li>';
                    }
                }   
            $first_link = false; //set first link to false
        }
        
        if($first_link){ //if current active page is first link
            $pagination .= '<li class="first active">'.$current_page.'</li>';
        }elseif($current_page == $total_pages){ //if it's the last active link
            $pagination .= '<li class="last active">'.$current_page.'</li>';
        }else{ //regular current link
            $pagination .= '<li class="active">'.$current_page.'</li>';
        }
                
        for($i = $current_page+1; $i < $right_links ; $i++){ //create right-hand side links
            if($i<=$total_pages){
                $pagination .= '<li><a href="'.$page_url.'?page='.$i.'">'.$i.'</a></li>';
            }
        }
        if($current_page < $total_pages){ 
                $next_link = ($i > $total_pages)? $total_pages : $i;
                $pagination .= '<li><a href="'.$page_url.'?page='.$next_link.'" >&gt;</a></li>'; //next link
                $pagination .= '<li class="last"><a href="'.$page_url.'?page='.$total_pages.'" title="Last">&raquo;</a></li>'; //last link
        }
        
        $pagination .= '</ul>'; 
    }
    return $pagination; //return pagination links
}