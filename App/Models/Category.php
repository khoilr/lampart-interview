<?php

namespace App\Models;

use mysqli;

class Category extends \Core\Model
{
    public $id = null;
    public $name = null;

    public function __construct($name, $id = null)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * Get all the categories as an associative array
     *
     * @return array of Category objects
     */
    public static function getAll()
    {
        $db = static::getDB();
        $statement = $db->prepare('SELECT * FROM categories');
        if ($statement->execute()) {
            $result = $statement->get_result();
            $categories = [];
            while ($row = $result->fetch_assoc()) {
                $categories[] = new Category($row['name'], $row['id']);
            }
            return $categories;
        } else die("Error: " . $statement->error);
    }

    /**
     * Get a product by id
     *
     * @param $id
     * @return Category object
     */
    public static function getById($id)
    {
        $db = static::getDB();
        $statement = $db->prepare('SELECT * FROM categories WHERE id = ?');
        $statement->bind_param('i', $id);
        if ($statement->execute()) {
            $results = $statement->get_result()->fetch_all(MYSQLI_ASSOC);
            return (count($results) > 0) ? new Category($results[0]['name'], $results[0]['id']) : null;
        } else die("Error: " . $statement->error);
    }

    public static function add($category)
    {
        $db = static::getDB();
        $statement = $db->prepare('INSERT INTO categories (name) VALUES (?)');
        $statement->bind_param('s', $category->name);
        if ($statement->execute()) {
            return $statement->insert_id;
        } else die("Error: " . $statement->error);
    }
}
