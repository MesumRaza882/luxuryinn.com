<!DOCTYPE html>
<html>
<head>
    <title>Booking Confirm</title>
    <style>
      body{background-image:linear-gradient(rgba(255,153,0,0.1),rgba(255,153,0,0.1))}
          #butt{
      border-radius: 10px;
      width: 130px;
      border:none;
  background-color:rgb(0,31,51,0.5);
  color: white;
}
#butt:hover{
  background-color: rgba(0,31,51,1);
  color:#ff9900; 
  border-top-right-radius: 25px;
  border-bottom-left-radius: 25px;
  transition: 0.3s ease;
}
    </style>
</head>
<body>

<div class="row">
<?php
require('navbar.php');
$rm_id = $_GET['rm_no'];
$otype = $_GET['mail'];
$curdate=date("Y/m/d");
$conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
$qry = "SELECT * FROM booking WHERE room_no = '$rm_id' AND guest_email = '$otype' ";
$result = mysqli_query($conn,$qry) or die("q1 failed");
$row=mysqli_fetch_assoc($result)
?>
<div class="col-md-9" style="margin-left: 3%;">
<!--page-->
     <div id="page-wrapper">
            <div id="page-inner">

   <div class="row">
                    <div class="col-md-12"><br><br>
                       <h1 style=" display: inline; background-color: rgba(0,31,51,0.6); padding: 1.5% 1%; margin-right: 5px; color: white; border-radius: 10px;">Now Book Room </h1><span style="color: gray; font-size: 18px;" class="animated fadeInRight"><?php echo  $curdate; ?></span>
                       <br><br><br>
                       <div class="row">
                           
                           <div class="col-md-6">
                            <!--Form-->
                            <form action="savedataconfirm.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                            <label>room no</label>
                            <input type="text" name="rm" class="form-control"readonly value="<?php echo $rm_id?>"><br>
                            <label>room Type</label>
                            <input type="text" name="rtp" class="form-control"readonly value="<?php echo $row['type']?>"><br>
                             <label>Guest Email</label>
                            <input type="text" name="mail" class="form-control"readonly value="<?php echo $row['guest_email']?>"><br>
                            <label>Guest Name</label>
                            <input type="text" name="gname" class="form-control"readonly value="<?php echo $row['guest_name']?>"><br>
                            <label>Contact No</label>
                            <input type="text" name="cn" class="form-control"readonly value="<?php echo $row['contact no']?>"><br>
                            <label>City</label>
                       <input type="text" name="city" class="form-control" readonly value="<?php echo $row['city']?>"><br>
                       
                         
                    </div>
              
                
                             <!--End Form-->
                      </div>



                           <div class="col-md-6">
                            <div class="form-group">
                               <label>Child</label>
                       <input type="text" name="city" class="form-control" readonly value="<?php echo $row['child']?>"><br>
                       <label>Adult</label>
                        <input type="text" name="city" class="form-control" readonly value="<?php echo $row['adult']?>"><br>
                            <label>Cin</label>
                            <input type="date" name="cin" class="form-control" readonly value="<?php echo $row['cin']?>" ><br>
                            <label>Cout</label>
                            <input type="date" name="cout" class="form-control" readonly value="<?php echo $row['cout']?>"><br>
                             <label>Number of Days</label>
                            <input type="text" name="cout" class="form-control" readonly value="<?php echo $row['nodays']?>"><br>
                             <label> Bill per day</label>
                            <input type="text" name="bill" class="form-control" readonly value="<?php echo $row['bill']?>"><br>
                            <label>Message to Guest!</label>
                            <textarea class="form-control" name="msg" rows="3" cols="20">
                              <?php echo "Welcome! ".$row['guest_name'].".  Room No ".$rm_id." Has Booked for You." ?>
                            </textarea><br>

                       
                        <center><input type="submit" name="confirm" id="butt" value="Confirm" class="btn"></center><br>
                            </div>
                             </form>
                           </div>
                       
                    </div>
                </div>
            </div>
            


</div>
</div>
</div>
</div>
</body>
</html>














            