
<script type="text/javascript">
	if(confirm("Do you want really to Delete?")){
		document.write("<?php
					$room_no = $_GET['did'];
					$conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
					$qry = "DELETE FROM room WHERE room_no='$room_no'";
					$result = mysqli_query($conn,$qry) or die("query failed");
					?>");
		window.location.href = "rooms.php";
}else{
	alert("Record Not Deleted");
}
</script>















