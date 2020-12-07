<!DOCTYPE html>
<html lang="en">
<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
include("../app/database.php");
session_start();
if(isset($_POST['submit']))   
{
		

				$fname = $_FILES['file']['name'];
								$temp = $_FILES['file']['tmp_name'];
								$fsize = $_FILES['file']['size'];
								$extension = explode('.',$fname);
								$extension = strtolower(end($extension));  
								$fnew = uniqid().'.'.$extension;
								$store = "img/vacancy/".basename($fnew);                  
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
												
												
												
				                                 
												$sql = "INSERT INTO vacancy(title, price, claim, abligation, img) VALUE('".$_POST['v_title']."','".$_POST['v_price']."','".$_POST['v_claim']."','".$_POST['v_obligation']."','".$fnew."')";
												mysqli_query($link, $sql); 
												move_uploaded_file($temp, $store);
			  
													$success = 	'<div class="alert alert-success alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Отлично!</strong> Новый пост добавлен успешно.
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
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
        <title>Админка</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link href="css/helper.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body class="fix-header">
        <?php  echo $error;
                                            echo $success; ?>
        <a href="dashboard.php" class="btn btn-inverse">Back</a>
        <div class="col-lg-12">
            <div class="card card-outline-primary">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Добавить вакансию</h4>
                </div>
                <div class="card-body">
                    <form action='' method='post' enctype="multipart/form-data">
                        <div class="form-body">
                            <hr>
                            <div class="row p-t-20">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Название</label>
                                        <input type="text" name="v_title" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group has-danger">
                                        <label class="control-label">Зарплата</label>
                                        <input type="text" name="v_price" class="form-control">
                                    </div>
                                </div>
                            </div>
                                <div class="col-md-12">
                                    <div class="form-group has-danger">
                                        <label class="control-label">Требования</label>
                                        <textarea id="mytextarea" name="v_claim" class="form-control form-control-danger"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group has-danger">
                                        <label class="control-label">Обязанности</label>
                                        <textarea id="mytextarea" name="v_obligation" class="form-control form-control-danger"></textarea>
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
            </div>
            <div class="form-actions">
                <input type="submit" name="submit" class="btn btn-success" value="Сохранить">
                <a href="dashboard.php" class="btn btn-inverse">Отменить</a>
            </div>
            </form>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        <script src="https://cdn.tiny.cloud/1/cvj5zmyfd449sew2ai4nu7zewycidaain44nb5fnqbcf81pv/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>tinymce.init({selector:'textarea'});</script>
    </body>

</html>