<!DOCTYPE html>
<html>
<head>
	<title>DashBoard Admin</title>
    <style type="text/css">
        #pnl:hover{
            background-color: rgb(254,153,0,0.3);

        }
        
            body{background-image:linear-gradient(rgba(255,153,0,0.1),rgba(255,153,0,0.1))}

    </style>
</head>
<body>

<div class="row">
<?php
require('navbar.php');
?>
<div class="col-md-9" style="margin-left: 3%;">
<!--page-->
	 <div id="page-wrapper">
            <div id="page-inner"><br><br>
                <div class="row">
                <!--rOOM tYPES coding-->
                <?php
                $type = "";
                $num_rows = "";
                $available_rows = "";
                $booked_rows = "";
                $conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
                    $qry2 = "SELECT * FROM room_type";
                    $result = mysqli_query($conn,$qry2) or die("query failed");
                    if(mysqli_num_rows($result)>0){
                        while($row=mysqli_fetch_assoc($result)){
                            $type = $row["type"];
                        ?>
                    <div class="col-md-3">
                        <div class="panel panel-primary" id="pnl">
                            <div class="panel-heading">
                                <h3 class="text-center"><?php echo $type;

                     $qry1 = "SELECT count(room_id) AS available FROM room INNER JOIN room_type ON room.type_id=room_type.type_id INNER JOIN rent ON room.rent_id = rent.rent_id WHERE type='$type' and status_id = '0' ";
                        $result1 = mysqli_query($conn,$qry1) or die("query failed");
                        $values = mysqli_fetch_assoc($result1);
                        $available_rows = $values['available'];

                        $qry3 = "SELECT count(room_id) AS booked FROM room INNER JOIN room_type ON room.type_id=room_type.type_id WHERE type='$type' and status_id = '1'";
                        $result3 = mysqli_query($conn,$qry3) or die("query failed Book");
                        $values = mysqli_fetch_assoc($result3);
                        $booked_rows = $values['booked'];

                               $qry2 = "SELECT count(room_id) AS total1 FROM room INNER JOIN room_type ON room.type_id=room_type.type_id INNER JOIN status ON room.status_id=status.status_id INNER JOIN rent ON room.rent_id = rent.rent_id WHERE type='$type'";
                        $result2 = mysqli_query($conn,$qry2) or die("query failed");
                        $values = mysqli_fetch_assoc($result2);
                        $num_rows = $values['total1'];

                        echo "<h4>Total Rooms: $num_rows<h4>";
                                ?></h3>
                            </div>
                            <div class="panel-body">
                                <h4 class="text-primary" style="font-weight: bold; font-family: cursive;">Available Rooms:<?php
                                echo $available_rows;?></h4>
                                <h4 style="letter-spacing:1px; color: red; font-weight: bold; font-family: cursive;">Booked Rooms:<?php
                                echo $booked_rows;?></h4>
                            </div>
                            <div class="panel-footer">
                              <center>  <a href="opentype.php?otype=<?php echo $type;?>" class="btn <?php if($booked_rows == $num_rows){
                                ?>
                                btn-danger  
                                <?php  } else {?>
                                    btn-info
                                    <?php } ?>">Click For Action</a>
                              </center>
                            </div>
                        </div>
                    </div>

                <?php } } ?>
                </div>


</div>
</div>
</div>
</div>
</body>
</html>
