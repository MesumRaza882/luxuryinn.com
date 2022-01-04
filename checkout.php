<?php
					$room_no = $_GET['id'];
					$stat = '0';

					$curdate = date("Y/m/d");
					$conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
					$qry = "UPDATE booking SET stat ='$stat' ,  final_stat = '0' , guest_email = '' , today = '$curdate' WHERE room_no = '$room_no' ";
					if(mysqli_query($conn,$qry) or die("query failed")){
						$qry2 = "UPDATE room SET status_id ='$stat' , f_status_id = '$stat' WHERE room_no = '$room_no' ";
						if(mysqli_query($conn,$qry2) or die("query2 failed")){
							$qry2 = "INSERT INTO room VALUES('','$room_no','$type','$status','$f_stat','$folder','$rent','$facilities','$description')";
						$result = mysqli_query($conn,$qry2) or die("query failed2");
						header("Location:admin_dashboard.php");
						}
					}
?>
<script type="text/javascript">
	alert("Successfully Check-out....");
	window.location.href = "admin_dashboard.php";
</script>
