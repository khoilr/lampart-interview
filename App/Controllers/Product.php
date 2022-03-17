<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Product as ProductModel;
use \Core\View;
use \App\Models\Pager;

/**
 * Product controller
 *
 * PHP version 7.0
 */
class Product extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    private function handleImage($image)
    {
        // rename image with timestamp: {timestamp}_{image_name}.{extension}
        $imageName = $image['name'];
        $imageName = time() . '_' . $imageName;

        // only image files allowed (jpg, png, gif, jpeg)
        $imageExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
        $imagePath = '../public/assets/images/products/' . $imageName;
        if (in_array($imageExtension, ['jpg', 'jpeg', 'png', 'gif'])) {
            move_uploaded_file($image['tmp_name'], $imagePath);
            return $imageName;
        } else
            return false;
    }

    public function addAction()
    {
        $name = $_POST['name'];
        $price = $_POST['price'];

        // prevent insert when price over 9999
        if ($price > 9999) {
            $this->errorAction("Price must be less than 9999");
            die();
        }

        // get category id if exist, otherwise insert new category and get id
        $category = $_POST['category'];
        $categories = Category::getAll();
        $categoryIndex = array_search($category, array_column($categories, 'name'));
        $categoryId =  ($categoryIndex === false) ? Category::add(new Category($category)) : $categories[$categoryIndex]->id;

        // upload image to public/assets/images/products
        $image = $_FILES['image'];
        $imageName = $this->handleImage($image);

        // create product object
        $product = new ProductModel($name, $categoryId,  $price, $imageName);

        //back home when add success, otherwise go to error page
        ProductModel::add($product) ? header('Location: /') : $this->errorAction("Got some error, we working on it. Please try again later.");
    }

    public function errorAction($error)
    {
        $args = [
            'error' => $error
        ];
        View::renderTemplate('Product/error.html', $args);
    }

    public function deleteAction()
    {
        $id = $_POST['id'];
        echo ProductModel::delete($id);
    }

    public function updateAction()
    {
        // prevent insert when price over 9999
        $price = $_POST['price'];
        if ($price > 9999) {
            $this->errorAction("Price must be less than 9999");
            die();
        }

        $name = $_POST['name'];
        $id = $_POST['id'];

        // get category id if exist, otherwise insert new category and get id
        $category = $_POST['category'];
        $categories = Category::getAll();
        $categoryIndex = array_search($category, array_column($categories, 'name'));
        $categoryId =  ($categoryIndex === false) ? Category::add(new Category($category)) : $categories[$categoryIndex]->id;

        // create product object
        $product = new ProductModel($name, $categoryId, $price, id: $id);
        
        //back home when add success, otherwise go to error page
        ProductModel::update($product) ? header('Location: /') : $this->errorAction("Got some error, we working on it. Please try again later.");
    }
}
