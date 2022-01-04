<?php
					$conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
					$room_no = $_POST['rm'];
					$type = $_POST['rtp'];
					$to = $_POST['mail'];
					$name = $_POST['gname'];
					$cn = $_POST['cn'];
                    $city = $_POST['city'];
                    $child = $_POST['child'];
					$adult = $_POST['adult'];
					$cin = $_POST['cin'];
					$cout = $_POST['cout'];
					$stat = '1';
					$f_stat = '1';
					$curdate = date("Y/m/d");
					
					$child_bill = $child*500;
					$adult_bill = $adult*800;

	$bill = '';
				
	$child_bill = $child*500;
	$adult_bill = $adult*800;
	if($type == "Single_Non_Ac"){
		$bill = (1000)+$adult_bill+$child_bill;;
	}
	if($type == "Single_Ac"){
		$bill = (2000)+$adult_bill+$child_bill;
	}
	if($type == "Double_Ac"){
		$bill = (4000)+$adult_bill+$child_bill;
	}
	if($type == "Double_Non_Ac"){
		$bill = (3000)+$adult_bill+$child_bill;
	}
	


					$qry = "SELECT * FROM booking WHERE guest_email = '$to'";
					$result = mysqli_query($conn,$qry) or die("query failed");
					if(mysqli_num_rows($result)>0){
						?>
					<script type="text/javascript">
						alert("alraedy Exit");
						window.location.href = "roombook.php";
					</script>
					<?php
					}
					else{
						$qry2 = "INSERT INTO booking VALUES('','$room_no','$type','$to','$name','$cn','$city','$child','$adult','$cin','$cout',datediff('$_POST[cout]','$_POST[cin]'),'$stat','$f_stat','$curdate','$bill')";
						if(mysqli_query($conn,$qry2) or die("query failed2")){

						$qry = "UPDATE room SET status_id='$stat' , f_status_id = '$f_stat' WHERE room_no = '$room_no' ";
					$result = mysqli_query($conn,$qry) or die("query failed");
					?>
					<script type="text/javascript">
						alert("Alhamdulillah Booking has Done!");
						window.location.href = "roombook.php";
						
					</script>
					<?php
                   
                    ?>
                   
                    <?php
					}
					
					}

?>
