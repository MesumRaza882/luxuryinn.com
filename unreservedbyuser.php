<?php
					$room_no = $_GET['did'];
					$stat = '0';
					$empty = '';
					$conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
					$qry = "UPDATE booking SET stat ='$stat' , guest_email = '$empty' WHERE room_no = '$room_no' ";
					if(mysqli_query($conn,$qry) or die("query failed")){
						$qry2 = "UPDATE room SET status_id ='$stat'  WHERE room_no = '$room_no' ";
						if(mysqli_query($conn,$qry2) or die("query2 failed")){
						}
					}
?>
<script type="text/javascript">
	alert("Successfully Un-Reserved....");
	window.location.href = "reserved.php";
</script>
