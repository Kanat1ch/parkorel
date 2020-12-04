<!DOCTYPE html>
<html lang="en">
<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
include("../app/database.php");
include("../app/functions.php");
session_start();
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
												$sql = "update posts set title ='$_POST[p_title]', content ='$_POST[p_content]', start ='$_POST[p_start]', img='$fnew' where id='$_GET[post_id]'";  // update the submited data ino the database :images
												mysqli_query($link, $sql); 
												move_uploaded_file($temp, $store);
			  
													$success = 	'<div class="alert alert-success alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Изменение</strong>Успешно!
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
<?php  echo $error;
	echo $success; ?>
<form action='' method='post'  enctype="multipart/form-data">
                                    <div class="form-body container">
            
                                        <?php $ssql ="select * from posts where posts.id='$_GET[post_id]'";
													$res=mysqli_query($link, $ssql); 
													$row=mysqli_fetch_array($res);
														?>

                                        <hr>
                                        <div class="row p-t-20">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Заголовк</label>
                                        <input type="text" name="p_title" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group has-danger">
                                        <label class="control-label">Начало</label>
                                        <input type="text" name="p_start" class="form-control">
                                    </div>
                                </div>
                            </div>
                                <div class="col-md-12">
                                    <div class="form-group has-danger">
                                        <label class="control-label">Описание</label>
                                        <textarea id="mytextarea" name="p_content" class="form-control form-control-danger"></textarea>
                                    </div>
                                </div>
                            
                            <div class="col-md-12">
                                <div class="form-group has-danger">
                                    <label class="control-label">Картинка</label>
                                    <input type="file" name="file" id="lastName" class="form-control form-control-danger">
                                </div>
                            </div>
                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions container">
                                        <input type="submit" name="submit" class="btn btn-success" value="Сохранить"> 
                                        <a href="dashboard.php" class="btn btn-inverse">Отменить</a>
                                    </div>
                                </form>
                                <script src="https://cdn.tiny.cloud/1/cvj5zmyfd449sew2ai4nu7zewycidaain44nb5fnqbcf81pv/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>tinymce.init({selector:'textarea'});</script>
                                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>