<?php
					$room_no=$_POST["room_num"];
					$type=$_POST["type"];
					$status=$_POST["status"];
					$filename = $_FILES["uploadfile"]["name"];
					$tempname = $_FILES["uploadfile"]["tmp_name"];
					$folder = "room/".$filename;
					move_uploaded_file($tempname,$folder);
					$rent=$_POST["rent"];
					$facilities=$_POST["facilities"];
					$description=$_POST["description"];
					
					$conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
					$qry = "UPDATE room SET room_no='$room_no',type_id='$type',image='$folder',rent_id='$rent',facilities='$facilities',description='$description' WHERE room_no='$room_no'";
					$result = mysqli_query($conn,$qry) or die("query failed");
					header("Location:rooms.php");
					?>