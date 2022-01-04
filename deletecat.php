
<script type="text/javascript">
	if(confirm("Do you want really to Delete?")){
		document.write('<?php
					$type_id = $_GET['didd'];
					$conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
					$qry = "DELETE FROM room_type WHERE type_id='$type_id'";
					$result = mysqli_query($conn,$qry) or die("query failed");
					?>');
		window.location.href = "categories.php";
}
else{
	window.location.href = "categories.php";
}
</script>















