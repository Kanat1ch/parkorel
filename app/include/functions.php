<?php
function get_categories() {
    global $link;
    $sql = "SELECT * FROM categories";
    $result = mysqli_query($link, $sql);
    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $categories;
};

function get_posts() {
    global $link;
    $sql = "SELECT * FROM posts ORDER BY id";
    $result = mysqli_query($link, $sql);
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $posts;

}

function get_post_by_id($post_id){
    global $link;
    $sql = "SELECT * FROM posts WHERE id=". $post_id;
    $result = mysqli_query($link, $sql);
    $post = mysqli_fetch_assoc($result);
    return $post;
}

function generate_code($length = '8'){
    $string = '';
    $chars = 'asdfghjklzxcvASDFGHJKLZXCV23456789';
    $num_chars = strlen($chars);
    for ($i=0; $i < $length; $i++) { 
        $string .= substr($chars, rand(1, $num_chars)-1, 1);
    }
    return $string;
}

function insert_subscribe($link, $email){
    $email = mysqli_real_escape_string($link, $email);
    $query = "SELECT * FROM subscribers WHERE email = '$email'";
    $result = mysqli_query($link, $query);
    if (!mysqli_num_rows($result)) {
        $subscriber_code = generate_code();
        $insert_query = "INSERT INTO subscribers (email, code) VALUES ('$email', '$subscriber_code')";
        $result = mysqli_query($link, $insert_query);
        if ($result) {
            return 'created';
        }else {
            return 'failed';
        }
    }else {
        return 'exist';
    }
}

function get_image_by_id($p_id){
    global $link;
    $p_id = mysqli_real_escape_string($link, $p_id);
    $sql = 'SELECT * FROM images WHERE p_id = "'.$p_id.'"';
    $result = mysqli_query($link, $sql);
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $posts;
}

function get_category_img($p_id){
    global $link;
    $p_id = mysqli_real_escape_string($link, $p_id);
    $sql = 'SELECT file_name FROM images WHERE p_id = "'.$p_id.'"';
    $result = mysqli_query($link, $sql);
    $category = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $category;
}
