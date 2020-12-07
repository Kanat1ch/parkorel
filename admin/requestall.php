<!DOCTYPE html>
<html lang="en">
<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
include("../app/database.php");
include("../app/functions.php");
error_reporting(0);
session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="page-header">
                <h1>Все записи:</h1>
            </div>  
            <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
											 <th>Вакансия</th>
                                                <th>Фамилия</th>
                                                <th>Имя</th>
                                                <th>Отчество</th>
                                                <th>Телефон</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                            <th>Вакансия</th>
                                                <th>Фамилия</th>
                                                <th>Имя</th>
                                                <th>Отчество</th>
                                                <th>Телефон</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>

                                               	<?php
												$sql="SELECT * FROM requests order by id desc";
												$query=mysqli_query($link,$sql);
												
													if(!mysqli_num_rows($query) > 0 )
														{
															echo '<td colspan="11"><center>Нет заявок</center></td>';
														}
													else
														{				
																	while($rows=mysqli_fetch_array($query))
																		{
																				$mql="select * from requests order by id";
																				$newquery=mysqli_query($link,$mql);
																				$fetch=mysqli_fetch_array($newquery);
																					echo '<tr><td>'.$fetch['vacancy'].'</td>
																								<td>'.$rows['surname'].'</td>
                                                                                                <td>'.$rows['name'].'</td>
                                                                                                <td>'.$rows['patronymic'].'</td>
                                                                                                <td>'.$rows['phone'].'</td>
																									 <td><a href="request_del.php?del_request='.$rows['id'].'" class="btn btn-danger">Удалить</a> 
																									</td></tr>';			
																		}	
														}
											?>               
                                        </tbody>
                                    </table>
                                </div>
</body>
</html>