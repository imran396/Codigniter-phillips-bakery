<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Date Format
 *
 * Returns formatted date by given timestamp
 *
 * @access	public
 * @param	integer	a number of seconds
 * @param	integer	php date format
 * @return	string
 */

if ( ! function_exists('make_paging')){
    function make_paging($base_url, $total_rows, $url_segment, $per_page = 10, $num_links = 5){
        $CI =& get_instance();
        $CI->load->library('pagination');
        $config['base_url'] = $base_url;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
        $config['first_link'] = 'First';
        $config['next_link']= 'Next';
        $config['prev_link']= 'Prev';
        $config['last_link']= 'Last';

        $config['num_links'] = $num_links;
        $config['uri_segment'] = $url_segment;
        $config['full_tag_open'] = '';
        $config['full_tag_close'] = '';
        $config['cur_tag_open'] = '<li class="active"><a href="javascript:;" >';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '';
        $config['num_tag_close'] = '';
        $CI->pagination->initialize($config);
        return $CI->pagination->create_links();
    }
}

if ( ! function_exists('paging')){

    function paging($page,$rp,$total,$limit)
    {
        $limit -= 1;

        $mid = floor($limit/2);

        if ($total>$rp)
            $numpages = ceil($total/$rp);
        else
            $numpages = 1;

        if ($page>$numpages) $page = $numpages;

        $npage = $page;

        while (($npage-1)>0&&$npage>($page-$mid)&&($npage>0))
            $npage -= 1;

        $lastpage = $npage + $limit;

        if ($lastpage>$numpages)
        {
            $npage = $numpages - $limit + 1;
            if ($npage<0) $npage = 1;
            $lastpage = $npage + $limit;
            if ($lastpage>$numpages) $lastpage = $numpages;
        }

        while (($lastpage-$npage)<$limit) $npage -= 1;

        if ($npage<1) $npage = 1;

        $paging['first'] = 1;
        if ($page>1) $paging['prev'] = $page - 1; else $paging['prev'] = 1;
        $paging['start'] = $npage;
        $paging['end'] = $lastpage;
        $paging['page'] = $page;
        if (($page+1)<$numpages) $paging['next'] = $page + 1; else $paging['next'] = $numpages;
        $paging['last'] = $numpages;
        $paging['total'] = $total;
        $paging['iend'] = $page * $rp;
        $paging['istart'] = ($page * $rp) - $rp + 1;

        if (($page * $rp)>$total) $paging['iend'] = $total;

        return $paging;
    }

}
if ( ! function_exists('paginate')){

    function paginate($targetpage,$totalData,$page,$limits) {

    $stages = 3;
    $paginate="";
    // Initial page num setup
    if ($page == 0){$page = 1;}
    $prev = $page - 1;
    $next = $page + 1;
    $lastpage = ceil($totalData/$limits);
    $LastPagem1 = $lastpage - 1;

    if($lastpage > 1)
    {

        $paginate .= "<ul>";
        // Previous
        if ($page > 1){
            $paginate.= "<li><a class='arrowPrev' href='$targetpage/$prev'>← Previous</a></li>";
        }else{
            $paginate.= "<li class='prev disabled' ><a href='#'>← Previous</a></li>";
        }



        // Pages
        if ($lastpage < 7 + ($stages * 2))	// Not enough pages to breaking it up
        {
            for ($counter = 1; $counter <= $lastpage; $counter++)
            {
                if ($counter == $page){
                    $paginate.= "<li  class='active'><a href='#'>$counter</a></li>";
                }else{
                    $paginate.= "<li><a href='$targetpage/$counter'>$counter</a></li>";}
            }
        }
        elseif($lastpage > 5 + ($stages * 2))	// Enough pages to hide a few?
        {
            // Beginning only hide later pages
            if($page < 1 + ($stages * 2))
            {
                for ($counter = 1; $counter < 4 + ($stages * 2); $counter++)
                {
                    if ($counter == $page){
                        $paginate.= "<li class='active'><a href='#'>$counter</a></li>";
                    }else{
                        $paginate.= "<li><a href='$targetpage/$counter'>$counter</a></li>";}
                }
                $paginate.= "<li><a href='#'>...</a></li>";
                $paginate.= "<li><a href='$targetpage/$LastPagem1'>$LastPagem1</a></li>";
                $paginate.= "<li><a href='$targetpage/$lastpage'>$lastpage</a></li>";
            }
            // Middle hide some front and some back
            elseif($lastpage - ($stages * 2) > $page && $page > ($stages * 2))
            {
                $paginate.= "<li><a href='$targetpage/1'>1</a></li>";
                $paginate.= "<li><a href='$targetpage/2'>2</a></li>";
                $paginate.= "<li><a href='#'>...</a></li>";
                for ($counter = $page - $stages; $counter <= $page + $stages; $counter++)
                {
                    if ($counter == $page){
                        $paginate.= "<li class='active' ><a href='#'>$counter</a></li>";
                    }else{
                        $paginate.= "<li><a href='$targetpage/$counter'>$counter</a></li>";}
                }
                $paginate.= "<li><a href='#'>...</a></li>";
                $paginate.= "<li><a href='$targetpage/$LastPagem1'>$LastPagem1</a></li>";
                $paginate.= "<li><a href='$targetpage/$lastpage'>$lastpage</a></li>";
            }
            // End only hide early pages
            else
            {
                $paginate.= "<li><a href='$targetpage/1'>1</a></li>";
                $paginate.= "<li><a href='$targetpage/2'>2</a></li>";
                $paginate.= "<li><a href='#'>...</a></li>";
                for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
                {
                    if ($counter == $page){
                        $paginate.= "<li class='active' ><a href='#'>$counter</a></li>";
                    }else{
                        $paginate.= "<li><a href='$targetpage/$counter'>$counter</a></li>";}
                }
            }
        }

        // Next
        if ($page < $counter - 1){
            $paginate.= "<li class='arrowNext' ><a  href='$targetpage/$next'>next</a></li>";
        }else{
            $paginate.= "<li class='prev disabled'><a href='#'>next</a></li>";
        }
        $paginate.= "</ul>";
    }

    // echo $tpages.' Results';
    // pagination
    return $paginate;

    }
}
if ( ! function_exists('production_paginate')){

    function production_paginate($targetpage,$totalData,$page,$limits) {

        $stages = 3;
        $paginate="";
        // Initial page num setup
        if ($page == 0){ $page = 1;}
        $prev = $page - 1;
        $next = $page + 1;
        $lastpage = ceil($totalData/$limits);
        $LastPagem1 = $lastpage - 1;

        if($lastpage > 1)
        {

            $paginate .= "<ul>";
            // Previous
            if ($page > 1){
                $paginate.= "<li><a class='arrowPrev' href='$targetpage/$prev'>&lsaquo;</a></li>";
            }else{
                $paginate.= "<li class='prev disabled' ><a href='#'>&lsaquo;</a></li>";
            }



            // Pages
            if ($lastpage < 7 + ($stages * 2))	// Not enough pages to breaking it up
            {
                for ($counter = 1; $counter <= $lastpage; $counter++)
                {
                    if ($counter == $page){
                        $paginate.= "<li  class='active'><a href='#'>$counter</a></li>";
                    }else{
                        $paginate.= "<li><a href='$targetpage/$counter'>$counter</a></li>";}
                }
            }
            elseif($lastpage > 5 + ($stages * 2))	// Enough pages to hide a few?
            {
                // Beginning only hide later pages
                if($page < 1 + ($stages * 2))
                {
                    for ($counter = 1; $counter < 4 + ($stages * 2); $counter++)
                    {
                        if ($counter == $page){
                            $paginate.= "<li class='active'><a href='#'>$counter</a></li>";
                        }else{
                            $paginate.= "<li><a href='$targetpage/$counter'>$counter</a></li>";}
                    }
                    $paginate.= "<li><a href='#'>...</a></li>";
                    $paginate.= "<li><a href='$targetpage/$LastPagem1'>$LastPagem1</a></li>";
                    $paginate.= "<li><a href='$targetpage/$lastpage'>$lastpage</a></li>";
                }
                // Middle hide some front and some back
                elseif($lastpage - ($stages * 2) > $page && $page > ($stages * 2))
                {
                    $paginate.= "<li><a href='$targetpage/1'>1</a></li>";
                    $paginate.= "<li><a href='$targetpage/2'>2</a></li>";
                    $paginate.= "<li><a href='#'>...</a></li>";
                    for ($counter = $page - $stages; $counter <= $page + $stages; $counter++)
                    {
                        if ($counter == $page){
                            $paginate.= "<li class='active' ><a href='#'>$counter</a></li>";
                        }else{
                            $paginate.= "<li><a href='$targetpage/$counter'>$counter</a></li>";}
                    }
                    $paginate.= "<li><a href='#'>...</a></li>";
                    $paginate.= "<li><a href='$targetpage/$LastPagem1'>$LastPagem1</a></li>";
                    $paginate.= "<li><a href='$targetpage/$lastpage'>$lastpage</a></li>";
                }
                // End only hide early pages
                else
                {
                    $paginate.= "<li><a href='$targetpage/1'>1</a></li>";
                    $paginate.= "<li><a href='$targetpage/2'>2</a></li>";
                    $paginate.= "<li><a href='#'>...</a></li>";
                    for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
                    {
                        if ($counter == $page){
                            $paginate.= "<li class='active' ><a href='#'>$counter</a></li>";
                        }else{
                            $paginate.= "<li><a href='$targetpage/$counter'>$counter</a></li>";}
                    }
                }
            }

            // Next
            if ($page < $counter - 1){
                $paginate.= "<li class='arrowNext' ><a  href='$targetpage/$next'>&rsaquo;</a></li>";
            }else{
                $paginate.= "<li class='prev disabled'><a href='#'>&rsaquo;</a></li>";
            }
            $paginate.= "</ul>";
        }

        // echo $tpages.' Results';
        // pagination
        return $paginate;

    }
}

/* End of file date_helper.php */
/* Location: ./application/helpers/functions_helper.php */