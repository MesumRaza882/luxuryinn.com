<?php
					
					$room_no = $_POST['rm'];
					$stat = '1';
					$f_stat = '1';

                    
					$conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
					$qry = "UPDATE booking SET final_stat = '$f_stat' WHERE room_no='$room_no' ";
					if(mysqli_query($conn,$qry) or die("q1 failed")){
							$qry2 = "UPDATE room SET f_status_id = '$f_stat' WHERE room_no='$room_no' ";
							if(mysqli_query($conn,$qry2) or die("q2 failed")){
				$to = $_POST['mail'];
                $name = $_POST['gname'];
                $msg = $_POST['msg'];
                $curndate=date("Y/m/d");

                $conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
                $qry = "select * from message where email = '$to'";
          $result = mysqli_query($conn,$qry) or die("query failed");
          if(mysqli_num_rows($result)>0){
            echo "<div class='alert alert-danger'>Already Message Sent!</div>";
          }else{
            $qry2 = "INSERT INTO message VALUES('','$name','$to','$msg','$curndate','')";
            $result2 = mysqli_query($conn,$qry2) or die("query failed2");
            header("Location:admin_dashboard.php");
          }
							}
						}

					else{
						echo "string";
					}
					?>






<script type="text/javascript">
	alert("Successfully Delete....");
	window.location.href = "admin_dashboard.php";
</script>
