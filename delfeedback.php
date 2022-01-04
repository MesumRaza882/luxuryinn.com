
<script type="text/javascript">
	if(confirm("Do you want really to Delete?")){
		document.write('<?php
					$id = $_GET['didd'];
					$conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
					$qry = "DELETE FROM feedback WHERE id='$id'";
					$result = mysqli_query($conn,$qry) or die("query failed");
					?>');
		window.location.href = "feedbackdisplay.php";
}
else{
	window.location.href = "feedbackdisplay.php";
}
</script>















