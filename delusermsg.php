
<script type="text/javascript">
	if(confirm("Do you want really to Delete?")){
		document.write('<?php
					$id = $_GET['didd'];
					$conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
					$qry = "DELETE FROM message WHERE id='$id'";
					$result = mysqli_query($conn,$qry) or die("query failed");
					?>');
		window.location.href = "index.php";
}
else{
	window.location.href = "alertmsg.php";
}
</script>















