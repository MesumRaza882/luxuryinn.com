
<?php
					$room_no = $_GET['did'];
					$conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
					$qry = "DELETE FROM room WHERE room_no='$room_no'";
					$result = mysqli_query($conn,$qry) or die("query failed");
					header("location:rooms.php");
?>













