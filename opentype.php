<!DOCTYPE html>
<html>
<head>
	<title>DashBoard Admin</title>
	<style>
		#table-con{
				height: 500px;
				overflow: scroll;
			}
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
				font-size: 16px;
				font-family: cursive;
				text-decoration: none;
			}
			#main{
				margin:-3% 0 0 2%;

			}
			  body{background-image:linear-gradient(rgba(255,153,0,0.1),rgba(255,153,0,0.1))}
	</style>
</head>
<body>

<div class="row">
<?php
require('navbar.php');
$otype = $_GET['otype'];
?>
<div class="col-md-9" id="main">
<!--page-->
	 <div id="page-wrapper">
            <div id="page-inner">
						
                <div class="row">
                    <div class="col-md-12"><br><br><br>
                        <!--rooms record-->
						
					<div class="row">
						<div class="col-md-6">
							
							<b><h3 class="page-header text-center" style="font-size: 25px;
							background-color: rgba(0,31,51,0.6); padding: 1.5% 0; color: white; border-radius: 10px;
							">
                            <?php echo $otype;?>
                        </h3></b>&nbsp;
						</div>
						<div class="col-md-6"></div>
					</div>
					
						
					
						
							<!--Total rooms records-->
						
						
						<?php

					$conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
					$qry = "SELECT * FROM room INNER JOIN room_type ON room.type_id=room_type.type_id INNER JOIN status ON room.status_id=status.status_id INNER JOIN rent ON room.rent_id = rent.rent_id WHERE type='$otype' ORDER BY status ASC, room_no ASC";
					$result = mysqli_query($conn,$qry) or die("query failed");
					if(mysqli_num_rows($result)>0){
						?>
						<div  id="table-con">
						<table class="table table-bordered table-condensed" id="tab2">
							<tr>
								<th>Room No</th>
								<th>Image</th>
								<th>Room Type</th>
								<th>Status</th>
								<th>Rent</th>
								<th>Facilities</th>
								<th>Description</th>
								<th>Action</th>
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
									 <a id="action" style="color: white;" class="btn 
                                   <?php if($row['status_id']==0 and $row['f_status_id']==0){
                                    echo "btn-success";
                                   }
                                   elseif($row['status_id']==1 and $row['f_status_id']==0){
                                    echo "btn-primary";
                                   }
                                   else{
                                    echo "btn-danger";
                                   }

                                    ?>     
                                    " 


                               

                                    href="<?php
                                    if($row['status_id']==0 and $row['f_status_id']==0){
                                    	?>
                                    	booking.php
                                    	<?php
                                    }elseif($row['status_id']==1 and $row['f_status_id']==0){
                                    	?>
                                    	admin_dashboard.php
                                    <?php
                                    }else
                                    {
                                    	?>
                                    "
                                    	<?php
                                    }




                                         ?>?id=<?php echo $row['room_no']."&otp=$otype"?>" style="color: #0099cc;"><?php 
                                    if($row['status_id']==0 and $row['f_status_id']==0){
                                    echo "Book";
                                   }
                                   elseif($row['status_id']==1 and $row['f_status_id']==0){
                                    echo "Check In";
                                   }
                                   else{
                                    echo "Booked";
                                   }
                                    ?></a>








								
															
							</tr>
							<?php }	?>
						</table>
					
						
                    </div>
                </div>


</div>
</div>

</body>
</html>