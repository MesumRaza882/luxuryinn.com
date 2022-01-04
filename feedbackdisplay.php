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
            #table-con{
                height: 515px;
                overflow: scroll;
            }
    </style>
</head>
<body>
<?php 
$conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
$qry1 = "UPDATE feedback SET status='1' WHERE status ='0'";
$result1 = mysqli_query($conn,$qry1) or die("query failed");                    
?>
<div class="row">
<?php
require('navbar.php');
?>
<div class="col-md-9" style="margin-left: 5%;">
<!--page-->
	 <div id="page-wrapper">
            <div id="page-inner">
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="text-center"  style="font-size: 25px;
                            background-color: rgba(0,31,51,0.6); padding: 1.5% 0; color: white; border-radius: 10px;
                            ">Feedback</h2>
                    </div>
                    <div class="col-md-6"></div>
                </div>
                    <!--disply-->
                        <?php
                    $conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
                    $qry = "SELECT * FROM feedback ORDER BY id DESC";
                    $result = mysqli_query($conn,$qry) or die("query failed");
                    if(mysqli_num_rows($result)>0){
                        ?>
                        <br>
                        <div class="table-responsive" id="table-con">
                    <table class="table table-bordered table-condensed" id="tab2">
                            <tr>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Feedback</th>
                                <th>Action</th>
                            </tr>
                            <?php 
                        }
                            while($row=mysqli_fetch_assoc($result)){
                                ?>
                                <tr>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['message']; ?></td>
                                <td>
                                    <a id="action"
                                     href="delfeedback.php?didd=<?php echo $row['id'];?>" style="color: red;"><i class="glyphicon glyphicon-remove"></i></a>
                                </td>                               
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                    </div>
                </div>


</div>
</div>

</body>
</html>