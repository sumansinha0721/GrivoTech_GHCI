<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <title>
      
        GrivoTech | One Platform Solution | Department of Education, Govt. of Andhra Pradesh &middot; 
      
    </title>

    
      <link href='https://fonts.googleapis.com/css?family=Lora:400,400italic|Work+Sans:300,400,500,600' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="assets/css/toolkit-startup.css" rel="stylesheet">
      <link href="assets/css/application-startup.css" rel="stylesheet">
    

    

    <style>
      /* note: this is a hack for ios iframe for bootstrap themes shopify page */
      /* this chunk of css is not part of the toolkit :) */
      /* …curses ios, etc… */
      @media (max-width: 768px) and (-webkit-min-device-pixel-ratio: 2) {
        body {
          width: 1px;
          min-width: 100%;
          *width: 100%;
        }
        #stage {
          height: 1px;
          overflow: auto;
          min-height: 100vh;
          -webkit-overflow-scrolling: touch;
        }
      }
      .dropdown-menu {
      	display: none;
      }
      .dropdown:hover .dropdown-menu{
      	display: inherit;
      }
      .dropdown-item:hover {
      	color: blue;
      }
      </style>
  </head>


<body>
  



<div class="stage-shelf stage-shelf-right hidden" id="sidebar">
  <ul class="nav nav-bordered nav-stacked flex-column">
    <li class="nav-header">Home</li>
    <li class="nav-item dropdown">
      <a class="nav-link active" href="#">LogIn</a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="student/userlogin.php">Student</a>
        <a class="dropdown-item" href="college/cllglogin.php">College</a>
        <a class="dropdown-item" href="university/adminlogin.php">University</a>
         <a class="dropdown-item" href="admin/adminlogin.php">Admin</a>
      </div>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="knowmore.php">Know More</a>
    </li>
  </ul>
</div>

<div class="stage" id="stage">

<div class="block block-inverse block-fill-height app-header"
     style="background-image: url(assets/img/startup-1.jpg);">

  <div class="container py-4 fixed-top app-navbar">
  <nav class="navbar navbar-transparent navbar-padded navbar-toggleable-sm">
    <button
      class="navbar-toggler navbar-toggler-right hidden-md-up"
      type="button"
      data-target="#stage"
      data-toggle="stage"
      data-distance="-250">
      <span class="navbar-toggler-icon"></span>
    </button>

    <a class="navbar-brand mr-auto" href="" >
      <strong style="background: #fff; padding: 12px; border-radius: 4px; color: #28669F;">GrivoTech</strong>
    </a>

    <div class="hidden-sm-down text-uppercase">
      <ul class="navbar-nav">
        <li class="nav-item px-1">
          <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item px-1 dropdown">
          <a class="nav-link" href="#">Login as</a>
          <div class="dropdown-menu">
          	<a class="dropdown-item" href="student/userlogin.php">Student</a>
        <a class="dropdown-item" href="college/cllglogin.php">College</a>
        <a class="dropdown-item" href="university/adminlogin.php">University</a>
         <a class="dropdown-item" href="admin/adminlogin.php">Admin</a>
          </div>
        </li>
        
        <li class="nav-item px-1 dropdown">
          <a class="nav-link" href="#">Know More</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="knowmore.php">Know More</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</div>


  <img class="app-graph"  src="assets/img/startup-0.svg" id="home">

  <div class="block-xs-middle pb-5">
    <div class="container">
      <div class="row">
        <div class="col-sm-10 col-lg-6">
          <h1 class="block-titleData frequency">Use our Platform</h1>
          <p class="lead mb-4 text-muted">Let us know your Issue and solve your Problem as soon as possible. To Register your Grievance, You need to login first, or for first time User, Register yourself on our Portal.</p>
          <button class="btn btn-primary btn-lg">LogIn</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="block block-secondary app-iphone-block">
  <div class="container">
    <div class="row app-align-center">

      <div class="col-sm-5 hidden-sm-down">
        <img class="app-iphone" src="assets/img/startup-2_edited.jpeg" style="width: 100%;">
      </div>

      <div class="col-md-6 offset-md-1 col-sm-12 offset-sm-0">
        <h6 class="text-muted text-uppercase">Know More</h6>
        <h3>About GrivoTech</h3>
        <p class="lead mb-4">GrivoTech is an initiative of Education Department, Govt. of Andhra Pradesh. This portal is trying to reduce the gap between students and teachers and to let teachers solve the students problem with all sorts of his own Safety and Comfort and maintain complete Privacy. <a href="knowmore.php" class="text-primary">Read More</a> about Us.</p>
        <div class="row hidden-md-down">
          <div class="col-sm-6 mb-3">
            <h5>Associated Colleges</h5>
            <p>We are associated with almost all College providing Technical Degree courses to Students. <a href="knowmore.php" class="text-primary">Know More</a> about colleges.</p>
          </div>
          <div class="col-sm-6">
            <h5>Features &amp; Facilities</h5>
            <p>We are tying to improve ourself to reduce the Panel team member's load and providing more safety and comfort here. <a href="knowmore.php" class="text-primary">Learn more</a>.</p>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<!--
<div class="block block-inverse app-high-praise"
     style="background-image: url(assets/img/startup-3.jpg);">
    <div class="container">
      <div class="row app-align-center py-3">
        <div class="col-sm-5 push-sm-7 py-5">
          <h6 class="text-muted text-uppercase mb-2">High Praise</h6>
          <h3 class="mb-4">"Why to live with Problems? Problems always comes with Solution. If you aren't able to find solution by your own, then just Reigster your Grievance to us. We would help and Solve for you."</h3>
          <p class="mb-4 text-muted">GrivoTech | One Platform Solution for All your Problems</p>
        </div>
      </div>
  </div>
</div>
-->
<div class="block block-secondary app-block-marketing-grid">
  <div class="container text-xs-center">

    <div class="row mb-5">
      <div class="col-xs-10 offset-xs-1 col-sm-8 offset-sm-2 col-lg-6 offset-lg-3">
        <h6 class="text-muted text-uppercase mb-2">Our System</h6>
        <h3  class="mb-4">It’s not hard to see how we make your life easier every day.</h3>
      </div>
    </div>

    <div class="row app-marketing-grid">
      <div class="col-md-4 px-4 mb-5">
        <img class="mb-1" src="assets/img/startup-9.svg">
        <p><strong>24/7 support.</strong> We’re always here for you no matter what time of day.</p>
      </div>
      <div class="col-md-4 px-4 mb-5">
        <img class="mb-1" src="assets/img/startup-10.svg">
        <p><strong>Flow.</strong> We automatically handle all grievance allocation to Faculties and College.</p>
      </div>
      <div class="col-md-4 px-4 mb-5">
        <img class="mb-1" src="assets/img/startup-11.svg">
        <p><strong>Features.</strong> File Individual grievance, Group grievances, Push Grievance to Higher Authorities.</p>
      </div>
    </div>

    <div class="row app-marketing-grid">
      <div class="col-md-4 px-4 mb-5">
        <img class="mb-1" src="assets/img/startup-12.svg">
        <p><strong>Fast Solution.</strong> We would take minimum time to Solve your Issues.</p>
      </div>
      <div class="col-md-4 px-4 mb-5">
        <img class="mb-1" src="assets/img/startup-13.svg">
        <p><strong>WebSite &amp; Mobile apps.</strong> Android apps available for monitoring, and We will start working on iOS Application.</p>
      </div>
      <div class="col-md-4 px-4 mb-5">
        <img class="mb-1" src="assets/img/startup-14.svg">
        <p><strong>Secure connections.</strong> Every single request is routed through HTTPS. Your information is Secured with us.</p>
      </div>
    </div>
  </div>
</div>

<div class="block block-inverse app-footer">
 <div class="container">
    <div class="row">
      <div class="col-md-3 mb-5">
        <ul class="list-unstyled list-spaced">
          <li class="mb-2"><h6 class="text-uppercase">About GrivoTech</h6></li>
          <div class="border"></div>
          <li>
            Solution to all probelms at a single platform is provided by GrivoTech | One Platform solution. This service comes under the Education Department, Govt. of Andhra Pradesh.
          </li>
        </ul>
      </div>
      <div class="col-md-2 offset-md-1 mb-5">
        <ul class="list-unstyled list-spaced">
          <li class="mb-2"><h6 class="text-uppercase">Quick Links</h6></li>
          <div class="border"></div>
      <li><a href="#home">Home</a></li>
		  <li><a href="knowmore.php">About Us</a></li>
		  <li><a href="knowmore.php">Collegs & University</a></li>
		  <li><a href="knowmore.php">Portfolio</a></li>
		  <li><a href="#">Contact Us</a></li>
        </ul>
      </div>
      <div class="col-md-3 mb-5">
        <ul class="list-unstyled list-spaced">
          <li class="mb-2"><h6 class="text-uppercase">Important Links</h6></li>
          <div class="border"></div>
	         <li><a href="https://www.ap.gov.in/">Govt. of Andhra Pradesh</a></li>
			 <li><a href="https://www.ugc.ac.in/">UGC</a></li>
			 <li><a href="https://www.aicte-india.org/">AICTE</a></li>
			 <li><a href="https://www.ap.gov.in/?page_id=60">Education Department, Govt. of Andhra Pradesh</a></li>
        </ul>
      </div>
      <div class="col-md-3 mb-5">
        <ul class="list-unstyled list-spaced">
          <li class="mb-2"><h6 class="text-uppercase">Reach Us</h6></li>
          <div class="border"></div>
          <li><i class="fa fa-map-marker" aria-hidden="true"></i> Amravati, Andhra Pradesh</li>
		  <li><i class="fa fa-phone" aria-hidden="true"></i> 7301853068</li>
		  <li><a href="mailto: grivotech@gmail.com"><i class="fa fa-envelope" aria-hidden="true"></i> grivotech@gmail.com</a></li>
        </ul>
        <div class="social-media">
	    <a href="https://www.facebook.com"><i class="fa fa-facebook" aria-hidden="true"></i></a>
		<a href="https://www.twitter.com"><i class="fa fa-twitter" aria-hidden="true"></i></a>
		<a href="https://www.instagram.com"><i class="fa fa-instagram" aria-hidden="true"></i></a>
		<a href="https://www.plus.google.com"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
	  </div>
      </div>
      
    </div>
    <article class="footer-bottom">
			<a href="#">Privacy Policy</a> | Copyright &copy; GrivoTech | One Platform Solution. All Rights Reserved.
		</article>
  </div>
</div>

</div>


    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/tether.min.js"></script>
    <script src="assets/js/toolkit.js"></script>
    <script src="assets/js/application.js"></script>
  </body>
</html>

