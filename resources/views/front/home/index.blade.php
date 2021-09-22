<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  
    <meta name="keywords" content="{{app(GeneralSettings::class)->seo_keyword}}">
    {!! SEO::generate() !!}
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="icon" type="image/png" href="images/favicon.ico" />

    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl-carousel.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
    <!-- PRE LOADER -->
    <div class="preloader">
        <img src="images/symbol.png" style="height:80px" alt="">
    </div>
    <!-- Navigation Section -->
    <div class="navbar custom-navbar wow fadeInDown" data-wow-duration="2s" role="navigation" id="header">
        <div class="container">
            <!-- NAVBAR HEADER -->
            <div class="navbar-header">
                <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span
                        class="icon icon-bar"></span> <span class="icon icon-bar"></span> <span
                        class="icon icon-bar"></span> </button>
                <!-- lOGO TEXT HERE -->
                <a href="index.html" class="navbar-brand" style="display: flex; align-items-center"><img src="images//symbol.png" style="height: 20px; margin-right:10px" alt="">Canada VITE Immigration
                </a>
            </div>
            <!-- NAVIGATION LINKS -->
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#home" class="smoothScroll">Acceuil</a></li>
                    <li><a href="#service" class="smoothScroll">Services</a></li>
                    <li><a href="#about" class="smoothScroll">A Propos</a></li>
                    <li><a href="#contact" class="smoothScroll">Contact</a></li>
                    <li><span class="calltxt"><i class="fas fa-phone" aria-hidden="true"></i> 123 456 7890</span></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Home Section -->
    <div id="home" class="parallax-section">
        <!--     <div class="overlay"></div>-->
        <div class="container">
            <div class="row">
                <div class="col-md-offset-1 col-md-10 col-sm-12">
                    <div class="slide-text">
                        <img src="images/brand.png" style="width:200px; " alt="brand">
                        <h3> Le rève devient réalité </h3>
                        <h1>Canada Vite Immigration</h1>
                        <p>Conscient de l’apport positif des émigrants au développement économique, social et démographique ; le Canada offre plusieurs programmes d’immigration destinés aux étrangers désirant d'y s’installer et d'y vivre. La réalisation
                            de votre rêve d'immigrer au Canada passe par plusieurs étapes auxquelles notre bureau a le plaisir de vous assister, vous orienter et vous accompagner.</p>
                        <a href="#about" class="btn btn-default section-btn">Qui sommes-nous</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>

    <!-- About section -->
    <div id="about">
        <div class="container">
            <div class="section-title">
                <h3>A propos de <span>Canada VITE Immigration</span></h3>

            </div>
            <div class="about-desc">
                <div class="row">
                    <div class="col-md-7">
                        <h3>Canada VITE Immigration</h3>
                        <p>Canada VITE immigration est un cabinet offrant des services professionnels et compétents en matière d’immigration et de citoyenneté canadienne. Nous serons en mesure de vous conseiller et de vous guider vers vos objectifs.
                        </p>
                        <p>Nous savons qu’une décision d’immigration peut être le projet le plus important dans la vie d’une personne ; d’où, chez Canada VITE immigration, la satisfaction de la clientèle est une primauté, nous nous efforçons de répondre
                            à vos besoins comme si c’étaient les nôtres.</p>
                        <div class="btn-wrapper" style="padding-top: 40px;">
                            <a href="#" class="readmore-btn">Voir plus <i class="fas fa-chevron-right" style="margin-left: 10px;"></i></a>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="postimg " style="padding: 40px;"><img src="images/brand.png"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Blog Section -->
    <div id="blog">
        <div class="container">
            <!-- SECTION TITLE -->
            <div class="section-title">
                <h3>dernières nouvelles</h3>
            </div>
            <ul class="blogGrid">
                <li class="item">
                    <div class="int">
                        <!-- Blog info -->
                        <div class="post-header">
                            <div class="date"><i class="fas fa-calendar" aria-hidden="true"></i> Sep 25, 2017</div>
                            <h4><a href="#.">Duis ultricies aliquet mauris</a></h4>
                            <div class="postmeta">By : <span>Jhon Doe </span> Category : <a href="#.">Job Search </a>
                            </div>
                        </div>

                        <!-- Blog Image -->
                        <div class="postimg"> <img src="http://sharjeelanjum.com/html/xecta/images/blog/1.jpg" alt="Blog Title"></div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eu nulla eget nisl dapibus finibus maecenas quis sem ...</p>
                        <a href="#." class="readmore">Read More</a>
                    </div>
                </li>
                <li class="item">
                    <div class="int">
                        <!-- Blog info -->
                        <div class="post-header">
                            <div class="date"><i class="fas fa-calendar" aria-hidden="true"></i> Sep 25, 2017</div>
                            <h4><a href="#.">Duis ultricies aliquet mauris</a></h4>
                            <div class="postmeta">By : <span>Jhon Doe </span> Category : <a href="#.">Job Search </a>
                            </div>
                        </div>

                        <!-- Blog Image -->
                        <div class="postimg"> <img src="http://sharjeelanjum.com/html/xecta/images/blog/2.jpg" alt="Blog Title"></div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eu nulla eget nisl dapibus finibus maecenas quis sem ...</p>
                        <a href="#." class="readmore">Read More</a>
                    </div>
                </li>
                <li class="item">
                    <div class="int">
                        <!-- Blog info -->
                        <div class="post-header">
                            <div class="date"><i class="fas fa-calendar" aria-hidden="true"></i> Sep 25, 2017</div>
                            <h4><a href="#.">Duis ultricies aliquet mauris</a></h4>
                            <div class="postmeta">By : <span>Jhon Doe </span> Category : <a href="#.">Job Search </a>
                            </div>
                        </div>

                        <!-- Blog Image -->
                        <div class="postimg"> <img src="http://sharjeelanjum.com/html/xecta/images/blog/3.jpg" alt="Blog Title"></div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eu nulla eget nisl dapibus finibus maecenas quis sem ...</p>
                        <a href="#." class="readmore">Read More</a>
                    </div>
                </li>
                <li class="item">
                    <div class="int">
                        <!-- Blog info -->
                        <div class="post-header">
                            <div class="date"><i class="fas fa-calendar" aria-hidden="true"></i> Sep 25, 2017</div>
                            <h4><a href="#.">Duis ultricies aliquet mauris</a></h4>
                            <div class="postmeta">By : <span>Jhon Doe </span> Category : <a href="#.">Job Search </a>
                            </div>
                        </div>

                        <!-- Blog Image -->
                        <div class="postimg"> <img src="http://sharjeelanjum.com/html/xecta/images/blog/4.jpg" alt="Blog Title"></div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eu nulla eget nisl dapibus finibus maecenas quis sem ...</p>
                        <a href="#." class="readmore">Read More</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <!-- Service 1 -->
    <div class="servicesbox bg1">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-6">
                    <h3>DIGITAL MARKETING</h3>
                    <div class="ctoggle">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus tincidunt mauris est, in faucibus dui viverra et. Aliquam finibus vestibulum elit, at pharetra nisl congue vel. Nunc pretium posuere justo pretium fringilla. Sed
                            volutpat risus non rhoncus convallis. Sed fermentum est at hendrerit pellentesque. Mauris nec leo euismod, sagittis mauris in, posuere est...</p>
                        <a href="#" class="readmore">Read More <i class="fas fa-long-arrow-right"
                                aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Service 2 -->
    <div class="servicesbox bg2 dark">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3>MEDIA BUYING</h3>
                    <div class="ctoggle">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus tincidunt mauris est, in faucibus dui viverra et. Aliquam finibus vestibulum elit, at pharetra nisl congue vel. Nunc pretium posuere justo pretium fringilla. Sed
                            volutpat risus non rhoncus convallis. Sed fermentum est at hendrerit pellentesque. Mauris nec leo euismod, sagittis mauris in, posuere est...</p>
                        <a href="#" class="readmore">Read More <i class="fas fa-long-arrow-right"
                                aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Service 3 -->
    <div class="servicesbox bg3">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-md-offset-5">
                    <h3>GRAPHIC DESIGN &amp; AD PRODUCTION</h3>
                    <div class="ctoggle">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus tincidunt mauris est, in faucibus dui viverra et. Aliquam finibus vestibulum elit, at pharetra nisl congue vel. Nunc pretium posuere justo pretium fringilla. Sed
                            volutpat risus non rhoncus convallis. Sed fermentum est at hendrerit pellentesque. Mauris nec leo euismod, sagittis mauris in, posuere est...</p>
                        <a href="#" class="readmore">Read More <i class="fas fa-long-arrow-right"
                                aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Service 4 -->
    <div class="servicesbox bg4 dark">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3>Business Support Center</h3>
                    <div class="ctoggle">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus tincidunt mauris est, in faucibus dui viverra et. Aliquam finibus vestibulum elit, at pharetra nisl congue vel. Nunc pretium posuere justo pretium fringilla. Sed
                            volutpat risus non rhoncus convallis. Sed fermentum est at hendrerit pellentesque. Mauris nec leo euismod, sagittis mauris in, posuere est...</p>
                        <a href="#" class="readmore">Read More <i class="fas fa-long-arrow-right"
                                aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Video start -->
    <div class="videowraper">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="videobg">
                        <div class="video-image" style="background-image:url(http://sharjeelanjum.com/html/xecta/images/videobg.jpg)"></div>
                        <div class="playbtn"><a href="#." class="popup"><span></span></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video end -->

    <!-- Counter Section -->
    <div id="counter">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12 counter-item">
                    <div class="counterbox">
                        <div class="counter-icon"><i class="fas fa-users" aria-hidden="true"></i></div>
                        <span class="counter-number" data-from="1" data-to="499" data-speed="1000"></span> <span class="counter-text">Happy Client</span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 counter-item">
                    <div class="counterbox">
                        <div class="counter-icon"><i class="fas fa-code" aria-hidden="true"></i></div>
                        <span class="counter-number" data-from="1" data-to="9598" data-speed="2000"></span> <span class="counter-text">Code Line</span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 counter-item">
                    <div class="counterbox">
                        <div class="counter-icon"><i class="fas fa-laptop" aria-hidden="true"></i></div>
                        <span class="counter-number" data-from="1" data-to="1999" data-speed="3000"></span> <span class="counter-text">Project Finished</span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 counter-item">
                    <div class="counterbox">
                        <div class="counter-icon"><i class="fas fa-trophy" aria-hidden="true"></i></div>
                        <span class="counter-number" data-from="1" data-to="199" data-speed="4000"></span> <span class="counter-text">Awards</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div id="contact">
        <!-- Google Map Section -->
        <div id="map"></div>
        <div class="container">
            <!-- CONTACT FORM HERE -->
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="contact-form">
                        <h4>Get a <span>Free</span> Quote</h4>
                        <form id="contact-form" class="row">
                            <div class="col-md-6 col-sm-6">
                                <input type="text" class="form-control" name="name" placeholder="Name">
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <input type="email" class="form-control" name="email" placeholder="Email">
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <input type="tel" class="form-control" name="phone" placeholder="Phone">
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <input type="text" class="form-control" name="phone" placeholder="Address">
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <textarea class="form-control" rows="5" name="message" placeholder="Message"></textarea>
                            </div>
                            <div class="col-md-12">
                                <button id="submit" type="submit" class="form-control" name="submit">Send
                                    Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Newsletter-->
    <div class="newsletter">
        <div class="container">
            <div class="section-title">
                <h3>Newsletter</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Enter Your Email Address">
                <span class="input-group-btn">
                    <button class="btn btn-secondary" type="button">Sign Up <i class="fas fa-paper-plane"></i></button>
                </span>
            </div>
        </div>
    </div>

    <!-- Clients Logo-->
    <div class="our-clients">
        <div class="container">
            <div class="owl-clients">
                <div class="item"> <img src="http://sharjeelanjum.com/html/xecta/images/client-logo4.png" alt=""> </div>
                <div class="item"> <img src="http://sharjeelanjum.com/html/xecta/images/client-logo.png" alt=""> </div>
                <div class="item"> <img src="http://sharjeelanjum.com/html/xecta/images/client-logo2.png" alt=""> </div>
                <div class="item"> <img src="http://sharjeelanjum.com/html/xecta/images/client-logo3.png" alt=""> </div>
                <div class="item"> <img src="http://sharjeelanjum.com/html/xecta/images/client-logo.png" alt=""> </div>
                <div class="item"> <img src="http://sharjeelanjum.com/html/xecta/images/client-logo3.png" alt=""> </div>
                <div class="item"> <img src="http://sharjeelanjum.com/html/xecta/images/client-logo2.png" alt=""> </div>
                <div class="item"> <img src="http://sharjeelanjum.com/html/xecta/images/client-logo3.png" alt=""> </div>
                <div class="item"> <img src="http://sharjeelanjum.com/html/xecta/images/client-logo.png" alt=""> </div>
                <div class="item"> <img src="http://sharjeelanjum.com/html/xecta/images/client-logo3.png" alt=""> </div>
                <div class="item"> <img src="http://sharjeelanjum.com/html/xecta/images/client-logo2.png" alt=""> </div>
            </div>
        </div>
    </div>
    <!-- Clients Logo end-->

    <!-- Footer Section -->
    <footer>
        <div class="container">
            <div class="socialLinks"> <a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a> <a href="#"><i
                        class="fab fa-twitter" aria-hidden="true"></i></a> <a href="#"><i class="fab fa-linkedin"
                        aria-hidden="true"></i></a> <a href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a>
                <a href="#"><i class="fab fa-behance" aria-hidden="true"></i></a> </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="footer-copyright">
                        <p>&copy; 2017 Xecta | All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap -->
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js" integrity="sha512-Tn2m0TIpgVyTzzvmxLNuqbSJH3JP8jm+Cy3hvHrW7ndTDcJ1w5mBiksqDBb8GpE2ksktFvDB/ykZ0mDpsZj20w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Popup -->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/magnific-popup-options.js"></script>

    <!-- Carousel -->
    <script src="js/owl.carousel.js"></script>

    <!-- Sticky Header -->
    <script src="js/jquery.sticky.js"></script>

    <!-- Parallax -->
    <script src="js/jquery.parallax.js"></script>

    <!-- Counter -->
    <script src="js/counter.js"></script>
    <script src="js/smoothscroll.js"></script>

    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMqMG_n4C0aAi3F8a82Q6s3hxDLrTXxe8&callback=initMap" async defer></script>
    <script src="js/gmap.js"></script>

    <!-- Custom -->
    <script src="js/app.js"></script>
</body>

</html>