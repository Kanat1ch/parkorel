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
    $sql = "SELECT * FROM posts ORDER BY id DESC";
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

function get_last_posts() {
    global $link;
    $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($link, $sql);
    $lposts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $lposts;

}

function get_three_posts() {
    global $link;
    $sql = "SELECT * FROM posts WHERE id not in (SELECT max(id) FROM posts) ORDER BY id DESC LIMIT 3";
    $result = mysqli_query($link, $sql);
    $tposts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $tposts;

}

function get_docs() {
    global $link;
    $sql = "SELECT * FROM docs ORDER BY id";
    $result = mysqli_query($link, $sql);
    $docs = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $docs;

}

function get_vacancies() {
    global $link;
    $sql = "SELECT * FROM vacancy ORDER BY id";
    $result = mysqli_query($link, $sql);
    $vacancies = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $vacancies;

}

function get_vacancy_by_id($vacancy_id){
    global $link;
    $sql = "SELECT * FROM vacancy WHERE id=". $vacancy_id;
    $result = mysqli_query($link, $sql);
    $vacancy = mysqli_fetch_assoc($result);
    return $vacancy;
}

function get_postimg($pid){
    global $link;
    $sql = "SELECT * FROM postimg WHERE pid='".$pid."' "  ;
    $result = mysqli_query($link, $sql);
    $pimg = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $pimg;
}

function get_clubimg($cid){
    global $link;
    $sql = "SELECT * FROM clubimg WHERE cid='".$cid."' "  ;
    $result = mysqli_query($link, $sql);
    $cimg = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $cimg;
}