<?php


class UserController
{
    private $db;

    public function __construct($db){
        $this->db = $db;
    }

    public function get()
    {
        $query = "SELECT * FROM foodies_db.user";
        $st = $this->db->prepare($query);
        $st->execute();
        return $st;
    }

    public function create($user)
    {
        $name = htmlspecialchars(strip_tags($user->getName()));
        $picture = htmlspecialchars(strip_tags($user->getPicture()));
        $locale = htmlspecialchars(strip_tags($user->getLocale()));
        $email = htmlspecialchars(strip_tags($user->getEmail()));

        $query = "INSERT INTO foodies_db.user 
                       SET name = \"$name\",
                           picture = \"$picture\",
                           locale = '$locale',
                           email = '$email',
                           last_signed_time = \"".date('Y-m-d H:i:s')."\"";

        $st = $this->db->prepare($query);

        $st->execute();

        return $this->db->lastInsertId();
    }

    public function get_user_id_by_email($user) {
        $query = "SELECT id FROM foodies_db.user WHERE name = \"".$user->getName()."\"
                    AND email = \"".$user->getEmail()."\" AND locale = \"".$user->getLocale()."\"";
        $st = $this->db->prepare($query);
        $st->execute();
        return $st;
    }

    public function update_user_sign_in_time($user_id) {
        $query = "UPDATE foodies_db.user SET last_signed_time = \"".date('Y-m-d H:i:s')."\" WHERE id = ".$user_id;
        $st = $this->db->prepare($query);
        $st->execute();
    }

    public function delete($user)
    {
        $id = htmlspecialchars(strip_tags($user->getId()));
        $query = "DELETE FROM foodies_db.user WHERE id = ".$id;
        $st = $this->db->prepare($query);
        $st->execute();
    }
}