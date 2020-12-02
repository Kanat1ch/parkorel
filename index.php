<?php
// ini_set('error_reporting', E_ALL);
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
require_once 'app/header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="page-header">
                <h1>Все записи:</h1>
            </div>  
            <?php $posts = get_posts();?>
            <?php foreach ($posts as $post):?>
            <div class="card mb-3" style="max-width: 1040px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="admin/img/posts/<?=$post['img']?>" class="card-img" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><a href="post.php?post_id=<?=$post['id'];?>"><?=$post['title']?></a></h5>
        <p class="card-text"><?=mb_substr($post['content'], 0, 128, 'UTF-8').'...'?></p>
        <p class=><a class="btn btn-dark" href="post.php?post_id=<?=$post['id'];?>">Читать больше</a></p>
        <p class="card-text"><small class="text-muted"><?=$post['datatime'];?></small> <small class="text-muted">Категория</small></p>
      </div>
    </div>
  </div>
</div>
            <?php endforeach; ?>
        </div>
        <div class="col-md-3">
            <?php require_once('app/sidebar.php'); ?>
            <form method="post">
<input type="search" name="search" placeholder="Поиск...">
<input type="submit" name="submit">
<h2>Поисковой запрос: <?php echo $_POST['search']; ?></h2>
<?php
if (isset($_POST['submit'])){
$search_get = $_POST['search'];
$sql = "SELECT * FROM posts WHERE title LIKE '%$search_get%' ";
$select = mysqli_query($link, $sql);
while ($select_while = mysqli_fetch_assoc($select)) {
	?>
	<br>
	<b><a href="post.php?post_id=<?php echo $select_while['id']; ?>"><?php echo $select_while['title']; ?></a></b>
	<?php
}
}
?>
</form>
        </div>
    </div>
    <form method="post" action='mail.php'>
    <input type="hidden" name="project_name" value="Sakura Store">
		<input type="hidden" name="admin_email" value="romic_80@mail.ru">
		<input type="hidden" name="form_subject" value="Форма заказа футболки">
        <div class="form-group">
          <label for="exampleFormControlInput1">Почтовый адрес</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <div class="form-group">
              <label for="exampleFormInputName1">Как Вас называть</label>
              <input type="text" class="form-control" id="exmapleFormInputName" placeholder="Имя Фамилия">
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Коротко опишите суть вопроса</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-dark btn-lg" onclick="alert('Ваш сообение успешно отправлено.'); return false;">Отправить</button>
      </form>
</div>

<?php
require_once 'app/footer.php';
?>
