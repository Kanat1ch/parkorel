<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
$post_id = $_GET['post_id'];
if (!is_numeric($post_id)) exit();
require_once 'app/header.php';
require_once 'app/include/functions.php';
$post = get_post_by_id($post_id);
?>
<div class="container" style="background-image: url(admin/img/posts/<?=$post['img']?>);">
    <div class="row">
        <div class="col-md-9">
        <div class="page-header">
            <?php
                $p_id = isset($_GET['id']);
                $posts = get_image_by_id($p_id);
                $category_img = get_category_img($p_id);
            ?>
                <h1><?=$post['title']?></h1>
            </div>  
            <p class="card-text"><small class="text-muted">17 октября 2002</small> <small class="text-muted">Категория</small></p>
            <div class="post-conten">
            <?=$post['content']?>
            </div>
            <div>
                <?=$category_img?>
            </div>
        </div>
        <div class="col-md-3">
            Sidebar
        </div>
    </div>
</div>
<?php
require_once 'app/footer.php';
?>