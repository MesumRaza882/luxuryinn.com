<?php
	$conn = mysqli_connect("localhost","root","","hotel") or die("Connection Failed");
	$name =$_POST['name'];

	$message = $_POST['msg'];
    session_start();
    if(!isset($_SESSION["guest_email"])){
    if(!isset($_SESSION["guest_name"])){
        ?>
        <script>alert("You have to Login First!");
        window.location.href = "guest_login.php";
        </script>
        <?php
    }
}else{

					
					$email = $_SESSION['guest_email'];
					$qry = "select * from feedback where email = '$email'";
					$result = mysqli_query($conn,$qry) or die("query failed");
					if(mysqli_num_rows($result)>1){
					?>
					<script>
						alert("Already feedback has Recieved. Thank You!");
						window.location.href = "index.php";
					</script> 
					<?php
					}
					else{
						$qry2 = "INSERT INTO feedback VALUES('','$name','$email','$message','0')";
						$result1 = mysqli_query($conn,$qry2) or die("query failed2");
						?>
						<script>
						alert("feedback has Recieved. Thank You!");
						window.location.href = "index.php";
					</script> 
						<?php
					}
					}
				
				?>
				