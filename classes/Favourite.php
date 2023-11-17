<?php

class Favourite
{

    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database;
    }

    public function addToFavourites($user_id, $bookmark_id)
    {
        $user_id = (int)$user_id;
        $bookmark_id = (int)$bookmark_id;

        $sql = "INSERT INTO 
                favourites (user_id, bookmark_id) 
                VALUES ($user_id, $bookmark_id)";

        return $this->db->query($sql);
    }

    public function removeFromFavourites($user_id, $bookmark_id)
    {
        $user_id = (int)$user_id;
        $bookmark_id = (int)$bookmark_id;

        $sql = "DELETE FROM favourites WHERE user_id = $user_id AND bookmark_id = $bookmark_id";

        return $this->db->query($sql);
    }

    public function getAllFavourites($id)
    {
        $id = (int)$id;
        $sql = "SELECT * FROM favourites WHERE user_id = $id";

        $result = $this->db->query($sql);
        return $result->fetch_assoc();
    }

}