<!DOCTYPE html>
<html>
<head>
	<title>DashBoard Admin</title>
	<style>
			#tab2 th{
				background-color:black;
				color: white;
				text-align: center;
				font-size: 16px;
			}
			#tab2 th:hover{
				color: green;
			}
			#tab2 td{
				text-align: center;
				color: black;
				font-family: sans-serif;
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
			#main{
				margin:-2% 0 0 3%;


			}
			
			body{background-image:linear-gradient(rgba(255,153,0,0.1),rgba(255,153,0,0.1))}
			
	</style>
</head>
<body>

<div class="row">
<?php
require('navbar.php');
?>
<div class="col-md-9" id="main">
<!--page-->
	 <div id="page-wrapper">
            <div id="page-inner">
						<?php
						$conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
						$qry = "SELECT count(room_id) AS total FROM room";
						$result = mysqli_query($conn,$qry) or die("query failed");
						$values = mysqli_fetch_assoc($result);
						$total_rec = $values['total'];
						
						
						$qry = "SELECT count(room_id) AS ava FROM room WHERE status_id = '0' and f_status_id = '0' ";

						$result = mysqli_query($conn,$qry) or die("query failed2");
						$values = mysqli_fetch_assoc($result);
						$ava_rows = $values['ava'];

						$qry = "SELECT count(room_id) AS res FROM room WHERE status_id = '1' and f_status_id = '0' ";

						$result = mysqli_query($conn,$qry) or die("query failed2");
						$values = mysqli_fetch_assoc($result);
						$res_rows = $values['res'];

						$qry = "SELECT count(room_id) AS bk FROM room WHERE status_id = '1' and f_status_id = '1' ";

						$result = mysqli_query($conn,$qry) or die("query failed3");
						$values = mysqli_fetch_assoc($result);
						$book_rows = $values['bk'];
						?>

                <div class="row">
                    <div class="col-md-12"><br><br><br>
                        <!--rooms record-->
						
					<div class="row">
						<div class="col-md-6">
							<!--Total rooms-->
							<b><span class="page-header" style="font-size: 25px;">
                            All Room's Detail
                        </span></b>&nbsp;&nbsp;&nbsp;&nbsp;
                        <span style="font-size: 20px;">Total <button class="btn btn-info"><?php echo $total_rec; ?></button></span><br><br>
                        <span style="font-size: 20px;">Available <button class="btn btn-success"><?php echo $ava_rows; ?></button></span>&nbsp;&nbsp;&nbsp;&nbsp;
                        <span style="font-size: 20px;">Booked <button class="btn btn-danger"><?php echo $book_rows; ?></button></span>&nbsp;&nbsp;&nbsp;&nbsp;
                        <span style="font-size: 20px;">Reserved <button class="btn btn-primary"><?php echo $res_rows; ?></button></span>
						<br><br>
						</div>
						<!--Search-->
						<div class="col-md-3">
			<form action="" method="post">
			<div class="form-group">
				<input type="text" name="search" required placeholder="Type||Room Number||Status" class="form-control" style=" border:3px solid #0099ff;" autocomplete="off"><br>
				<center><button type="submit" class="btn btn-primary" name="searchbtn">Search</button>
				</button></center>
			</div>
		</form>
						</div>
						<!--Add Rooms Portion-->
						<div class="col-md-3">
						<center>
						<h3 class="text-info">Add Room</h3>
						<a href="addrooms.php" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i></a></center><br>
						</div>
					</div>
					<!--Search Coding-->
						<?php
						$limit = 5;
					
					if(isset($_GET['page']))
					{
						$page = $_GET['page'];
					}else{
						$page = 1;
					}
					if(isset($_POST["searchbtn"])){
						$search = $_POST["search"];
					$conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
					$qry = "SELECT * FROM room INNER JOIN room_type ON room.type_id=room_type.type_id INNER JOIN status ON room.status_id=status.status_id INNER JOIN rent ON room.rent_id = rent.rent_id  WHERE type LIKE '%$search%' || status LIKE '%$search%' || room_no = '$_POST[search]'";
					$result = mysqli_query($conn,$qry) or die("query failed");
					if(mysqli_num_rows($result)>0){
						?>
						<div class="table-responsive" id="table-con">
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
							</tr>
							<?php 
						}else
{
	?>
	<h1 class="text-center text-alert">Record Not Exit</h1>
	<?php
}

							while($row=mysqli_fetch_assoc($result)){
								?>
						<tr>
								
								<td><?php echo $row['room_no']; ?></td>
								<td><img width="90" height="90" class="img-thumbnail" src="<?php echo $row['image'];?>"></td>
								<td><?php echo $row['type']; ?></td>
								<td><?php
								 if($row['status_id']==0 and $row['f_status_id']==0)
                                    {echo "Available";}
                                elseif($row['status_id']==1 and $row['f_status_id']==0)
                                    {echo "Reserved";}
                                else
                                    {echo "Booked";}
								 ?></td>
								<td><?php echo $row['rent']; ?></td>
								<td><?php echo $row['facilities']; ?></td>
								<td><?php echo $row['description']; ?></td>
								<td>
									<?php
									if($row['status_id']==0){
									?>
									<a id="action"  href="edit.php?id=<?php echo $row['room_no'];?>" style="color: #0099cc;">Edit</a><span style="font-size: 20px; font-weight: bold;">/</span><a id="action"
									onclick = "confirmationDelete(this); return false;"
									 href="delete2.php?did=<?php echo $row['room_no'];?>" style="color: red;">Delete</a>
									<?php }
									else{
										?><a id="action"  href="edit.php?id=<?php echo $row['room_no'];?>" style="color: #0099cc;">Edit</a><span style="font-size: 20px; font-weight: bold;">		
										<?php
									}


									 ?>
								</td>
							
							</tr>
							<?php  }	?>
							<!--Total rooms records-->
						</table>
					</div>
						<?php }	
						else{
					$limit = 5;
					
					if(isset($_GET['page']))
					{
						$page = $_GET['page'];
					}else{
						$page = 1;
					}
					$offset = ($page - 1)*$limit;
					$conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
					$qry = "SELECT * FROM room INNER JOIN room_type ON room.type_id=room_type.type_id INNER JOIN status ON room.status_id=status.status_id INNER JOIN rent ON room.rent_id = rent.rent_id 
					ORDER BY  room_no ASC , status ASC LIMIT {$offset},{$limit}";
					$result = mysqli_query($conn,$qry) or die("query failed");
					if(mysqli_num_rows($result)>0){
						?>
						<div class="table-responsive" id="table-con">
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
							</tr>
							<?php 
						}
							while($row=mysqli_fetch_assoc($result)){
								?>
						<tr>
								
								<td><?php echo $row['room_no']; ?></td>
								<td><img width="70" height="70" class="img-thumbnail bg-info" src="<?php echo $row['image'];?>"></td>
								<td><?php echo $row['type']; ?></td>
								<td><?php
								 if($row['status_id']==0 and $row['f_status_id']==0)
                                    {echo "Available";}
                                elseif($row['status_id']==1 and $row['f_status_id']==0)
                                    {echo "Reserved";}
                                else
                                    {echo "Booked";}
								 ?></td>
								<td><?php echo $row['rent']; ?></td>
								<td><?php echo $row['facilities']; ?></td>
								<td><?php echo $row['description']; ?></td>
								<td>
									<?php
									if($row['status_id']==0){
									?>
									<a id="action"  href="edit.php?id=<?php echo $row['room_no'];?>" style="color: #0099cc;">Edit</a><span style="font-size: 20px; font-weight: bold;">/</span>
									<a id="action"
									onclick = "confirmationDelete(this); return false;"
									 href="delete2.php?did=<?php echo $row['room_no'];?>" style="color: red;">Delete</a>
									<?php }
									else{
										?>
										<a id="action"  href="edit.php?id=<?php echo $row['room_no'];?>" style="color: #0099cc;">Edit</a><span style="font-size: 20px; font-weight: bold;">	
										<?php
									}


									 ?>
								</td>								
							</tr>
							<?php }	?>
						</table>
					</div>
						<?php
						}
						$limit = 4;
						$total_pages = ceil($total_rec / $limit);
						echo '<center>'.'<ul class="pagination">';
						for($i=1; $i<= $total_pages; $i++)
						{
							if($i == $page){
								$active = "active";
							}
							else{
								$active = "";
							}
							echo '<li class="'.$active.'" ><a href="rooms.php?page='.$i.'">'.$i.'</a></li>';
						}
						echo '</ul>'.'</center>';
						?>
						
                    </div>
                </div>


</div>
</div>

<script type = "text/javascript">
	function confirmationDelete(anchor){
		var conf = confirm("Are you sure you want to delete this record?");
		if(conf){
			window.location = anchor.attr("href");
		}
	} 
</script>







</body>
</html>