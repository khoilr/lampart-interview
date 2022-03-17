<?php

namespace App\Models;

use mysqli;

class Product extends \Core\Model
{
    public $id = null;
    public $name = null;
    public $category = null;
    public $image = null;
    public $price = null;

    public function __construct($name, $category, $price, $image = null,  $id = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->category = $category;
        $this->image = $image;
        $this->price = $price;
    }

    /**
     * Get all the products as an associative array
     *
     * @return array of Product objects
     */
    public static function getAll()
    {
        $db = static::getDB();
        $statement = $db->prepare('SELECT * FROM products');
        if ($statement->execute()) {
            $result = $statement->get_result();
            $products = [];
            while ($row = $result->fetch_assoc()) {
                $products[] = new Product($row['name'], $row['category'], $row['price'], $row['image'], $row['id']);
            }
            return $products;
        } else die("Error: " . $statement->error);
    }

    public static function getPagination($page = 1, $perPage = 10)
    {
        $db = static::getDB();

        $offset = ($page - 1) * $perPage;

        $statement = $db->prepare('SELECT * FROM products LIMIT ?, ?');
        $statement->bind_param('ii', $offset, $perPage);

        if ($statement->execute()) {
            $result = $statement->get_result();
            $products = [];
            while ($row = $result->fetch_assoc()) {
                $products[] = new Product($row['name'], $row['category'],  $row['price'], $row['image'], $row['id']);
            }
            return $products;
        } else die("Error: " . $statement->error);
    }

    public static function getAllBySearch($q)
    {
        $db = static::getDB();
        $like = "%$q%";
        $statement = $db->prepare('SELECT * FROM products WHERE name LIKE ? or category LIKE ?');
        $statement->bind_param('ss', $like, $like);
        if ($statement->execute()) {
            $result = $statement->get_result();
            $products = [];
            while ($row = $result->fetch_assoc()) {
                $products[] = new Product($row['name'], $row['category'], $row['price'], $row['image'], $row['id']);
            }
            return $products;
        } else die("Error: " . $statement->error);
    }

    public static function getBySearchPagination($q, $page = 1, $perPage = 10)
    {
        $db = static::getDB();

        $offset = ($page - 1) * $perPage;

        $like ="%$q%";

        $statement = $db->prepare('SELECT * FROM products WHERE name LIKE ? or category LIKE ? LIMIT ?, ?');
        $statement->bind_param('ssii', $like, $like, $offset, $perPage);

        if ($statement->execute()) {
            $result = $statement->get_result();
            $products = [];
            while ($row = $result->fetch_assoc()) {
                $products[] = new Product($row['name'], $row['category'],  $row['price'], $row['image'], $row['id']);
            }
            return $products;
        } else die("Error: " . $statement->error);
    }
    /**
     * Get a product by id
     *
     * @param $id
     * @return Product object
     */
    public static function getById($id)
    {
        $db = static::getDB();
        $statement = $db->prepare('SELECT * FROM products WHERE id = ?');
        $statement->bind_param('i', $id);
        if ($statement->execute()) {
            $results = $statement->get_result()->fetch_all(MYSQLI_ASSOC);
            return (count($results) > 0) ? new Product($results[0]['name'], $results[0]['category'],  $results[0]['price'], $results[0]['image'], $results[0]['id']) : null;
        } else die("Error: " . $statement->error);
    }

    public static function add($product)
    {
        $db = static::getDB();
        $statement = $db->prepare('INSERT INTO products (name, category, image, price) VALUES (?, ?, ?, ?)');
        $statement->bind_param('ssss', $product->name, $product->category, $product->image, $product->price);
        if ($statement->execute()) {
            return $statement->insert_id;
        } else die("Error: " . $statement->error);
    }

    public static function delete($id)
    {
        $db = static::getDB();
        $statement = $db->prepare('DELETE FROM products WHERE id = ?');
        $statement->bind_param('i', $id);
        if ($statement->execute()) {
            return true;
        } else die("Error: " . $statement->error);
    }

    public static function update($product)
    {
        $db = static::getDB();
        $statement = $db->prepare('UPDATE products SET name = ?, category = ?, price = ? WHERE id = ?');
        $statement->bind_param('sssi', $product->name, $product->category, $product->price, $product->id);
        if ($statement->execute()) {
            return true;
        } else die("Error: " . $statement->error);
    }
}
