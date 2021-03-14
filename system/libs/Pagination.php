<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 06.02.2021
 * Time: 14:17
 */

namespace system\libs;


class Pagination
{
    public $curPage;
    public $perPage;
    public $total;
    public $countPages;
    public $uri;

    /**
     * Pagination constructor.
     * @param $page -  $_GET['page]
     * @param $perPage //quantity per page
     * @param $total // total entries
     * @param $countPages //total number of pages
     * @param $uri // string
     */
    public function __construct($page, $perPage, $total)
    {
        $this->perPage = $perPage;
        $this->total = $total;
        $this->countPages = $this->getCountPages();
        $this->curPage = $this->getCurrentPage($page);
        $this->uri = $this->getParams();
    }

    /**
     * get total number of pages
     * @return false|float|int
     */
    public function getCountPages()
    {
        return ceil($this->total / $this->perPage) ?: 1;
    }

    /** get current page number
     * @param $page
     * @return false|float|int
     */
    public function getCurrentPage($page)
    {
        if($page > $this->countPages){

            $page = $this->countPages;
        }
        return $page;
    }

    /**
     * Start number
     * @return float|int
     */
    public function getStart()
    {
        return ($this->curPage - 1) * $this->perPage;
    }

    /**
     * $_GET param
     * @return array|string
     */
    public function getParams()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $ar_uri = explode("?", $uri);

        $uri = $ar_uri[0] . "?";
        if(isset($ar_uri[1]) && $ar_uri[1] != '')
        {
            $params = explode("&", $ar_uri[1]);
            foreach ($params as $param)
            {
                if(!preg_match("/page=/", $param)){
                    $uri .= $param . '&';
                }
            }
        }
        return $uri;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getHtml();
    }

    /**
     * html - pagination page
     * @return string
     */
    public function getHtml()
    {
        $back = null;//
        $forward = null;
        $startpage = null;
        $endpage = null;
        $page1left = null;
        $page2left = null;
        $page1right = null;
        $page2right = null;

        if($this->curPage > 1){
            $back = '<li><a class="page-link" href="' . $this->uri . 'page=' . ($this->curPage - 1) . '">&lt;</a></li>';
        }

        if($this->curPage < $this->countPages){
            $forward = '<li><a class="page-link" href="' . $this->uri . 'page=' . ($this->curPage + 1) . '">&gt;</a></li>';
        }

        if($this->curPage > 3){
            $startpage = '<li><a class="page-link" href="' . $this->uri . 'page=1">&laquo;</a></li>';
        }

        if($this->curPage < ($this->countPages - 2)){
            $endpage = '<li><a class="page-link" href="' . $this->uri . 'page=' . ($this->countPages) . '">&raquo;</a></li>';
        }

        if($this->curPage + 1 <= $this->countPages){
            $page1right = '<li><a class="page-link" href="' . $this->uri . 'page=' . ($this->curPage + 1) . '">' . ($this->curPage + 1) . '</a></li>';
        }

        if($this->curPage + 2 <= $this->countPages){
            $page2right = '<li><a class="page-link" href="' . $this->uri . 'page=' . ($this->curPage + 2) . '">' . ($this->curPage + 2) . '</a></li>';
        }

        if($this->curPage - 1 > 0){
            $page1left = '<li><a class="page-link" href="' . $this->uri . 'page=' . ($this->curPage - 1) . '">' . ($this->curPage - 1) . '</a></li>';
        }

        if($this->curPage - 2 > 0){
            $page2left = '<li><a class="page-link" href="' . $this->uri . 'page=' . ($this->curPage - 2) . '">' . ($this->curPage - 2) . '</a></li>';
        }


        return '<ul class="pagination">'.
            $startpage.$back.$page2left.$page1left.'<li class="page-item active"><span class="page-link">'.$this->curPage.'</span></li>'.
            $page1right.$page2right.$forward.$endpage.'</ul>';
    }
}