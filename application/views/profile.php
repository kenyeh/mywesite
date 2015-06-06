<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html>
<head>
	<title>Resume Website</title>
	<script src="resource/js/jquery.min.js"> </script>
	<link href="resource/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<link href="resource/css/profile/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!---- start-smoth-scrolling---->
		<script type="text/javascript" src="resource/js/move-top.js"></script>
		<script type="text/javascript" src="resource/js/easing.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>
 	<!---- start-smoth-scrolling---->
</head>
<body>
<!------headerbg starts--------->
 <div id="top-top" class="headerbg">
 <div id="top-top-top" class="headerbgfilter">
	 <!------header starts--------->
	   <div class="header">
		 <!------container starts--------->
			  <div class="container">
				   <div class="logo">
						<a href="#">Resume</a>
				   </div>
				  <!------Navigation starts--------->
				  <div class="nav">
					 <ul>
						 <li><a class="scroll" href="#about">ABOUT</a></li>
						 <li><a class="scroll" href="#skills">SKILLS</a></li>
						 <li><a class="scroll" href="#port">PORTFOLIO</a></li>
						 <li><a class="scroll" href="#contact">CONTACT</a></li>
					 </ul>
				 </div>
				  <!------Navigation ends-------->
					<div class="clear"></div>
			  </div>
		 <!------container ends--------->
	   </div>
	 <!------header ends--------->
	 <!------Banner starts--------->
	   <div class="banner">
	      <div class="container">
		     <div class="banner-info">
			      <div class="bannerhead">
				      <h1>I'm <span>Ken Yeh</span></h1>
				      <h3>Web Programmer</h3>
				      <p></p>
					  <a class="downarrow scroll" href="#about"><span> </span></a>
			      </div>
			 </div>
			 <div class="clear"></div>
		  </div>
	  </div>
	  <!------Banner ends-------->
  </div>
 </div>
 <!------Headerbg ends-------->
 <!------Content starts--------->
 <div class="content">
	 <!------About starts--------->
	   <div id="about" class="about">
		 <div class="container">
			   <div class="header-section text-center">
				  <h2><span> </span>ABOUT<span> </span></h2>
				  </div>
				 <span><p>resume</p></span>
				
			  <div class="years">	 		
				 <h4><b>2012</b></h4>
				 <span><h4>Web programmer</h4></span>
				 <p><i>Client-side coding,Server-side coding,Database technology</i></p>
			  </div> 
					
			   <div class="years">	 	
				 <h4><b>2013</b></h4>
				 <span><h4>Web programmer</h4></span>
				 <div class="labs">
					 <p><i>Client-side coding,Server-side coding,Database technology.</i></p>
			     </div>
			  </div>
				 <a class="arrow scroll" href="#skills"><span> </span></a>
		  </div>
	  </div>
	 <!------About Ends--------->
	 
	<!------SKILLS Starts--------->
	  <div id="skills" class="skills">
	  <div class="container">
	     <div class="skills-grids">
			  <div class="skill-section text-center">
				  <h2><span> </span>SKILLS<span> </span></h2>
			  </div>
					  <div class="services_grids">
						  <div id="canvas">
								<div class="skill-grids text-center">
										<div class="col-md-3">	
											<div class="skill-grid">
												<div class="circle" id="circles-1"></div>									
												 <h3>MySql</h3>	
											 </div>								  
										</div>
										<div class="col-md-3">	
											<div class="skill-grid">
												<div class="circle" id="circles-2"></div>									
												 <h3>AJAX</h3>	
											 </div>								  
										</div>
										<div class="col-md-3">	
											<div class="skill-grid">
												<div class="circle" id="circles-3"></div>									
												 <h3>PHP</h3>	
											 </div>								  
										</div>
										<div class="col-md-3">	
											<div class="skill-grid">
												<div class="circle" id="circles-4"></div>									
												 <h3>JAVASCRIPT</h3>	
											 </div>								  
										</div>
										<div class="clearfix"> </div>
								  </div>
						   </div>
					  </div>
					<!---->
					 <script type="text/javascript" src="resource/js/circles.js"></script>
								 <script>
									var colors = [
											['#ffffff', '#99CCFF'], ['#ffffff', '#99CCFF'], ['#ffffff', '#99CCFF'], ['#ffffff', '#99CCFF']
										];
									var pre=[0,3,2,3,4];
									for (var i = 1; i <= 4; i++) {
										var child = document.getElementById('circles-' + i);
										var	percentage = 50 + (pre[i] * 10);
											
										Circles.create({
											id:         child.id,
											percentage: percentage,
											radius:     80,
											width:      15,
											number:   	percentage / 10,
											text:       '%',
											colors:     colors[i - 1]
										});
									}
							
					</script>
					
					<!--/-->
			 </div>
		 </div>
		   <a class="down scroll" href="#port"><span> </span></a>
	  </div>
	  </div>
	 <!------SKILLS Ends--------->
		 <!------PORTFOLIO Starts--------->
		 <div id="port" class="Portfolio">
			  <div class="Portfolio-section text-center">
			      <h2><span> </span>PORTFOLIO<span> </span></h2>
			  </div>
			  <div class="container">
				  <div class="portfolio-grids">
					  <div class="portfolio-grid col-md-4 col-md-offset-4">
						 <a href="blog"><img src="resource/images/profile/m-blog.png"></a>
						  <p>Blog</p>
						  <a class="rightarrow" href="blog"><span> </span></a>
					  </div>
					  <!--
					  <div class="portfolio-grid col-md-4">
						  <a href="#"><img src="resource/images/profile/monitr2.png"></a>
						  <p>Proin gravida nibh vel velit auctor aliquet.
							 Aenean sollicitudin, lorem quis bibendum</p>
						  <a class="rightarrow" href="#"><span> </span></a>
					  </div>
					  <div class="portfolio-grid col-md-4">
						  <a href="#"><img src="resource/images/profile/monitr3.png"></a>
						  <p>Proin gravida nibh vel velit auctor aliquet.
							 Aenean sollicitudin, lorem quis bibendum</p>
						  <a class="rightarrow" href="#"><span> </span></a>
					  </div>
					  -->
					  <div class="clear"> </div>
				  </div>
				  <a class="portdown scroll" href="#contact"><span> </span></a>
				  
			  </div>
		 </div>
  </div>
  <!------Content Ends-------->
  
  <!------FOOTER Starts----------->
  <div  id="contact" class="footer">
      <div class="container">
	  
		   <div class="contact-section text-center">
			  <h2><span> </span>CONTACT<span> </span></h2>
		  </div>
		 <div class="row">
		 
			 <div class="col-md-6">
				  <div class="footer-left">
						<div class="social-icons">
						   <a href="#"><img src="resource/images/profile/in.png"></a>
						   <a href="#"><img src="resource/images/profile/fb.png"></a>
					   </div>
					   <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem
					   quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh
					   id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.
					   Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a
					   ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit.</p>
				  </div>
			 </div>
			  
			  <div class="col-md-6">
				  <div class="footer-right">
				 <div class="form">
				 <form>
					 <input type="text" class="text" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}">
					 <input type="text" class="text" value="E-mail" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'E-mail';}">
					 <textarea rows="2" cols="70" onfocus="if(this.value == 'Your Message') this.value='';" onblur="if(this.value == '') this.value='Your Message';" >Your Message</textarea>
					 <div class="clear"> </div>
					 <input type="submit" value="SEND"> 
				 </form>
				 </div>
				  </div>
				  <div class="clear"></div>
				  <p class="copy-right">Copyright by <a href="#top-top">Kenyeh</a></p>
			  </div>
		 </div>
	 </div>
	 <a class="up scroll" href="#top-top"><span> </span></a>
	  
 </div>
 
 </body>
 </html>
 
   