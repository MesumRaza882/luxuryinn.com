<!DOCTYPE html>
<html>
<head>
    <title>DashBoard Admin</title>
    <style>
      body{background-image:linear-gradient(rgba(255,153,0,0.1),rgba(255,153,0,0.1))}
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
}
    </style>
</head>
<body>

<div class="row">
<?php
require('navbar.php');
$rm_id = $_GET['id'];
$rm_type = $_GET['otp'];
$curdate=date("Y/m/d");
?>
<div class="col-md-9" style="margin-left: 3%;">
<!--page-->
     <div id="page-wrapper">
            <div id="page-inner">

   <div class="row">
                    <div class="col-md-12"><br><br>
                       <h2 style="display: inline; background-color: rgba(0,31,51,0.6); padding: 1.5% 3%; color: white; margin-right: 1%; border-radius: 10px;">Now Book Room </h2>
                       <span style="color: gray; font-size: 18px;" class="animated fadeInRight"><?php echo  $curdate; ?></span>
                       <br><br><br>
                       <div class="row">
                           <div class="col-md-6">
                            <!--Form-->
                            <form action="savedatabook.php" onsubmit="return validation()" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                            <label>room no</label>
                            <input type="text" readonly name="rm" class="form-control input-lg" value="<?php echo $rm_id?>" ><br>
                            <label>room Type</label>
                            <input type="text" readonly name="rtp" class="form-control input-lg" value="<?php echo $rm_type?>"><br>
                             <label>Guest Email</label>
                            <input type="Email" name="mail" id="mail" class="form-control input-lg" required autocomplete="off">
                            <span id="usermail"  style="font-weight: bold; color: white; background-color: red; font-size: 13px;"></span><br>
                            <label>Guest Name</label>
                            <input type="text" name="gname" id="name" class="form-control input-lg" required autocomplete="off">
                            <span id="username"  style="font-weight: bold; color: white; background-color: red; font-size: 13px;"></span><br>
                            <label>Contact No</label>
                            <input type="phone" name="cn" id="phn" class="form-control input-lg" required autocomplete="off">
                            <span id="userphn"  style="font-weight: bold; color: white; background-color: red; font-size: 13px;"></span><br>
                            </div></div>
                            <div class="col-md-6">
                            <label>City</label>
                            <div class="form-group">
                        <select name="city" class="form-control input-lg" required>
                            <option selected disabled>Select City</option>
                            <option value="Multan">Multan</option>
                            <option value="Lahore">Lahore</option>
                        </select><br>
                      <data></data>
                        <label>Child</label>
                        
                        <select name="child" class="form-control input-lg" required>
                            <option selected disabled>No of Child</option>
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
                            <input type="date" name="cin" class="form-control input-lg"><br>
                            <label>Cout</label>
                            <input type="date" name="cout" class="form-control input-lg"><br>
                       </div>
                       <center> <input type="submit" id="but" name="save" value="Save" class="btn  btn-lg"></center>
                    
              </div>
                </form>
                             <!--End Form-->
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



<script>
    function validation(){
    var name = document.getElementById('name').value;
    var mail = document.getElementById('mail').value;
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










            