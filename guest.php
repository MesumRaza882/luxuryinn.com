<!DOCTYPE html>
<html>
<head>
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
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
            #main{
                margin:-3% 0 0 3%;
                height: 655px;
                overflow: scroll;

            }
            #showbtn{
                width: 78px;
                padding-left: 5%;
                margin-top: 2%;

            }

#showbtn:hover{
    background-color: rgba(0,31,51,1);
    color:#ff9900; 
    border-top-right-radius: 10px;
    border-bottom-left-radius: 10px;
    transition: 0.3s ease;
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
                        $qry = "SELECT count(guest_id) AS total FROM guest";
                        $result = mysqli_query($conn,$qry) or die("query failed");
                        $values = mysqli_fetch_assoc($result);
                        $num_rows = $values['total'];
                        
                        
                        $qry = "SELECT count(id) AS ava FROM booking WHERE final_stat = '1' AND guest_email != '' ";
                        $result = mysqli_query($conn,$qry) or die("query failed2");
                        $values = mysqli_fetch_assoc($result);
                        $ava_rows = $values['ava'];

                        ?>

                <div class="row">
                    <div class="col-md-12"><br><br><br>
                        <!--rooms record-->
                        
                    <div class="row">
                        <div class="col-md-5"><br>
                            <!--Total rooms-->
                            <b><span class="page-header" style="font-size: 25px;
                            background-color: rgba(0,31,51,0.6); padding: 2.5% 5%; color: white; border-radius: 10px;
                            ">
                            All User's Detail
                        </span></b><br><br>
                        <form method="post" action="#">
                        <span style="font-size: 20px;">Total Users <button type="submit" name="users" class="btn btn-info"><?php echo $num_rows; ?></button></form></span><br>
                        
                        </div>
                        <!--Search-->
                        <div class="col-md-4">
                            <br><br><br>
                              <form method="post" action="#">
                        <span style="font-size: 20px;">Our Guest <button type="submit" name="guests" class="btn btn-primary"><?php echo $ava_rows; ?></button></span>
                      
                        </div>  
                        <!--Add Rooms Portion-->
                        
                    </div><?php
                        if(isset($_POST["users"])){

                     $conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
                    $qry = "SELECT * FROM guest INNER JOIN  city ON guest.city_id = city.city_id ";
                    $result = mysqli_query($conn,$qry) or die("query failed");
                    if(mysqli_num_rows($result)>0){
                        ?>
                        <table class="table table-bordered table-condensed" id="tab2">
                            <tr>
                                <th>Guest-Id</th>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Conatct-No</th>
                                <th>Address</th>
                                <th>Gender</th>
                                <th>City</th>
                                <th>Action</th>
                            </tr>
                           <?php 
                        }
                            while($row=mysqli_fetch_assoc($result)){
                                ?>
                        <tr>
                                
                                <td><?php echo $row['guest_id']; ?></td>
                                <td><?php echo $row['guest_name']; ?></td>
                                <td><?php echo $row['guest_email']; ?></td>
                                <td><?php echo $row['contact_no']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <td><?php echo $row['gender']; ?></td>
                                <td><?php echo $row['city_name']; ?></td>
                                <td>
                                   <span>After Booking Solve</span>    
                                </td>                               
                            </tr>
                            <?php } ?>
                        </table>
                        <?php
                        }
                    else if(isset($_POST["guests"])){

             $conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
                      $qry = "SELECT * FROM booking WHERE final_stat = '1'  AND guest_email != '' ";
                    $result = mysqli_query($conn,$qry) or die("query failed");
                    if(mysqli_num_rows($result)>0){
                         while($row=mysqli_fetch_assoc($result)){
                        ?>
                        <div class="col-md-4">
                        <div class="panel panel-primary" id="pnl">
                            <div class="panel-body">
                               <center><span> <i style="font-size: 80px;" class='glyphicon glyphicon-user'></i></span></center>
                               <h4 class="text-center"><?php echo $row['guest_name']; ?></h4>
                            </div>
                            <div class="panel-footer" style="background-color: #0099cc; color: white;">
                                <div class="row">
                                    <div class="col-md-9">
                                        <span><?php echo $row['type']; ?></span>
                                    </div>
                                    <div class="col-md-3">
                                        <a class="btn btn-info" id="showbtn"  href="show.php?id=<?php echo $row['id'];?>">Show</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                        <?php
                    }
                }

                }else {
                     $conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
                      $qry = "SELECT * FROM booking WHERE final_stat = '1' AND guest_email != ''  ";
                    $result = mysqli_query($conn,$qry) or die("query failed");
                    if(mysqli_num_rows($result)>0){
                         while($row=mysqli_fetch_assoc($result)){
                        ?>
                        <div class="col-md-4">
                        <div class="panel panel-primary" id="pnl">
                            <div class="panel-body">
                               <center><span> <i style="font-size: 80px;" class='glyphicon glyphicon-user'></i></span></center>
                               <h4 class="text-center"><?php echo $row['guest_name']; ?></h4>
                            </div>
                            <div class="panel-footer" style="background-color: #0099cc; color: white;">
                                <div class="row">
                                    <div class="col-md-9">
                                        <span><?php echo $row['type']; ?></span>
                                    </div>
                                    <div class="col-md-3">
                                        <a class="btn btn-info" id="showbtn"  href="show.php?id=<?php echo $row['id'];?>">Show</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                        <?php
                    }
                }


                }

                        ?>
                    </div>
                </div>


</div>
</div>

</body>
</html>