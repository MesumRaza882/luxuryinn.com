<!DOCTYPE html>
<html>
<head>
        

	<title>DashBoard Admin</title>
</head>
<style type="text/css">
        body{background-image:linear-gradient(rgba(255,153,0,0.1),rgba(255,153,0,0.1))}
            #butt{
            border-radius: 5px;
            width: 150px;
            height: 40px;
            line-height: 25px;
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
</style>
<body>

<div class="row">
<?php
require('navbar.php');
?>
<div class="col-md-9" style="margin-left: 2%;">
<!--page-->
	 <div id="page-wrapper">
            <div id="page-inner">
                <br><br>
                <div class="row">
                    <div class="col-md-12">
                       <h2 style="font-size: 25px; text-align: center;
                            background-color: rgba(0,31,51,0.6); padding: 1.5% 0; color: white; border-radius: 10px;
                            ">Admin's Detail</h2><br>
                        <?php
                        $conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
                    $qry = "SELECT * FROM admin  ORDER BY admin_id ASC";
                    $result = mysqli_query($conn,$qry) or die("query failed");
                    if(mysqli_num_rows($result)>0){
                        ?>
                        <table class="table table-bordered table-condensed" id="tab2">
                            <tr>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Picture</th>
                                <th>Action</th>
                            </tr>
                            <?php 
                        }
                            while($row=mysqli_fetch_assoc($result)){
                                ?>
                        <tr>
                                
                                <td><?php echo $row['admin_name']; ?></td>
                                <td><?php echo $row['admin_email']; ?></td>
                                <td><img width="50" height="50" src="<?php echo $row['admin_pic'];?>"></td>
                                <td>
                                    <a id="action"
                                     href="deleteuser.php?did=<?php echo $row['admin_id'];?>" style="color: red;"><b>Delete</b></a>
                                    
                                   
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