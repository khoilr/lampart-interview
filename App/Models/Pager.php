<?php

namespace App\Models;

use mysqli;

class Pager extends \Core\Model
{
    public $page = 1;
    public $perPage = 10;
    public $total = 0;
    public $totalPages = 0;
    public $prevPage = 0;
    public $nextPage = 0;

    public function __construct($page = 1, $perPage = 10, $total = 0)
    {
        $this->page = $page;
        $this->perPage = $perPage;
        $this->total = $total;
        $this->totalPages = ceil($this->total / $this->perPage);
        $this->prevPage = $page == 1 ? $this->prevPage = 1 : $this->page - 1;
        $this->nextPage = $page == $this->totalPages ? $this->page : $this->page + 1;
    }

    public function getPrevPage($url_parts)
    {
        isset($url_parts['query']) ? parse_str($url_parts['query'], $params) : $params = array();

        $params['page'] = $this->prevPage;

        $url_parts['query'] = http_build_query($params);

        return $url_parts['path'] . '?' . $url_parts['query'];
    }

    public function getNextPage($url_parts)
    {
        isset($url_parts['query']) ? parse_str($url_parts['query'], $params) : $params = array();

        $params['page'] = $this->nextPage;

        $url_parts['query'] = http_build_query($params);

        return $url_parts['path'] . '?' . $url_parts['query'];
    }

    public function getPageNumber($url_parts, $number)
    {
        isset($url_parts['query']) ? parse_str($url_parts['query'], $params) : $params = array();

        $params['page'] = $number;

        $url_parts['query'] = http_build_query($params);

        return $url_parts['path'] . '?' . $url_parts['query'];
    }

    public function getPagination($pager)
    {
        // get current url
        $url = $_SERVER['REQUEST_URI'];
        $url_parts = parse_url($url);

        // total page in rows = 5
        $maxPagesInRow =  $this->totalPages < 5 ? $this->totalPages : 5;

        // define start and end page
        if ($pager->page <= 3) {
            $start = 1;
            $end = $maxPagesInRow;
        } elseif ($pager->page >= $pager->totalPages - 2) {
            $start = $pager->totalPages - $maxPagesInRow + 1;
            $end = $pager->totalPages;
        } else {
            $start = $pager->page - 2;
            $end = $pager->page + 2;
        }

        // create html pager
        $html = "
                <nav aria-label='Page navigation example'>
                    <ul class='pagination justify-content-center'>
                        <li class='page-item'>
                            <a class='page-link' href=" . $this->getPrevPage($url_parts) . " aria-label='Previous'>
                                <span aria-hidden='true'>&laquo;</span>
                            </a>
                        </li>";

        for ($i = $start; $i <= $end; $i++) {
            $currentPage = $this->getPageNumber($url_parts, $i);
            $html .=  ($i == $pager->page) ? "<li class='page-item active'><a class='page-link' href='/?page=$i'>$i</a></li>" : "<li class='page-item'><a class='page-link' href='$currentPage'>$i</a></li>";
        }
        $html .= "
                        <li class='page-item'>
                            <a class='page-link' href=" . $this->getNextPage($url_parts) . " aria-label='Next'>
                                <span aria-hidden='true'>&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                ";

        return $html;
    }
}
