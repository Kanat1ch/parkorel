<?php 

function get_attrs() {
    global $link;
    $sql = "SELECT * FROM attr ORDER BY id";
    $result = mysqli_query($link, $sql);
    $attrs = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $attrs;

}

function get_attr_by_id($attr_id){
    global $link;
    $sql = "SELECT * FROM attr WHERE id=". $attr_id;
    $result = mysqli_query($link, $sql);
    $attr = mysqli_fetch_assoc($result);
    return $attr;
}

function get_clubs() {
    global $link;
    $sql = "SELECT * FROM clubs ORDER BY id";
    $result = mysqli_query($link, $sql);
    $clubs = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $clubs;

}

function get_club_by_id($club_id){
    global $link;
    $sql = "SELECT * FROM clubs WHERE id=". $club_id;
    $result = mysqli_query($link, $sql);
    $club = mysqli_fetch_assoc($result);
    return $club;
}

function get_partners() {
    global $link;
    $sql = "SELECT * FROM partners ORDER BY id";
    $result = mysqli_query($link, $sql);
    $partners = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $partners;

}

function get_services() {
    global $link;
    $sql = "SELECT * FROM services ORDER BY id";
    $result = mysqli_query($link, $sql);
    $services = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $services;

}

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