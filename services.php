<!DOCTYPE html>
<html>
<head>
	<title>Services</title>
    <style>
        body{background-image:linear-gradient(rgba(255,153,0,0.1),rgba(255,153,0,0.1))}
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

<div class="row">
<?php
require('navbar.php');
?>
<div class="col-md-9" style="margin-left: 5%;">
<!--page-->
	 <div id="page-wrapper">
            <div id="page-inner">


                <div class="row"><br>
                    <div class="col-md-6">
                        <h2 class="text-center" style="font-size: 25px;
                            background-color: rgba(0,31,51,0.6); padding: 1.5% 0; color: white; border-radius: 10px;
                            ">Services</h2>
                    </div>
                    <!--add cat-->
                    <div class="col-md-6">
                        <center>
                        <h3 class="text-info">Add Service</h3>
                        <a href="addservice.php" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i></a></center><br>
                    </div>
                        <?php
                        $conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
                    $qry = "SELECT * FROM services ORDER BY id ASC";
                    $result = mysqli_query($conn,$qry) or die("query failed");
                    if(mysqli_num_rows($result)>0){
                        ?>
                        <br>
                        
                    <table class="table table-bordered table-condensed" id="tab2">
                            <tr>
                                <th>Image</th>
                                <th>Service Title</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            <?php 
                        }
                            while($row=mysqli_fetch_assoc($result)){
                                ?>
                                <tr>
                                <td><img width="90" height="90" class="img-circle" src="<?php echo $row['image'];?>"></td>
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td>
                                    <a id="action"  href="serviceadd.php?id=<?php echo $row['id'];?>" style="color: #0099cc;">Edit</a><span style="font-size: 20px; font-weight: bold;">/</span><a id="action"



                                     href="deleteservice.php?didd=<?php echo $row['id'];?>" style="color: red;">Delete</a>
                                </td>                               
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>


</div>
</div>

</body>
</html>