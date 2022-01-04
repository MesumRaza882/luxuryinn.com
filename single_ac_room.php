<!DOCTYPE html>
<html>
<head>
	<title>DashBoard Admin</title>
	<style>
			#tab2 th{
				background-color:orange;
				color: white;
				text-align: center;
				font-size: 16px;
			}
			#tab2 th:hover{
				color: black;
			}
			#tab2 td{
				text-align: center;
				color: black;
				font-family: cursive;
				font-size: 14px;
				font-weight: bold;
			}
			#tab2 tr:hover{
				background-image:linear-gradient(rgba(255,153,0,0.2),rgba(0,151,255,0.4));
			}
			#action{
				font-size: 18px;
				font-family: cursive;
				text-decoration: none;
			}
	</style>
</head>
<body>
<?php
require('navbar.php');
?>
<div class="row">
	<?php  require('sidebar.php');
$type = "";
$available = "";
$booked = "";

		$conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
		$qry = "SELECT * FROM room_type WHERE type_id = '1'";
		$result = mysqli_query($conn,$qry) or die("query failed");
		while($row = mysqli_fetch_assoc($result)){
			$type = $row['type'];
				}
	?><typebr><br>
	<div class="col-md-1"></div>
	<div class="col-md-8">
		<!--Total Single_ac-rooms-->
						<?php
						$conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
						$qry = "SELECT count(room_id) AS total FROM room INNER JOIN room_type ON room.type_id=room_type.type_id INNER JOIN status ON room.status_id=status.status_id INNER JOIN rent ON room.rent_id = rent.rent_id WHERE type='$type'";
						$result = mysqli_query($conn,$qry) or die("query failed");
						$values = mysqli_fetch_assoc($result);
						$num_rows = $values['total'];
						?><br><br><br>
					<div class="row">
						<div class="col-md-6">
						<h3>Type:<?php echo $type;?></h3><h4 style="display: inline;">Total Rooms</h4><button class="btn btn-lg btn-info"><?php echo $num_rows; ?></button><br><br>
						
						</div>
						<!--Availbale and Booked-->
						<div class="col-md-6">
						<?php
						$conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
						$qry = "SELECT count(room_id) AS available FROM room INNER JOIN room_type ON room.type_id=room_type.type_id INNER JOIN rent ON room.rent_id = rent.rent_id WHERE type='$type' and status_id = '0' ";
						$result = mysqli_query($conn,$qry) or die("query failed");
						$values = mysqli_fetch_assoc($result);
						$available_rows = $values['available'];
						?>
						<h4 style="display: inline;">Availble Rooms&nbsp;&nbsp;</h4><button class="btn btn-lg btn-info"><?php echo $available_rows; ?></button>
						<!--booked room total-->
						<?php
						$conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
						$qry = "SELECT count(room_id) AS booked FROM room INNER JOIN room_type ON room.type_id=room_type.type_id WHERE type='$type' and status_id = '1'";
						$result = mysqli_query($conn,$qry) or die("query failed Book");
						$values = mysqli_fetch_assoc($result);
						$booked_rows = $values['booked'];
						?>
						<h4 style="display: inline;">Booked Rooms&nbsp;&nbsp;</h4><button class="btn btn-lg btn-info"><?php echo $booked_rows; ?></button>
						</div>
					</div><br><br>
					<!--view Rooms-->
					<!--Total rooms records-->
						</table>
					<?php
							$conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
					$qry = "SELECT * FROM room INNER JOIN room_type ON room.type_id=room_type.type_id INNER JOIN status ON room.status_id=status.status_id INNER JOIN rent ON room.rent_id = rent.rent_id WHERE type='$type' ";
					$result = mysqli_query($conn,$qry) or die("query failedd");
					if(mysqli_num_rows($result)>0){
						?>
						<table class="table table-bordered table-condensed" id="tab2">
							<tr>
								<th>Room No</th>
								<th>Image</th>
								<th>Room Type</th>
								<th>Status</th>
								<th>Rent</th>
								<th>Facilities</th>
								<th>Description</th>
								<th>Role</th>
								<th>Booking</th>
							</tr>
							<?php 
						}
							while($row=mysqli_fetch_assoc($result)){
								?>
						<tr>
								
								<td><?php echo $row['room_no']; ?></td>
								<td><img width="70" height="70" class="img-thumbnail bg-info" src="<?php echo $row['image'];?>"></td>
								<td><?php echo $row['type']; ?></td>
								<td><?php echo $row['status']; ?></td>
								<td><?php echo $row['rent']; ?></td>
								<td><?php echo $row['facilities']; ?></td>
								<td><?php echo $row['description']; ?></td>
								<td>
									<a id="action" href="edit.php?id=<?php echo $row['room_no'];?>" style="color: #0099cc;">Edit</a><span style="font-size: 20px; font-weight: bold;">/</span><a id="action"



									 href="delete2.php?did=<?php echo $row['room_no'];?>" style="color: red;">Delete</a>
								</td>
								<!--Booking-->
								<td>
									<a href="roombook.php" class="btn btn-primary <?php if($row['status_id']==0){echo"active";}else{echo "disabled";} ?>">Book</a>
									<a href="roombook.php" class="btn btn-danger <?php if($row['status_id']==0){echo"disabled";}else{echo "active";} ?>">Un-Book</a>
								</td>
							</tr>
								<?php }

						?>
						</table>
					

					</div>
	<div class="col-md-1"></div>
</div>
</body>
</html>