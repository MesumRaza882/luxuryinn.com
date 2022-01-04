
<!DOCTYPE html>
<html lang="en">
<head>
<script>
function myfun(){
	var mybox=document.getElementById("btn1");
	mybox.style.background

}
</script>
<title>MESUM HOTEL</title>
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
<style type="text/css">
	.count{
		
		border-radius: 50px;
		position: relative;
		top: -10px;
		left: -15px;
	}
	#btn1{background-color:red;}
</style>
<!--//fonts-->
</head>
<body>
<!-- header -->

<div class="banner-top">
	<?php
	$conn = mysqli_connect("localhost","root","","hotel") or die("Connection Failed");
    session_start();
    if(isset($_SESSION["guest_email"])){
    if(isset($_SESSION["guest_name"])){
        ?>
        <?php 
        $to = $_SESSION["guest_email"];
        $conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
						$qry = "SELECT count(id) AS total FROM message WHERE email = '$to' and status = '0' ";
						$result = mysqli_query($conn,$qry) or die("query failed");
						$values = mysqli_fetch_assoc($result);
						$num_rows = $values['total'];

        ?>
		 
			<div class="social-bnr-agileits">
				<ul class="social-icons3">
					<li style="margin-left: 5px; font-size: 20px; text-transform: capitalize;">
					<?php echo $_SESSION['guest_name'];?></li>
								
								
							</ul>
			</div>
			<div class="contact-bnr-w3-agile">
			<ul>

				
					
        <li><a href="alertmsg.php" onclick="myfun()" >
		<i class="glyphicon glyphicon-bell" aria-hidden="true"></i>
		<span class="badge badge-danger count"  id="btn1" 
		style="<?php if($num_rows>0){echo "background-color: red;";}
		else{echo "background-color: gray;";}?>"><?php  if($num_rows>0){echo $num_rows;} else {echo "";} ?></span>
					</a>
				
	</li>
		
				
					<li><a href="chnguserpass.php">Change password</a></li>
					<li><a href="logout_user.php"><i class="glyphicon glyphicon-log-out"></i>Logout</a></li>

	
					<li><a href="reserved.php"><i class="glyphicon glyphicon-bookmark"></i>Reserved Room</a></li>
					
        <?php
    
    }
}

					?>
					
				

				</ul>
			
			</div>
			<div class="clearfix"></div>
		</div>
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
					<h1><a class="navbar-brand" href="index.php">LUXURY INN</a></h1>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
					<nav class="menu menu--iris">
						<ul class="nav navbar-nav menu__list">
							<li class="menu__item menu__item--current"><a href="" class="menu__link">Home</a></li>
							<li class="menu__item"><a href="#about" class="menu__link scroll">About Us</a></li>
							<li class="menu__item"><a href="#services" class="menu__link scroll">Services</a></li>
							<li class="menu__item"><a href="#gallery" class="menu__link scroll">Gallery</a></li>
							<li class="menu__item"><a href="#rooms" class="menu__link scroll">Rooms</a></li>
							<li class="menu__item"><a href="#contact" class="menu__link scroll">FeedBack</a></li>
							
						</ul>
					</nav>
				</div>
			</nav>

		</div>
	</div>
<!-- //header -->
		<!-- banner slider-->
	<div id="home" class="w3ls-banner">
		<!-- banner-text -->
		<div class="slider">
			<div class="callbacks_container">
				<ul class="rslides callbacks callbacks1" id="slider4">
					
					<li>
						<div class="w3layouts-banner-top w3layouts-banner-top1">
							<div class="container">
								<div class="agileits-banner-info">
								<h4>LUXURY INN</h4>
									<h3>Stay with friends & families</h3>
										<p>Come & enjoy precious moment with us</p>
									<div class="agileits_w3layouts_more menu__item">
				<a href="#" class="menu__link" data-toggle="modal" data-target="#myModal">Learn More</a>
			</div>
								</div>	
							</div>
						</div>
					</li>
					<li>
						<div class="w3layouts-banner-top w3layouts-banner-top2">
							<div class="container">
								<div class="agileits-banner-info">
								<h4>LUXURY INN</h4>
								<h3>want luxurious vacation?</h3>
										<p>Get accommodation today</p>
									<div class="agileits_w3layouts_more menu__item">
											<a href="#" class="menu__link" data-toggle="modal" data-target="#myModal">Learn More</a>
										</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
			<div class="clearfix"> </div>
			<!--banner Slider starts Here-->
		</div>
		    <div class="thim-click-to-bottom">
				<a href="#about" class="scroll">
					<i class="fa fa-long-arrow-down" aria-hidden="true"></i>
				</a>
			</div>
	</div>	
<!--//Header-->
<!-- //Modal1 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
						<!-- Modal1 -->
							<div class="modal-dialog">
							<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4>LUXURY  <span>INN</span></h4>
										<img src="images/1.jpg" alt=" " class="img-responsive">
										<h5>We know what you love</h5>
										<p>Providing guests unique and enchanting views from their rooms with its exceptional amenities, makes Star Hotel one of bests in its kind.Try our food menu, awesome services and friendly staff while you are here.</p>
									</div>
								</div>
							</div>
						</div>
<!-- //Modal1 -->
<div id="availability-agileits">
<div class="col-md-12 book-form-left-w3layouts">
	<a href="#rooms"><h2>ROOM RESERVATION</h2></a>
</div>

			<div class="clearfix"> </div>
</div>
<!-- banner-bottom -->
	<div class="banner-bottom">
		<div class="container">	
			<div class="agileits_banner_bottom">
				<h3><span>Experience a good stay.</span> Find our friendly welcoming reception</h3>
			</div>
			<div class="w3ls_banner_bottom_grids">
				<ul class="cbp-ig-grid">
					<li>
						<div class="w3_grid_effect">
							<span class="cbp-ig-icon w3_road"></span>
							<h4 class="cbp-ig-title">Comfortable BEDROOMS</h4>
							<span class="cbp-ig-category">LUXURY-INN HOTEL</span>
						</div>
					</li>
					<li>
						<div class="w3_grid_effect">
							<span class="cbp-ig-icon w3_cube"></span>
							<h4 class="cbp-ig-title">SEA VIEW BALCONY</h4>
							<span class="cbp-ig-category">LUXURY-INN HOTEL</span>
						</div>
					</li>
					<li>
						<div class="w3_grid_effect">
							<span class="cbp-ig-icon w3_users"></span>
							<h4 class="cbp-ig-title">LARGE CAFE</h4>
							<span class="cbp-ig-category">LUXURY-INN HOTEL</span>
						</div>
					</li>
					<li>
						<div class="w3_grid_effect">
							<span class="cbp-ig-icon w3_ticket"></span>
							<h4 class="cbp-ig-title">WIFI Availabe</h4>
							<span class="cbp-ig-category">LUXURY-INN HOTEL</span>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
<!-- //banner-bottom -->
<!-- /about -->
 	<div class="about-wthree" id="about">
		  <div class="container">
				   <div class="ab-w3l-spa">
                            <h3 class="title-w3-agileits title-black-wthree">About Our LUXURY-INN HOTEL</h3> 
						   <p class="about-para-w3ls">The hotel offers a variety of services with main target of fullfiling our guests needs. Whether you visit LUXURY INN Hotel for business or pleasure, you will find the ideal environment to treat yourselves with all our comfort and services</p>
						   <img src="images/about.jpg" class="img-responsive" alt="Hair Salon">
										<div class="w3l-slider-img">
											<img src="images/a1.jpg" class="img-responsive" alt="Hair Salon">
										</div>
                                       <div class="w3ls-info-about">
										    <h4>You'll love all the amenities we offer!</h4>
											<p>Reception service: the reception service is provided for 24 hours, but in two foreign languages ​​for at least 16 hours a day. Luggage delivery: at the request of the guest by the hotel staff. </p>
										</div>
		          </div>
		   	<div class="clearfix"> </div>
    </div>
</div>
<br><br><br><br>
 	<!-- //about -->
<!--sevices-->
<div class="advantages" id="services">
	<div class="container">
		<div class="advantages-main">
				<h3 class="title-w3-agileits">Our Services</h3>
		   <div class="advantage-bottom">
		    <?php
                    $conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
                    $qry = "SELECT * FROM services where id = '3' ";
                    $result = mysqli_query($conn,$qry) or die("query failed");
						 while($row=mysqli_fetch_assoc($result)){
                        ?>
			 <div class="col-md-6 advantage-grid left-w3ls wow bounceInLeft" data-wow-delay="0.3s">
			 	<div class="advantage-block ">
					<img width="90" height="90" class="img-circle" src="<?php echo $row['image'];?>">
					
			 		<h4><?php echo $row['title']; ?> </h4>
			 		<p><?php echo $row['description']; ?></p>
					 <?php  }    ?>
			 		
			 	</div>
			 </div>
			  <?php
                    $conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
                    $qry = "SELECT * FROM services where id = '4' ";
                    $result = mysqli_query($conn,$qry) or die("query failed");
						 while($row=mysqli_fetch_assoc($result)){
                        ?>
			 <div class="col-md-6 advantage-grid right-w3ls wow zoomIn" data-wow-delay="0.3s">
			 	<div class="advantage-block">
					 <img width="90" height="90" class="img-circle" src="<?php echo $row['image'];?>">
			 					 		<h4><?php echo $row['title']; ?> </h4>
			 		<p><?php echo $row['description']; ?></p>
					 <?php  }    ?>
			 	</div>
			 </div>
			 
			<div class="clearfix"> </div>
			</div>
		</div>
	</div>
</div>
<br><br>
<!-- Gallery --><br>
<section class="portfolio-w3ls" id="gallery">
		 <h3 class="title-w3-agileits title-black-wthree">Gallery</h3>
				<div class="col-md-3 gallery-grid gallery1">
					<a href="images/g1.jpg" class="swipebox"><img src="images/g1.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>LUXURY INN HOTEL</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>
				</div>
				<div class="col-md-3 gallery-grid gallery1">
					<a href="images/g2.jpg" class="swipebox"><img src="images/g2.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>LUXURY INN HOTEL</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>
				</div>
				<div class="col-md-3 gallery-grid gallery1">
					<a href="images/g3.jpg" class="swipebox"><img src="images/g3.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>LUXURY INN HOTEL</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>
				</div>
				<div class="col-md-3 gallery-grid gallery1">
					<a href="images/g4.jpg" class="swipebox"><img src="images/g4.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>LUXURY INN HOTEL</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>
				</div>
				<div class="col-md-3 gallery-grid gallery1">
					<a href="images/g5.jpg" class="swipebox"><img src="images/g5.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>LUXURY INN HOTEL</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
					</a>
				</div>
				<div class="col-md-3 gallery-grid gallery1">
					<a href="images/g6.jpg" class="swipebox"><img src="images/g6.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>LUXURY INN HOTEL</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
					   </div>
				   </a>
				</div>
				<div class="col-md-3 gallery-grid gallery1">
					<a href="images/g6.jpg" class="swipebox"><img src="images/g7.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>LUXURY INN HOTEL</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
					   </div>
				   </a>
				</div>
				<div class="col-md-3 gallery-grid gallery1">
					<a href="images/g6.jpg" class="swipebox"><img src="images/g8.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>LUXURY INN HOTEL</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
					   </div>
				   </a>
				</div>
					<div class="col-md-3 gallery-grid gallery1">
					<a href="images/g9.jpg" class="swipebox"><img src="images/g9.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>LUXURY INN HOTEL</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>
				</div>
				<div class="col-md-3 gallery-grid gallery1">
					<a href="images/g10.jpg" class="swipebox"><img src="images/g10.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>LUXURY INN HOTEL</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>
				</div>
				<div class="col-md-3 gallery-grid gallery1">
					<a href="images/g4.jpg" class="swipebox"><img src="images/g4.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>LUXURY INN HOTEL</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>
				</div>
				<div class="col-md-3 gallery-grid gallery1">
					<a href="images/g2.jpg" class="swipebox"><img src="images/g2.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>LUXURY INN HOTEL</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>
				</div>
				<div class="clearfix"> </div>
</section>
<!-- //gallery -->
	 <!-- rooms & rates -->
      <div class="plans-section" id="rooms">
				 <div class="container">
				 <h3 class="title-w3-agileits title-black-wthree">Rooms and Rates</h3>
					 <div class="row">
                <!--rOOM tYPES coding-->
                <?php
                $type = "";
                $num_rows = "";
                $available_rows = "";
                $booked_rows = "";
                $conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
                    $qry2 = "SELECT * FROM room_type";
                    $result = mysqli_query($conn,$qry2) or die("query failed");
                    if(mysqli_num_rows($result)>0){
                        while($row=mysqli_fetch_assoc($result)){
                            $type = $row["type"];
                        ?>
                    <div class="col-md-3">
                        <div class="panel panel-primary" id="pnl">
                            <div class="panel-heading">
                                <h3 class="text-center"><?php echo $type;

                     $qry1 = "SELECT count(room_id) AS available FROM room INNER JOIN room_type ON room.type_id=room_type.type_id INNER JOIN rent ON room.rent_id = rent.rent_id WHERE type='$type' and status_id = '0' and f_status_id = '0' ";
                        $result1 = mysqli_query($conn,$qry1) or die("query failed");
                        $values = mysqli_fetch_assoc($result1);
                        $available_rows = $values['available'];

                        $qry3 = "SELECT count(room_id) AS booked FROM room INNER JOIN room_type ON room.type_id=room_type.type_id WHERE type='$type' and status_id = '1' ";
                        $result3 = mysqli_query($conn,$qry3) or die("query failed Book");
                        $values = mysqli_fetch_assoc($result3);
                        $booked_rows = $values['booked'];

                               $qry2 = "SELECT count(room_id) AS total1 FROM room INNER JOIN room_type ON room.type_id=room_type.type_id INNER JOIN status ON room.status_id=status.status_id INNER JOIN rent ON room.rent_id = rent.rent_id WHERE type='$type'";
                        $result2 = mysqli_query($conn,$qry2) or die("query failed");
                        $values = mysqli_fetch_assoc($result2);
                        $num_rows = $values['total1'];

                        echo "<h4>Total Rooms: $num_rows<h4>";
                                ?></h3>
                            </div>
                            <div class="panel-body" style="background-image:url(images/2.jpg);
							background-size:cover;
							background-repeat:no-repeat;
						
							
							;">
                                <h4  style=" color:white; font-weight: bold; font-family: cursive;">Available Rooms:<?php
                                echo $available_rows;?></h4>
                                <h4 style="letter-spacing:1px; color: orange; font-weight: bold; font-family: cursive;">Booked Rooms:<?php
                                echo $booked_rows;?></h4>
                            </div>
                            <div class="panel-footer">
                              <center>  <a href="opentypeuser.php?otype=<?php echo $type;?>" class="btn <?php if($available_rows == '0'){
                                ?>
                                btn-danger  
                                <?php  } else {?>
                                    btn-info
                                    <?php } ?>

                                    <?php if(!$available_rows == '0' ){echo "active";}
                                    else{echo "disabled";} 

                                    ?>


                                    "><?php if(!$available_rows == '0'){
                                    	echo "Click For Booking";
                                    }else{
                                    	echo "Booking Full";
                                    }

                                     ?></a>
                              </center>
                            </div>
                        </div>
                    </div>

                <?php } } ?>
                </div>

		
				<div class="clearfix"> </div>
			</div>		<div class="price-gd-top">
				
		</div>
	</div>
	 <!--// rooms & rates -->
  <!-- visitors 
	<div class="w3l-visitors-agile" >
		<div class="container">
                 <h3 class="title-w3-agileits title-black-wthree">What other visitors experienced</h3> 
<!-- contact -->
<section class="contact-w3ls" id="contact">
	<div class="container">
		<div class="col-lg-6 col-md-6 col-sm-6 contact-w3-agile2" data-aos="flip-left">
			<div class="contact-agileits">
				<h4>Feedback </h4>
				
				<form  method="post" name="sentMessage" action="fedbackadd.php" id="contactForm" >
					<div class="control-group form-group">
                        
                            <label class="contact-p1">Enter Your Name</label>
                            <input type="text" class="form-control" name="name" id="name"  required >
                            <p class="help-block"></p>
                       
                    </div>	
                    <div class="control-group form-group">
                        
                            
                            <input type="hidden" class="form-control" name="email" id="email" required >
							<p class="help-block"></p>
						
                    </div>
                     <div class="control-group form-group">
                        
                            <label class="contact-p1">Your Feedback</label>
                           <textarea class="form-control" id="name"  name="msg" rows="3" cols="20" required></textarea><br>
                    </div>
                    
                   <center> <input type="submit" name="sub" value="Send Now" class="btn btn-primary"></center>	
				</form>
				
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 contact-w3-agile1" data-aos="flip-right">
			<h4>Connect With Us</h4>
			<p class="contact-agile1"><strong>Phone :</strong>+92 308-81-63-184</p>
			<p class="contact-agile1"><strong>Email :</strong> <a href="mailto:rmesum786@gmail.com">RMESUM786@gmail.com</a></p>
			<p class="contact-agile1"><strong>Address :</strong> Abdali Road Multan.</p>
																
			<div class="social-bnr-agileits footer-icons-agileinfo">
				<ul class="social-icons3">
								<li><a href="#" class="fa fa-facebook icon-border facebook"> </a></li>
								<li><a href="#" class="fa fa-twitter icon-border twitter"> </a></li>
								<li><a href="#" class="fa fa-google-plus icon-border googleplus"> </a></li> 
								
							</ul>
			</div>
		
		</div>
		<div class="clearfix"></div>
	</div>
</section>
<!-- /contact -->
			<div class="copy">
		        <p>© 2021 LUXURY INN HOTEL . All Rights Reserved | Design by <a href="index.php">LUXURY INN</a> </p>
		    </div>
<!--/footer -->
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- contact form -->
<script src="js/jqBootstrapValidation.js"></script>

<!-- /contact form -->	
<!-- Calendar -->
		<script src="js/jquery-ui.js"></script>
		<script>
				$(function() {
				$( "#datepicker,#datepicker1,#datepicker2,#datepicker3" ).datepicker();
				});
		</script>
<!-- //Calendar -->
<!-- gallery popup -->
<link rel="stylesheet" href="css/swipebox.css">
				<script src="js/jquery.swipebox.min.js"></script> 
					<script type="text/javascript">
						jQuery(function($) {
							$(".swipebox").swipebox();
						});
					</script>
<!-- //gallery popup -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<!-- flexSlider -->
				<script defer src="js/jquery.flexslider.js"></script>
				<script type="text/javascript">
				$(window).load(function(){
				  $('.flexslider').flexslider({
					animation: "slide",
					start: function(slider){
					  $('body').removeClass('loading');
					}
				  });
				});
			  </script>
			<!-- //flexSlider -->
<script src="js/responsiveslides.min.js"></script>
			<script>
						// You can also use "$(window).load(function() {"
						$(function () {
						  // Slideshow 4
						  $("#slider4").responsiveSlides({
							auto: true,
							pager:true,
							nav:false,
							speed: 500,
							namespace: "callbacks",
							before: function () {
							  $('.events').append("<li>before event fired.</li>");
							},
							after: function () {
							  $('.events').append("<li>after event fired.</li>");
							}
						  });
					
						});
			</script>
		<!--search-bar-->
		<script src="js/main.js"></script>	
<!--//search-bar-->
<!--tabs-->
<script src="js/easy-responsive-tabs.js"></script>
<script>
$(document).ready(function () {
$('#horizontalTab').easyResponsiveTabs({
type: 'default', //Types: default, vertical, accordion           
width: 'auto', //auto or any width like 600px
fit: true,   // 100% fit in a container
closed: 'accordion', // Start closed if in accordion view
activate: function(event) { // Callback function if tab is switched
var $tab = $(this);
var $info = $('#tabInfo');
var $name = $('span', $info);
$name.text($tab.text());
$info.show();
}
});
$('#verticalTab').easyResponsiveTabs({
type: 'vertical',
width: 'auto',
fit: true
});
});
</script>
<!--//tabs-->
<!-- smooth scrolling -->
	<script type="text/javascript">
		$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/								
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	
	<div class="arr-w3ls">
	<a href="#home" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	</div>
<!-- //smooth scrolling -->
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
</body>
</html>


