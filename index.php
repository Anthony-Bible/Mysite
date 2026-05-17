<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="My portfolio of items using, bootstrap, html and php">
    <meta name="author" content="Anthony Bible">

    <title>Anthony Bible</title>

    <!-- Bootstrap Core CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->

    <!-- Theme CSS -->
    <!-- <link href="css/freelancer.min.css" rel="stylesheet"> -->
    

	
    <!-- Custom Fonts -->
    <script async rel='preconnect' src="https://use.fontawesome.com/a8983b99ef.js"></script>
    <link rel='preconnect' href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link rel='preconnect' href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<link rel="stylesheet" href="css/style.css?v=bs5b">

  <!-- <script src="js/contact_me.js"></script> -->
  
     <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- Bootstrap 5 Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>


  
</head>

<body id="page-top" class="index">
 <!-- jQuery -->

 <div class="alert alert-warning alert-dismissible alert-checkout show" role="alert">
   You should check my <a href="https://github.com/anthony-bible" class="alert-link">github </a> to see some of the latest projects I'm working on. Or check out my <a href="https://www.abible.dev" class="alert-link"> blog </a> for a more detailed look into what I do.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-expand-md navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="#page-top">Anthony Bible</a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
                Menu <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item page-scroll"><a class="nav-link" href="#platform">Platform</a></li>
                    <li class="nav-item page-scroll"><a class="nav-link" href="#foundations">Foundations</a></li>
                    <li class="nav-item page-scroll"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item page-scroll"><a class="nav-link" href="#contact">Contact</a></li>
                    <li class="nav-item page-scroll"><a class="nav-link" href="https://www.abible.dev">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="/homelab.php">Homelab</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header -->
    <header>
        <div class="container" id="maincontent" tabindex="-1">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-fluid rounded-circle" id="ProfileImg" src="img/me2.jpg" alt="">
                    <div class="intro-text">
                        <h1 class="name">Anthony Bible</h1>
                        <hr class="star-light">
                        <span class="skills">Site reliability engineer | platform engineer</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Platform Section -->
    <section id="platform">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Platform & Infrastructure</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 portfolio-item">
                    <a href="/homelab.php" class="portfolio-link">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <div class="portfolio-icon">
                            <i class="fa fa-cubes"></i>
                        </div>
                        <h3 class="text-center">Cloud-Native Platforms</h3>
                    </a>
                    <p class="text-center">Managing 15+ High Availability clusters (>150 nodes) with 99.999% uptime targets. Specialized in K3s, SaltStack, and AWS infrastructure.</p>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="https://github.com/anthony-bible" class="portfolio-link">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <div class="portfolio-icon">
                            <i class="fa fa-server"></i>
                        </div>
                        <h3 class="text-center">Infrastructure as Code</h3>
                    </a>
                    <p class="text-center">Automating complex deployments using Terraform, Salt, and Jenkins to support millions of monthly active users.</p>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModalSec" class="portfolio-link" data-bs-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <div class="portfolio-icon">
                            <i class="fa fa-shield"></i>
                        </div>
                        <h3 class="text-center">Security & Compliance</h3>
                    </a>
                    <p class="text-center">Achieved PCI-DSS compliance and USPS Sensitive Security clearance. Expert in ELK stack for observability and auditing.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Foundations Section -->
    <section id="foundations">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Foundations</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal1" class="portfolio-link" data-bs-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/portfolio/register.png" class="img-fluid" alt="Registration System">
                    </a>
                    <hr>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal2" class="portfolio-link" data-bs-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
</div>
                        </div>
                        <img src="img/portfolio/shout.png" class="img-fluid" alt="Messaging System">
                    </a>
                    <hr>
                </div>
               
               
             
            </div>
            <div class="row">
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal4" class="portfolio-link" data-bs-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/portfolio/summer.png" class="img-fluid" alt="The summer Bear">
                    </a>
                    <hr>
                </div>
           
             
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal5" class="portfolio-link" data-bs-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/portfolio/forum.png" class="img-fluid" alt="Forum">
                    </a>
                    <hr>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal6" class="portfolio-link" data-bs-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/portfolio/vidsearch.png" class="img-fluid" alt="Video Search">
                    </a>
                    <hr>
                </div>
           </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>About</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 offset-lg-2">
                    <p>I am a Site Reliability Engineer and Platform Engineer dedicated to building high-availability infrastructure that scales to millions of users. My experience includes managing 15+ HA clusters across 150+ nodes, consistently maintaining "five nines" (99.999%) uptime in mission-critical environments. I specialize in bridging the gap between development and operations through robust automation and GitOps workflows.</p>
                </div>
                <div class="col-lg-4">
                    <p>My professional background is rooted in security and compliance, having successfully achieved organization-wide PCI-DSS compliance and obtained USPS Sensitive Security clearance. I am proficient in modern infrastructure tools including SaltStack, Terraform, Jenkins, and the ELK stack. I am passionate about infrastructure as code and leveraging cloud-native technologies like Kubernetes and Traefik to solve complex scale challenges.</p>
                </div>
                <div class="col-lg-8 offset-lg-2 text-center">
                    <a href="downloads/resume.pdf" class="btn btn-lg btn-outline">
                        <i class="fa fa-download"></i> Resume
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Contact Me</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form name="sentMessage" id="contactForm" method="POST" action="/contactform/contact.php">
                        <div class="row control-group">
                            <div class="form-group col-12 floating-label-form-group controls">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
                                <p class="form-text text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-12 floating-label-form-group controls">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" name="email" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
                                <p class="form-text text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-12 floating-label-form-group controls">
                                <label for="phone">Phone Number</label>
                                <input type="tel" name="phone" class="form-control" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number.">
                                <p class="form-text text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-12 floating-label-form-group controls">
                                <label for="message">Message</label>
                                <textarea rows="5" name="message" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                <p class="form-text text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div  class="form-group col-12">
                            <div class="g-recaptcha" data-sitekey="6LeSbokUAAAAAOGU1sjWw8Ud_MPjx-kVRJleDpE6"></div>
                                <button id="contactFormSubmit"   type="submit" class="btn btn-success btn-lg">Send</button>
                            <div id="wasitasuccess"> </div>
                            </div>
                           <h4>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

   

    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <h3>Location</h3>
                        <p>St. George, Utah</p>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Around the Web</h3>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="https://www.linkedin.com/in/anthonybible/" class="btn-social btn-outline"><span class="sr-only">LinkedIn</span><i class="fa fa-fw fa-linkedin"></i></a>
                            </li>
                            <li class="list-inline-item">
                            	<a href="https://github.com/Anthony-Bible" class="btn-social btn-outline"><span class="sr-only">GitHub</span><i class="fa fa-fw fa-github"></i> </a>
                            </li>
                           
                        </ul>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Mini Bio</h3>
                        <p>I am a Site Reliability Engineer focusing on platform automation, security, and cloud-native architecture.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; Anthony Bible 2016 - <?php echo date("Y"); ?>

                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll d-none">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- Portfolio Modals -->
    <div class="portfolio-modal modal" id="portfolioModalSec" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
            <div class="close-modal" data-bs-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="modal-body">
                            <h2>Security & Compliance</h2>
                            <hr class="star-primary">
                            <img src="img/portfolio/amh.jpg" class="img-fluid img-centered" alt="">
                            <p>I have extensive experience in securing critical infrastructure and ensuring regulatory compliance. My achievements include leading an organization to full PCI-DSS compliance and obtaining a USPS Sensitive Security clearance. I leverage tools like the ELK stack for comprehensive auditing, observability, and threat detection, ensuring that security is baked into the platform from the ground up.</p>
                            <ul class="list-inline item-details">
                                <li class="list-inline-item">Focus:
                                    <strong>Compliance & Auditing</strong>
                                </li>
                                <li class="list-inline-item">Clearance:
                                    <strong>USPS Sensitive</strong>
                                </li>
                                <li class="list-inline-item">Standards:
                                    <strong>PCI-DSS</strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="portfolio-modal modal" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
            <div class="close-modal" data-bs-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="modal-body">
                            <a href="//reg.anthony.bible"><h2>Mini social Network</h2></a>
                            <hr class="star-primary">
                            <img src="img/portfolio/register.png" class="img-fluid img-centered" alt="">
                            <p>This is a project I did to further hone my skills. I built this from the ground up only using bootstrap and jquery, using the industry best practices. I used the latest security techniques to store and retrieve user credentials. In this project I used PHP, Javascript, Jquery, AJAX, and Bootstrap.</p>
                            <ul class="list-inline item-details">
                                <li class="list-inline-item">Client:
                                    <strong><a href="//reg.anthony.bible">Personal Project</a>
                                    </strong>
                                </li>
                                <li class="list-inline-item">Date:
                                    <strong><a href="//reg.anthony.bible">April 2017</a>
                                    </strong>
                                </li>
                                <li class="list-inline-item">Service:
                                    <strong><a href="//reg.anthony.bible">Web Development</a>
                                    </strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="portfolio-modal modal" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
            <div class="close-modal" data-bs-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="modal-body">
                           <a href="messaging/"> <h2>Messaging System</h2></a>
                            <hr class="star-primary">
                            <img src="img/portfolio/shout.png" class="img-fluid img-centered" alt="">
                            <p>In this project I created a messaging system. Currently it lets anyone post. In the future I would like to integrate it with a login/registration system.</p>
                            <ul class="list-inline item-details">
                                <li class="list-inline-item">Client:
                                    <strong><a href="messaging/">Personal Project</a>
                                    </strong>
                                </li>
                                <li class="list-inline-item">Date:
                                    <strong><a href="messaging/">January 2016</a>
                                    </strong>
                                </li>
                                <li class="list-inline-item">Service:
                                    <strong><a href="messaging/">Web Development</a>
                                    </strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="portfolio-modal modal" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
            <div class="close-modal" data-bs-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="modal-body">
                            <a href="restaurant/">
                            <h2>The Summer Bear</h2></a>
                            <hr class="star-primary">
                            <img src="img/portfolio/summer.png" class="img-fluid img-centered" alt="">
                            <p>This is a mock website for Summer Bear. </p>
                            <ul class="list-inline item-details">
                                <li class="list-inline-item">Client:
                                    <strong><a href="restaurant/">The Summer Bear</a>
                                    </strong>
                                </li>
                                <li class="list-inline-item">Date:
                                    <strong><a href="restaurant/">April 2016</a>
                                    </strong>
                                </li>
                                <li class="list-inline-item">Service:
                                    <strong><a href="restaurant/">Web Development/Design</a>
                                    </strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
      <div class="portfolio-modal modal" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
            <div class="close-modal" data-bs-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="modal-body">
                           <a href="forum/"> <h2>The Forum</h2></a>
                            <hr class="star-primary">
                            <img src="img/portfolio/forum.png" class="img-fluid img-centered" alt="">
                            <p>This is a full-fledged forum I did in PHP. You are able to submit new threads and reply to existing ones.</p>
                            <ul class="list-inline item-details">
                                <li class="list-inline-item">Client:
                                    <strong><a href="forum/">The Forum</a>
                                    </strong>
                                </li>
                                <li class="list-inline-item">Date:
                                    <strong><a href="forum/">April 2017</a>
                                    </strong>
                                </li>
                                <li class="list-inline-item">Service:
                                    <strong><a href="forum/">Web Development/Design</a>
                                    </strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="portfolio-modal modal" id="portfolioModal6" tabindex="-1" role="dialog" >
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
            <div class="close-modal" data-bs-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="modal-body">
                            <a href="vidsearch/"><h2>Youtube Video Search</h2></a>
                            <hr class="star-primary">
                            <img src="img/portfolio/forum.png" class="img-fluid img-centered" alt="">
                            <p>This is a YouTube search engine. I used the YouTube API and jQuery to retrieve the results.</p>
                            <ul class="list-inline item-details">
                                <li class="list-inline-item">Client:
                                    <strong><a href="vidsearch/">VidzSearch</a>
                                    </strong>
                                </li>
                                <li class="list-inline-item">Date:
                                    <strong><a href="vidsearch/">April 2017</a>
                                    </strong>
                                </li>
                                <li class="list-inline-item">Service:
                                    <strong><a href="vidsearch/">Web Development/Design</a>
                                    </strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
	
   
<!-- Jquery cdn -->

    <!-- Plugin JavaScript -->


    <!-- Theme JavaScript -->
    <script rel='preconnect' src='https://www.google.com/recaptcha/api.js'></script>

</body>

</html>
