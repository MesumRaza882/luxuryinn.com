<!DOCTYPE html>
<html>
<?php
include('db.php');
$conn = mysqli_connect("localhost","root","","hotel") or die("Connection Failed");
    session_start();
    if(!isset($_SESSION["guest_email"])){
    if(!isset($_SESSION["guest_name"])){
    if(!isset($_SESSION['guest_contact'])){
        ?>
        <script>alert("You have to Login First!");
        window.location.href = "guest_login.php";
        </script>
        <?php
    }
}
}
?>
<head>
	<title>Booking Request</title>
    <style>
         #but{
      border-radius: 10px;
      width: 130px;
      border:none;
  background-color:rgb(0,31,51,0.5);
  color: white;
}
#but:hover{
  background-color: rgba(0,31,51,1);
  color:#ff9900; 
  border-top-right-radius: 25px;
  border-bottom-left-radius: 25px;
  transition: 0.3s ease;
    </style>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap.min.js">
    <link rel="stylesheet" href="hover.css">
    <link rel="stylesheet" href="animate.css">
    
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Resort Inn Responsive , Smartphone Compatible web template , Samsung, LG, Sony Ericsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen">
<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
<link rel="stylesheet" href="css/jquery-ui.css" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/modernizr-2.6.2.min.js"></script>
<!--fonts-->
<link href="//fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Federo" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
<!--//fonts-->
</head>
<body>
<?php
$rm_id = $_GET['id'];
$rm_type = $_GET['otp'];
$curdate=date("Y/m/d");
?>
<div class="row">

<div class="col-md-12">
<!--page-->

<div class="w3_navigation">
        <div class="container">
            <nav class="navbar navbar-default">
                <div class="navbar-header navbar-left">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <h1><a class="navbar-brand" href="index.php">LUXUTY <span>INN</span><p class="logo_w3l_agile_caption">Your Dreamy Resort</p></a></h1>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                
            </nav>

        </div>
    </div>
</div></div><br>
                <div class="row" style="margin-left: 2%;">
                    <div class="col-md-12"><br><br>
                       <h2 style="display: inline; background-color: rgba(0,31,51,0.6); padding: 1.5% 3%; color: white; margin-right: 1%; border-radius: 10px;">Now Send Book Request </h2>
                       <span style="color: gray; font-size: 18px;" class="animated fadeInRight"><?php echo  $curdate; ?></span>
                       <br><br><br>
           <!--work--></div>
                       <div class="row">
                        <div class="col-md-1"></div>
                           <div class="col-md-5">
                        
                        <form action="userbookcode.php" onsubmit="return validation()" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                            <label>room no</label>
                            <input type="text" readonly name="rm" class="form-control input-lg" value="<?php echo $rm_id?>"><br>
                            <label>room Type</label>
                            <input type="text" readonly name="rtp" class="form-control input-lg" value="<?php echo $rm_type?>"><br>
                             <label>Guest Email</label>
                            <input type="text" required readonly name="mail" class="form-control input-lg" value="<?php echo $_SESSION['guest_email'];?>"><br>
                            <label>Guest Name</label>
                            <input type="text" name="gname" id="name" class="form-control input-lg" value="<?php echo $_SESSION['guest_name'];?>">
                             <span id="username"  style="font-weight: bold; color: white; background-color: red; font-size: 13px;"></span><br>
                            <label>Contact Number</label>
                            <input type="text" name="cn" id="phn" class="form-control input-lg" value="<?php echo $_SESSION['guest_contact'];?>">
                             <span id="userphn"  style="font-weight: bold; color: white; background-color: red; font-size: 13px;"></span><br>
                            
                            <label>City</label>
                        <select name="city" class="form-control input-lg" required>
                            <option selected disabled>Select City</option>
                            <option value="Multan">Multan</option>
                            <option value="Lahore">Lahore</option>
                            <option value="Layyah">Layyah</option>
                            <option value="Sialcot">Sialcot</option>
                            <option value="Islamabad">Islamabad</option>
                            <option value="Muree">Muree</option>
                            <option value="Karachi">Karachi</option>
                            <option value="Kot Addu">Kot Addu</option>
                            <option value="Muzafar Garh">Muzafar Garh</option>
                            <option value="DG Khan">DG Khan</option>
                            <option value="Tonsa Shareef">Tonsa Shareef</option>
                            <option value="Khanewal">Khanewal</option>
                            <option value="Gujranwala">Gujranwala</option>
                            <option value="Faislabad">Faislabad</option>
                            <option value="Pishawar">Pishawar</option>

                        </select><br>
                    </div></div>
                    <div class="col-md-5">
                      <data></data>
                        <label>Child</label>
                        <div class="form-group">
                        <select name="child" class="form-control input-lg" required>
                            <option selected disabled>No of Child</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select><br>
                         <label>Adult</label>
                        <select name="adult" class="form-control input-lg" required>
                            <option selected disabled>No of Adult</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select><br>
                            <label>Cin</label>
                            <input type="date" name="cin" class="form-control input-lg" required><br>
                            <label>Cout</label>
                            <input type="date" name="cout" class="form-control input-lg" required><br>
                       </div>
                       <center> <input type="submit" id="but" name="save" value="Save" class="btn  btn-lg"></center>
                    
              </div>
                </form>
                             <!--End Form-->
                        </div>
                    
                    
                </div>
                <script>
    function validation(){
    var name = document.getElementById('name').value;
    var phn = document.getElementById('phn').value;
   
   if(!isNaN(name)){
      document.getElementById('username').innerHTML = "** Only Characters are allowed. ";
      return false;
    }

    if((name.length <= 2) || (name.length > 20)){
       document.getElementById('username').innerHTML = "** Name must be between 3 and 20.";
      return false;
      
    }
    if(isNaN(phn)){
      document.getElementById('userphn').innerHTML = "** Characters are not allowed. ";
      return false;
    }
    if(phn.length!=11){
      document.getElementById('userphn').innerHTML = "** Mobile Number must be 11 digits only. ";
      return false;
    }

  }

</script>
