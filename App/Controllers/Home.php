<?php

namespace App\Controllers;

use App\Models\Category;
use \Core\View;
use \App\Models\Product;
use \App\Models\Pager;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class Home extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        // page = 1 if not set
        $page = isset($_GET['page']) ? $_GET['page'] : 1;

        // load page 1 when negative page is given
        if ($page < 1) {
            header('Location: /?page=1');
            return;
        }

        // get products in current page
        $products = Product::getPagination($page);

        // back to last page that have products if current doesn't
        if (empty($products) and $page > 1) {
            header('Location: /?page=' . ($page - 1));
            return;
        }

        // get pagination section
        $pager = new Pager($page, 10, count(Product::getAll()));
        $pagination = $pager->getPagination($pager);

        // get all categories and its products
        $categories = Category::getAll();

        // convert category id to name
        $products = array_map(function ($product) use ($categories) {
            $categoryIndex = array_search($product->category, array_column($categories, 'id'));
            $product->category = $categories[$categoryIndex]->name;
            return $product;
        }, $products);

        // args for template
        $args = [
            'products' => $products,
            'categories' => $categories,
            'pagination' => $pagination,
        ];

        // render
        View::renderTemplate('Home/index.html', $args);
    }

    public function searchAction()
    {
        // return home when no query is given
        if (!isset($_GET['q'])) {
            header('Location: /');
            return;
        }

        // query string
        $q = $_GET['q'];

        // page = 1 if not set
        $page = isset($_GET['page']) ? $_GET['page'] : 1;

        // load page 1 when negative page is given
        if ($page < 1) {
            header("Location: /search?page=1&q=$q");
            return;
        }

        // get products in current page
        $products = Product::getBySearchPagination($q, $page);

        // back to last page that have products if current doesn't
        if (empty($products) and $page > 1) {
            header("Location: /search?q=$q&page=" . ($page - 1));
            return;
        }

        // get pagination section
        $pager = new Pager($page, 10, count(Product::getAllBySearch($q)));
        $pagination = $pager->getPagination($pager);

        // get all categories and its products
        $categories = Category::getAll();

        // convert category id to name
        $products = array_map(function ($product) use ($categories) {
            $categoryIndex = array_search($product->category, array_column($categories, 'id'));
            $product->category = $categories[$categoryIndex]->name;
            return $product;
        }, $products);

        // args for template
        $args = [
            'products' => $products,
            'categories' => $categories,
            'pagination' => $pagination,
        ];

        // render
        View::renderTemplate('Home/index.html', $args);
    }
}
