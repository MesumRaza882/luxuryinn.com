
<!DOCTYPE html>
<html>
<head>
	<title>DashBoard Admin</title>
    <style type="text/css">
        #tab2{
                background-color:rgb(0,32,55,0.8);
                color: white;

        }
        #tab,tr:hover{
            background-color:white ;
            color: rgba(0,31,51,1);
            text-align: center;

            }

        #head,th{
            color: white;
            font-weight: bold;
            font-size: 15px;

            
        }

        #mydiv,#mydiv2{
            height: 300px;
            overflow: scroll;
        }

        #btn1{
            background-color: #ff0000;
            border-radius: 5px;
            border:1px solid #0099cc;
            margin-top: 2%;
            transition: 0.3s ease;

        }
        #btn1:hover{
            color: white;
            border-radius: 15px;
        }
        body{background-image:linear-gradient(rgba(255,153,0,0.1),rgba(255,153,0,0.1))}
    </style>
</head>
<body>

<div class="row">
<?php
require('navbar.php');
?>
<div class="col-md-9">
<!--page-->
	 <div id="page-wrapper">
            <div id="page-inner">

<?php
 $conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");

 $qry2 = "SELECT count(id) AS total FROM booking WHERE final_stat = '1' AND stat='1' ";
                        $result = mysqli_query($conn,$qry2) or die("query failed");
                        $values = mysqli_fetch_assoc($result);
                        $num_rows_book = $values['total'];

 $qry3 = "SELECT count(id) AS total FROM booking WHERE stat = '0' AND final_stat = '0' ";
                        $result = mysqli_query($conn,$qry3) or die("query failed");
                        $values = mysqli_fetch_assoc($result);
                        $chk = $values['total'];
                       

?>
               <br>

                <!--panel-->
                <?php
                $conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
                    $qry = "SELECT count(id) AS total FROM booking WHERE stat = '1' AND final_stat = '0' ";
                        $result = mysqli_query($conn,$qry) or die("query failed");
                        $values = mysqli_fetch_assoc($result);
                        $num_rows = $values['total'];

                        ?>
                
                        <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                        </div>
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">
                            
                            <div class="panel panel-primary">
                                    <div class="panel-heading" >
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                            <button class="btn btn-default"  type="button">
                                                 New Room Bookings  <span class="badge"><?php echo $num_rows;?></span>
                                            </button>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse in" style="height: auto;">
                                        <div class="panel-body">
                                           <div class="panel panel-default">
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <?php
                    $conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
                    $qry = "SELECT * FROM booking WHERE stat = '1' AND final_stat = '0' ";
                    $result = mysqli_query($conn,$qry) or die("query failed");
                    if(mysqli_num_rows($result)>0){
                        ?>
                                <div class="table-responsive">
                                <table class="table table-responsive table-bordered table-condensed table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Room No</th>
                                            <th>Room Type</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Check In</th>
                                            <th>Check Out</th>
                                            
                                            <th>Total Bill</th>
                                            <th>Status</th>
                                            <th>More</th>
                                            
                                        </tr>
                                         </thead>
                                        <?php 
                                         }
                                         else
                                                { ?>

                         <div class="alert alert-danger">No Request of Room is available!</div>
                        <?php }

                            while($row=mysqli_fetch_assoc($result)){
                                ?>
                                    <tbody>
                                        <tr>
                                <th><?php echo $row['room_no']; ?></th>
                                <td><?php echo $row['type']; ?></td>
                                <td><?php echo $row['guest_name']; ?></td>
                                <td><?php echo $row['guest_email']; ?></td>
                                <td><?php echo $row['cin']; ?></td>
                                <td><?php echo $row['cout']; ?></td>
								<?php  
								$days = $row['nodays'];
								$bill = $row['bill'];
								$total = $days*$bill
								?>
								
                                <td><?php echo $total ?></td>
                                <td><?php if($row['final_stat']==0){echo "Not Confirm";} ?></td>
                                
                                <?php
                                $otype = $row['guest_email'];
                                 ?>
                                <td> 
                                    <a href="confirmbooking.php?rm_no=<?php echo $row['room_no']."&mail=$otype"?>" class="btn btn-success btn-sm">Action</a>
                                    <span style="font-size: 20px; font-weight: bold;"> | </span>
                                     <a href="delreserve.php?did=<?php echo $row['room_no'];?>" class="btn btn-danger btn-sm">Delete</a>
                                </td>



                            </tr>
                            <?php  }    ?>
                                  
                                    </tbody>
                                </table>
                            </div>
                            </div>

                        </div>
                        <!--booked room-->
                           
                         <div class="panel">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-md-10">
                                        <h4 class="panel-title" style="background-color: #0099cc; border-radius: 5px;">
                                           <form method="post" action="#">
                                                <input class="btn btn-primary" type="submit" value="View Booked Rooms" name="searchbtn"> <span class="btn btn-primary btn-sm">
                                                    <?php echo $num_rows_book; ?></span>
                                           </form> 
                                        </h4></div>
                                        <div class="col-md-1">
                                           <input type="button" id="btn1" value="&times;" onclick="myfun()" class=" close btn  btn-primary">
                                        </div>
                                        <div class="col-md-1"></div>
                                        <br><br><br>
                                         <?php
                                        if(isset($_POST["searchbtn"])){
             $conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
                      $qry = "SELECT * FROM booking WHERE final_stat = '1' AND stat = '1' ";
                    $result = mysqli_query($conn,$qry) or die("query failed");
                    if(mysqli_num_rows($result)>0){
                        ?>
                        <div id="mydiv">
                        <table class="table table-bordered table-condensed table-responsive" id="tab2">
                            <tr id="head">
                                <th>Room No</th>
                                <th>Room Type</th>
                                <th>Guest-Name</th>
                                <th>Contact No</th>
                                <th>Child</th>
                                <th>Adult</th>
                                <th>Check in</th>
                                <th>Check out</th>
                                <th>Days</th>
                                <th>Bill per day</th>
                                <th>Total Bill</th>
                                <th>Action</th>
                                
                                
                            </tr>
                            <?php 
                        } else
                                                { ?>

                         <div class="alert alert-danger">No Booked Room is available!</div>
                        <?php }
                        while($row=mysqli_fetch_assoc($result)){
                                ?>
                        <tr>
                                
                                <td><?php echo $row['room_no']; ?></td>
                                <td><?php echo $row['type']; ?></td>
                                <td><?php echo $row['guest_name']; ?></td>
                                <td><?php echo $row['contact no']; ?></td>
                                <td><?php echo $row['child']; ?></td>
                                <td><?php echo $row['adult']; ?></td>
                                <td><?php echo $row['cin']; ?></td>
                                <td style="color: red;"><?php echo $row['cout']; ?></td>

                                <td><?php echo $row['nodays']; ?></td>
                                <td><?php echo $row['bill']; 
								$days = $row['nodays'];
								$bill = $row['bill'];
								$total = $days*$bill
								?></td>
								
                                <td><?php echo $total ?></td>

                                <td><center><a class = "btn btn-warning" href = "checkout.php?id=<?php echo $row['room_no'] ?>" onclick = "confirmationCheckin(); return false;"><i class = "glyphicon glyphicon-check"></i> Check Out</a></center></td>

                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                      </div>
            

                                                                     
                                        </div>
                                          <?php
                        }
                        ?>
                                    </div>
<!--Checked out Room-->
        <div class="panel">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-md-10">
                                        <h4 class="panel-title" style="background-color: #00ff44; border-radius: 5px;">
                                           <form method="post" action="#">
                                                <input class="btn btn-success" type="submit" value="View Check Out Rooms" name="searchbtn2">  <span class="badge"><?php echo $chk ?></span>
                                           </form> 
                                        </h4></div>
                                        <div class="col-md-1">
                                           <input type="button" id="btn1" value="&times;" onclick="myfun2()" class=" close btn  btn-primary">
                                        </div>
                                        <div class="col-md-1"></div>
                                        <br><br><br>
                                         <?php
                                        if(isset($_POST["searchbtn2"])){
             $conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
                      $qry = "SELECT * FROM booking  WHERE stat = '0' AND final_stat = '0' ";
                    $result = mysqli_query($conn,$qry) or die("query failed");
                    if(mysqli_num_rows($result)>0){
                        ?>
                        <div id="mydiv2">
                        <table class="table table-bordered table-condensed table-responsive" id="tab2">
                            <tr id="head">
                                <th>Room No</th>
                                <th>Room Type</th>
                                <th>Guest-Name</th>
                                <th>Contact No</th>
                                <th>Child</th>
                                <th>Adult</th>
                                <th>Check in</th>
                                <th>Check out</th>
                                <th>Days</th>
                                <th class="text-center" colspan="2">Bill</th>
                                
                                
                                
                                
                            </tr>
                            <?php 
                        } else
                                                { ?>

                         <div class="alert alert-danger">No Checked Out Room is available!</div>
                        <?php }
                        while($row=mysqli_fetch_assoc($result)){
                                ?>
                        <tr>
                                
                                <td><?php echo $row['room_no']; ?></td>
                                <td><?php echo $row['type']; ?></td>
                                <td><?php echo $row['guest_name']; ?></td>
                                <td><?php echo $row['contact no']; ?></td>
                                <td><?php echo $row['child']; ?></td>
                                <td><?php echo $row['adult']; ?></td>
                                <td><?php echo $row['cin']; ?></td>
                                <td style="color: red;"><?php echo $row['cout']; ?></td>

                                <td><?php echo $row['nodays']; ?></td>
                                <?php 
								$days = $row['nodays'];
								$bill = $row['bill'];
								$total = $days*$bill;
								?>
								
                                <td><?php echo $total ?></td>
                                <td><?php echo "Paid" ?></td>

                             

                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                      </div>
            

                                                                     
                                        </div>
                                          <?php
                        }
                        ?>
                                    </div>
                                    <!--Ch end-->

                                </div>
                          
                                    
                                </div>
                               
                    </div>


</div>
</div>

<script type="text/javascript">

    function confirmationCheckin(anchor){
        var conf = confirm("Are you sure you want to check out?");
        if(conf){
            window.location = anchor.attr("href");
        }
    }

function myfun(){
    
    var mybox=document.getElementById("mydiv");
    if(mybox.style.display=="block")
    {
        mybox.style.display="none";
    }
    else
    {
        mybox.style.display="none";
    }
}    
function myfun2(){
    
    var mybox=document.getElementById("mydiv2");
    if(mybox.style.display=="block")
    {
        mybox.style.display="none";
    }
    else
    {
        mybox.style.display="none";
    }
}    
</script>




</body>
</html>