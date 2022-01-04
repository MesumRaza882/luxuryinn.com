<?php
					$type_id=$_POST["type_id"];
					$type=$_POST["type"];
					$conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
					$qry = "UPDATE room_type SET type_id='$type_id',type='$type' WHERE type_id='$type_id'";
					$result = mysqli_query($conn,$qry) or die("query failed");
					if($qry){
						?>
						<script type="text/javascript">
						alert("Update Successfully....");
						window.location.href = "Categories.php";
					</script>
					<?php	
					}
					else{
						?>
						<script type="text/javascript">
						alert("Try Again....");
						window.location.href = "Categories.php";
					</script>
					<?php
					}
					?>
					