<?php

/**
 * Category class
 */
class Category{

    /**
     * @var object $db The database connection object.
     */
    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database;
    }

    /**
     * Creates a new category with the given parameters.
     *
     * @param string $name The name of the category.
     * @param string $description The description of the category.
     * @param string $date_created The date the category was created.
     *
     * @return bool Returns true if the category was created successfully, false otherwise.
     */
    public function createCategory($name, $description, $date_created, $owner)
    {
        $name         = $this->db->escapeString($name);
        $description  = $this->db->escapeString($description);
        $date_created = $this->db->escapeString($date_created);
        $owner        = $this->db->escapeString($owner);

        $sql = "INSERT INTO 
                categories (name, description, date_created, owner_id)
                VALUES ('$name', '$description', '$date_created', '$owner')";

        return $this->db->query($sql);
    }

    /**
     * Retrieves a category from the database by its ID.
     *
     * @param int $id The ID of the category to retrieve.
     * @return array|null The category data as an associative array, or null if no category was found.
     */
    public function getCategoryById($id)
    {
        $id  = (int)$id;
        $sql = "SELECT * FROM categories WHERE id = $id";

        $result = $this->db->query($sql);
        return $result->fetch_assoc();
    }

    /**
     * Retrieves a category from the database by its ID.
     *
     * @param int $id The ID of the category to retrieve.
     * @return string The category name.
     */
    public function getCategoryNameById($id)
    {
        $id  = (int)$id;
        $sql = "SELECT name FROM categories WHERE id = $id";

        $row = $this->db->query($sql);
        $result = $row->fetch_assoc();

        return $result['name'];
    }
    
    /**
     * Retrieves all categories from the database.
     *
     * @return array|null The categories data as an associative array, or null if no categories were found.
     */
    public function getAllCategories()
    {
        $sql = "SELECT * FROM categories";

        $row = $this->db->query($sql);
        $results = array();
        while($result = $row->fetch_assoc()){
            $results[] = $result;
        }
        return $results;
    }

    /**
     * Updates a category in the database.
     *
     * @param int $id The ID of the category to update.
     * @param string $name The new name.
     * @param string $description The new description.
     * @param string $date_created The new date created.
     *
     * @return bool Returns true if the category was updated successfully, false otherwise.
     */

    public function updateCategory($id, $name, $category_image, $description, $date_created)
    {
        $id = (int)$id;
        $name = $this->db->escapeString($name);
        $category_image = $this->db->escapeString($category_image);
        $description = $this->db->escapeString($description);
        $date_created = $this->db->escapeString($date_created);

        $sql = "UPDATE categories SET name = '$name', categ_image = '$category_image', description = '$description', date_created = '$date_created' WHERE id = $id";

        return $this->db->query($sql);
    }

    /**
     * Deletes a category from the database.
     *
     * @param int $id The ID of the category to delete.
     * @return bool Returns true if the category was deleted successfully, false otherwise.
     */
    public function deleteCategory($id)
    {
        $id = (int)$id;
        $sql = "DELETE FROM categories WHERE id = $id";

        return $this->db->query($sql);
    }

}