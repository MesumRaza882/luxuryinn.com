<!DOCTYPE html>
<html>
<head>
	<title>Admin Login Hotel MS</title>
	<link rel="stylesheet" href="bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap.min.js">
	<link rel="stylesheet" href="hover.css">
	<link rel="stylesheet" href="animate.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
	body{
		background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url(b.jpg);
        background-size: cover;
	}
    #notif{
        color: red; 
        font-size: 25px; 
        background-color: white; 
        padding: 10px 60px;
        box-sizing: border-box;
        border:1px solid red;
        border-radius: 5px;
        display: none;
    }
    .form-control{
    background: transparent;
    border-radius: 0px;
    border:0px;
    border-bottom: 1px solid white;
    color: orange;
    margin-top: 7px;
    padding:7px;

}
#form-container{
    border-radius: 10px;
    border: 1px solid white;
    box-shadow: 1px 1px  10px #ffffcc;


}
    .input-group-addon{
    background-color:transparent;
    color: white;
    border:none;
    
}
</style>
</head>
<body>
	<br><br><br><br><br>
<div class="row">
	<div class="col-md-1"></div>
	<!--Image-->
	
	<!--form -->
	<div class="col-md-5" id="form-container">
		<center>
	<br><h2 style="color: white;">Welcome Admin</h2><br>
	<form action="" method="post">
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			<input type="text" name="admin_email" required  class="form-control input-lg" placeholder="Enter Your E-mail">
		</div><br>
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-eye-open"></i></span>
			<input type="password" name="admin_password" class="form-control input-lg" placeholder="Enter password">
	</div><br><br>
	<input type="submit" name="login_btn" style="color: orange; font-weight: bold; width: 150px;" class="btn btn-lg " value="Submit" >
	</form><br><br>
	<span id="notif"></span><br><br>
</center>
	</div>
	<div class="col-md-2"></div>
</div>

<!--php-->
<?php
    session_start();
    if(isset($_POST["login_btn"]))
    {
        $conn = mysqli_connect("localhost","root","","hotel") or die("failed Connect");
        $email = $_POST["admin_email"];
        $pass = $_POST["admin_password"];
        $qry = "SELECT * FROM admin WHERE admin_email='$email'";
        $result = mysqli_query($conn,$qry) or die("query1 failed"); $result = mysqli_query($conn,$qry) or die("query1 failed");
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){

                if($row['admin_email'] == $email){
                            if($row['admin_password'] == $pass){
                                $_SESSION['admin_name'] = $row['admin_name'];
                                $_SESSION['admin_email'] = $row['admin_email'];
                                $_SESSION['admin_pic'] = $row['admin_pic'];
                                header("location:admin_dashboard.php");

                            }
                            else{
                                ?>
                                <script>
                                document.getElementById('notif').innerHTML = "Password Not Matched";
                                 document.getElementById('notif').style.display = "block";
                                </script>
                                <?php
                            }
                        }

                    }
                }
                else{
                    ?>
                        <script>
                            document.getElementById('notif').innerHTML = "Record Not Found";
                             document.getElementById('notif').style.display = "block";
                         </script>
                    <?php
                }
                    }
                    ?>

</body>
</html>


