<?php
					
					$title=$_POST["title"];
					$id = $_POST["id"];

					$filename = $_FILES["uploadfile"]["name"];
					$tempname = $_FILES["uploadfile"]["tmp_name"];
					$folder = "room/".$filename;
					move_uploaded_file($tempname,$folder);

					$description=$_POST["description"];
					
					$conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
					$qry = "UPDATE services SET id='$id',title='$title',description='$description',image='$folder' WHERE id ='$id'";
					$result = mysqli_query($conn,$qry) or die("query failed");
					header("Location:services.php");
					?>