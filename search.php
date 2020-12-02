<!DOCTYPE html>
<html>
<head>

	<title>Поиск: <?php echo $_GET['search']; ?></title>

</head>
<body>
<?php
require_once 'app/include/database.php';
$search_get = $_GET['search'];
$sql = "SELECT * FROM posts WHERE title LIKE '%$search_get%' ";
$select = mysqli_query($link, $sql);
while ($select_while = mysqli_fetch_assoc($select)) {
	?>
	<br>
	<b><a href="post.php?post_id=<?php echo $select_while['id']; ?>"><?php echo $select_while['title']; ?></a></b>
	<?php
}
?>
</body>
</html>