<!DOCTYPE html>
<html>
<head>
	<title>Password</title>
    <style>
        body{background-image:linear-gradient(rgba(255,153,0,0.1),rgba(255,153,0,0.1))}
            #butt{
            border-radius: 5px;
            width: 150px;
            height: 40px;
            line-height: 25px;
            border:none;
    background-color:rgb(0,102,0,0.7);
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
?>
<div class="col-md-9">
<!--page-->
	 <div id="page-wrapper">
            <div id="page-inner">
                <!--password-->
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-6" style="margin-left: 5%;">

                    <form action="chngadm.php" method="post"  onsubmit="return validation()">
            <center><br>
            <h2 style="font-size: 25px;
                            background-color: rgba(0,31,51,0.6); padding: 1.5% 0; color: white; border-radius: 10px;
                            ">Change Password</h2><br>

            </center>
            <div class="form-group">
                <label>Enter Current Password</label>
                <input type="password" name="passwordold" class="form-control">
            </div>
            <div class="form-group">
                <label>Enter New Password</label>
                <input type="password" id="pass" name="passwordnew" class="form-control">
                <span id="userpass"  style="font-weight: bold; color: white; background-color: red; font-size: 13px;"></span><br>
            </div>
<center><input type="submit" class="btn" id="butt" value="Update"></center>
        </form>

             </div>
             <div class="col-md-3"></div>
        </div>
</div>
</div>

</body>
</html>
<script type="text/javascript">
        function validation(){
        
        var pass = document.getElementById('pass').value;

        //password
        if((pass.length <= 5) || (pass.length > 20)){
             document.getElementById('userpass').innerHTML = "** Password must be between 5 and 20.";
            return false;
        }
       
    
    }
    </script>