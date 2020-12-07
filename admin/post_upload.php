<!DOCTYPE html>
<html lang="en">
<?php 
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    include("../app/database.php");
    include("../app/functions.php");
    session_start();
    $pid = $_GET['post_id'];
    if(isset($_POST['submit']))   
{
	
				$fname = $_FILES['file']['name'];
								$temp = $_FILES['file']['tmp_name'];
								$fsize = $_FILES['file']['size'];
								$extension = explode('.',$fname);
								$extension = strtolower(end($extension));  
								$fnew = uniqid().'.'.$extension;
								$store = "img/posts/".basename($fnew);                  
					if($extension == 'jpg'||$extension == 'png'||$extension == 'gif' )
					{        
									if($fsize>=1000000)
										{
		
		
												$error = 	'<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Максимальный размер картинки 1024kb!</strong>
															</div>';
	   
										}
		
									else
										{
												
												
												
				                                 
												$sql = "INSERT INTO postimg(pid, img) VALUE('".$pid."','".$fnew."')";
												mysqli_query($link, $sql); 
												move_uploaded_file($temp, $store);
			  
													$success = 	'<div class="alert alert-success alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Отлично!</strong> Картинки добавлены.
															</div>';
                
	
										}
					}
					elseif($extension == '')
					{
						$error = 	'<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Выберите картинку</strong>
															</div>';
					}
					else{
					
											$error = 	'<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Неправильное расширение картиники!</strong>png, jpg, Gif допустимы.
															</div>';
                        }
                                       
}
    ?>
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<form action='' method='post' enctype="multipart/form-data">
    <div class="col-md-12">
                                <div class="form-group has-danger">
                                    <label class="control-label">Картинка</label>
                                    <input type="file" name="file" id="lastName" class="form-control form-control-danger">
                                </div>
                            </div>
                            <div class="form-actions">
                <input type="submit" name="submit" class="btn btn-success" value="Сохранить">
                <a href="dashboard.php" class="btn btn-inverse">Отменить</a>
            </div>
            <div>
            <?php 
            $pimg = get_postimg($pid);
            ?>
            <?php foreach ($pimg as $pimgs):?>
                <img src="img/posts/<?=$pimgs['img']?>" alt=""><a class="btn btn-red" href="postimg_del.php?del_postimg=<?=$pimgs['id'];?>">Удалить</a></p>
                <?php endforeach; ?>
                </div>
</form>
</body>
</html>