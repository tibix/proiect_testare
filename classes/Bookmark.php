<?php

/**
 * Bookmark class
 */
class Bookmark 
{
    /**
     * @var object $db The database connection object.
     */
    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database;
    }

    /**
     * Creates a new bookmark with the given parameters.
     *
     * @param int $user_id The ID of the user who created the bookmark.
     * @param string $title The title of the bookmark.
     * @param string $url The URL of the bookmark.
     * @param string $description The description of the bookmark.
     * @param string $date_created The date the bookmark was created.
     *
     * @return bool Returns true if the bookmark was created successfully, false otherwise.
     */
    public function createBookmark($title, $url, $description, $user_id, $date_created)
    {
        $user_id      = (int)$user_id;
        $title        = $this->db->escapeString($title);
        $url          = $this->db->escapeString($url);
        $description  = $this->db->escapeString($description);
        $date_created = $this->db->escapeString($date_created);

        $sql = "INSERT INTO 
                bookmarks (title, url, description, owner_id, date_created) 
                VALUES ('$title', '$url', '$description', $user_id, '$date_created')";

        return $this->db->query($sql);
    }

    /**
     * Retrieves a bookmark from the database by its ID.
     *
     * @param int $id The ID of the bookmark to retrieve.
     * @return array|null The bookmark data as an associative array, or null if no bookmark was found.
     */
    public function getBookmarkById($id)
    {
        $id = (int)$id;
        $sql = "SELECT * FROM bookmarks WHERE id = $id";

        $result = $this->db->query($sql);
        return $result->fetch_assoc();
    }

    /**
     * Retrieves all bookmarks from the database.
     *
     * @return array|null The bookmarks data as an associative array, or null if no bookmarks were found.
     */
    public function getAllBookmarks()
    {
        $sql = "SELECT * FROM bookmarks";

        $result = $this->db->query($sql);
        return $result->fetch_all();
    }

    /**
     * Retrieves all bookmarks from the database for a given user.
     *
     * @param int $user_id The ID of the user to retrieve bookmarks for.
     * @return array|null The bookmarks data as an associative array, or null if no bookmarks were found.
     */
    public function getBookmarksByUserId($user_id)
    {
        $user_id = (int)$user_id;
        $sql = "SELECT * FROM bookmarks WHERE owner_id = $user_id";

        $row = $this->db->query($sql);
        $results = array();
        while($result = $row->fetch_assoc()){
            $results[] = $result;
        }
        return $results;
    }

    /**
     * Retrieves all bookmarks from the database for a given category.
     *
     * @param int $category_id The ID of the category to retrieve bookmarks for.
     * @return array|null The bookmarks data as an associative array, or null if no bookmarks were found.
     */
    public function getBookmarksByCategoryId($category_id)
    {
        $category_id = (int)$category_id;
        $sql = "SELECT * FROM bookmarks WHERE category_id = $category_id";

        $result = $this->db->query($sql);
        return $result->fetch_all();
    }

    /**
     * Update a bookmark in the database.
     *
     * @param int $id The ID of the bookmark to update.
     * @param string $title The new title of the bookmark.
     * @param string $url The new URL of the bookmark.
     * @param string $description The new description of the bookmark.
     * @param int|null $category_id The new category ID of the bookmark, or null if it should not be updated.
     * @return bool True if the update was successful, false otherwise.
     */
    public function updateBookmark($id, $title, $url, $description, $category_id=null)
    {
        $id = (int)$id;
        $title = $this->db->escapeString($title);
        $url = $this->db->escapeString($url);
        $description = $this->db->escapeString($description);

        if (!is_null($category_id)) {
            $category_id = (int)$category_id;
            $sql = "UPDATE bookmarks SET title='$title', url='$url', description='$description', category_id=$category_id WHERE id = $id";
        } else {
            $sql = "UPDATE bookmarks SET title='$title', url='$url', description='$description' WHERE id = $id";
        }

        return $this->db->query($sql);
    }

    /**
     * Deletes a bookmark from the database.
     *
     * @param int $id The ID of the bookmark to delete.
     * @return bool True if the deletion was successful, false otherwise.
     */
    public function deleteBookmark($id)
    {
        $id = (int)$id;
        $sql = "DELETE FROM bookmarks WHERE id = $id";
        return $this->db->query($sql);
    }

}
