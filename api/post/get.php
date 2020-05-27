<?php
require_once '../utils/utils.php';
require_once '../converters/json_converter.php';
require_once '../connect.php';
require_once '../error_codes.php';
require_once '../filters/filter.php';

//models
require_once '../models/post/post.php';
require_once '../models/post/request.php';
require_once '../models/user.php';
require_once '../models/cuisine.php';
require_once '../models/category.php';
require_once '../models/ingredient.php';
require_once '../models/assignment.php';
require_once '../models/step.php';

//controllers
require_once '../controllers/post_controller.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET");

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $db = Connectivity::Connect();

    if($db != null) {

        $data = json_decode(file_get_contents("php://input"));

        try {
            $request = new Request($data->user_id, $data->user_locale,
                $data->last_post_id, $data->last_post_time,
                $data->search_context, $data->filters);

            $post_controller = new PostController($db, $request);

            $result = $post_controller->get();

            $post_array = array();
            $converter = new JsonConverter();

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $post = new Post();
                $post->setId($row['id']);
                $post->setTitle($row['title']);
                $post->setCooktime($row['cooktime']);
                $post->setImg(Utils::get_image_path($row['image']));
                $post->setDescription($row['description']);
                $post->setPubtime($row['pubtime']);
                $post->setShares($row['shares']);
                $post->setLikes($row['likes']);
                $post->setLikedByUser(fetch_liked_by_user($post->getId(), $post_controller));
                $post->setProteins($row['proteins']);
                $post->setLipids($row['lipids']);
                $post->setCarbohydrates($row['carbohydrates']);
                $post->setCalorific($row['calorific']);

                $post->setUser(fetch_user($row));
                $post->setCuisine(fetch_cuisine($row));
                $post->setCategory(fetch_category($row));

                $post->setIngredients(fetch_ingredients($post->getId(), $post_controller));
                $post->setAssignments(fetch_assignments($post->getId(), $post_controller));
                $post->setSteps(fetch_steps($post->getId(), $post_controller));

                array_push($post_array, $post);
            }

            $post_array = array("posts" => $post_array);
            $post_array += array("newPosts" => fetch_new_posts($post_controller));
            $post_array += ErrorCodes::no_error();
            echo $converter->serialize($post_array);

        } catch (Exception $ex) {
            echo json_encode(ErrorCodes::db_mysql_exception($ex->getMessage()));
        }

    } else {
        echo json_encode(ErrorCodes::db_connection_error());
    }
}

function fetch_liked_by_user($post_id, $post_controller) {
    $result = $post_controller->get_post_liked($post_id);
    if($result != null) {
        return $result->fetch(PDO::FETCH_ASSOC)['liked_by_user'] == 0 ? false : true;
    }
    return false;
}

function fetch_user($row) {
    $user = new User();
    $user->setId($row['user_id']);
    $user->setName($row['user_name']);
    $user->setPicture($row['user_picture']);
    $user->setLocale($row['user_locale']);
    $user->setEmail($row['user_email']);

    return $user;
}

function fetch_cuisine($row) {
    $cuisine = new Cuisine();
    $cuisine->setId($row['cuisine_id']);
    $cuisine->setName($row['cuisine_name']);
    return $cuisine;
}

function fetch_category($row) {
    $category = new Category();
    $category->setId($row['category_id']);
    $category->setName($row['category_name']);
    return $category;
}

function fetch_ingredients($post_id, $post_controller) {
    $result = $post_controller->get_ingredients($post_id);
    $ingredient_array = array();
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $ingredient = new Ingredient();
        $ingredient->setId($row['id']);
        $ingredient->setName($row['name']);
        $ingredient->setAmount($row['amount']);
        $ingredient->setUnit($row['unit']);

        array_push($ingredient_array, $ingredient);
    }
    return $ingredient_array;
}

function fetch_assignments($post_id, $post_controller) {
    $result = $post_controller->get_assignments($post_id);
    $assignment_array = array();
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $assignment = new Ingredient();
        $assignment->setId($row['id']);
        $assignment->setName($row['name']);

        array_push($assignment_array, $assignment);
    }
    return $assignment_array;
}

function fetch_steps($post_id, $post_controller) {
    $result = $post_controller->get_steps($post_id);
    $step_array = array();
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $step = new Step();
        $step->setNum($row['num']);
        $step->setImage($row['image']);
        $step->setDescription($row['description']);

        array_push($step_array, $step);
    }
    return $step_array;
}

function fetch_new_posts($post_controller) {
    $result = $post_controller->get_count_of_new_posts();
    return $result->fetch(PDO::FETCH_ASSOC)['las_posts_number'];
}
