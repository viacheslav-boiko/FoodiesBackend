<?php


class PostController
{
    private $db;
    private $request;

    public function __construct($db, $request){
        $this->db = $db;
        $this->request = $request;
    }

    public function get() {
        $query = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n",
            "SELECT `post`.`id`, `post`.`title`, `post`.`cooktime`, `post`.`image`, `post`.`description`, `post`.`pubtime`,
                         `post`.`shares`, `post`.`likes`, `post`.`proteins`, `post`.`lipids`, `post`.`carbohydrates`,
                         `post`.`calorific`, `post`.`user_id`, `user`.`name` as user_name, `user`.`picture` as user_picture, 
                         `user`.`locale` as user_locale, `user`.`email` as user_email, `post`.`cuisine_id`, 
                         `cuisine`.`name` as cuisine_name, `post`.`category_id`, `category`.`name` as category_name
                   FROM  foodies_db.`post`, foodies_db.`user`, foodies_db.`cuisine`, foodies_db.`category`,
                         foodies_db.`post_ingredient`, foodies_db.`ingredient`,
                         foodies_db.`post_assignment`, foodies_db.`assignment`
                   WHERE `post`.`user_id` = `user`.`id` 
                   AND `post`.`cuisine_id` = `cuisine`.`id`
                   AND `post`.`category_id` = `category`.`id`
                   
                   AND `post_ingredient`.`post_id` = `post`.`id` AND `post_ingredient`.`ingredient_id` = `ingredient`.`id`
                   AND `post_assignment`.`post_id` = `post`.`id` AND `post_assignment`.`assignment_id` = `assignment`.`id` 
                    
                   ".$this->request->get_filter_query_statement()."
                   ".$this->request->get_last_post_id_condition()."
                   ".$this->request->get_title_regexp_condition()."
                   GROUP BY `post`.`id`
                   ORDER BY 
                     `post`.`pubtime` DESC LIMIT ".POST_BANDWIDTH);
        //".$this->request->get_locale_ordering_condition()."
        $st = $this->db->prepare($query);
        $st->execute();
        return $st;
    }

    public function get_ingredients($post_id) {
        $query = "SELECT `ingredient`.`id`, `ingredient`.`name`, `post_ingredient`.`amount`, `post_ingredient`.`unit` 
                  FROM foodies_db.`ingredient`, foodies_db.`post_ingredient`, foodies_db.`post` 
                  WHERE `ingredient`.`id` = `post_ingredient`.`ingredient_id` 
                  AND `post_ingredient`.`post_id` = `post`.`id` AND `post`.`id` = ".$post_id;

        $st = $this->db->prepare($query);
        $st->execute();
        return $st;
    }

    public function get_assignments($post_id) {
        $query = "SELECT `assignment`.`id`, `assignment`.`name` FROM foodies_db.`assignment`, foodies_db.`post_assignment`, foodies_db.`post` 
                  WHERE `assignment`.`id` = `post_assignment`.`assignment_id` 
                  AND `post_assignment`.`post_id` = `post`.`id` AND `post`.`id` = ".$post_id;

        $st = $this->db->prepare($query);
        $st->execute();
        return $st;
    }

    public function get_steps($post_id) {
        $query = "SELECT `detail_image`.`num`, `detail_image`.`image`, `detail_image`.`description` 
                  FROM foodies_db.`detail_image`, foodies_db.`post` 
                  WHERE `detail_image`.`post_id` = `post`.`id` AND `post`.`id` = ".$post_id;

        $st = $this->db->prepare($query);
        $st->execute();
        return $st;
    }

    public function get_post_liked($post_id) {
        if($this->request->get_post_liked()) {
            $query = "SELECT COUNT(1) as liked_by_user FROM foodies_db.`liked` WHERE `user_id` = " . $this->request->getUserId() . " AND `post_id` = " . $post_id;

            $st = $this->db->prepare($query);
            $st->execute();
            return $st;
        } else {
            return null;
        }
    }

    public function get_count_of_new_posts() {
        $query = "SELECT COUNT(1) as las_posts_number FROM foodies_db.`post`, foodies_db.`user` WHERE `post`.`user_id` = `user`.`id`
                  ".$this->request->get_last_time_condition()." ".$this->request->get_locale_condition();

        $st = $this->db->prepare($query);
        $st->execute();
        return $st;
    }


    public function create_post($post) {

    }
}