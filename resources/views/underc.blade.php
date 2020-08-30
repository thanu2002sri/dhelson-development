<!DOCTYPE html>
    <html lang="en">

<head>
        <meta charset="utf-8" />
        <title>DHELSON EXPRESS</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="Courier DEPRIXA-Integral Web System">
		<meta name="author" content="Jaomweb">
		<meta name="description" content="">
        <!-- favicon -->
        <!-- Bootstrap -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
    </head>
<body>
    <!-- Navbar STart -->
    <header id="topnav" class="defaultscroll sticky active nav-sticky">
        <div class="container">
            <!-- Logo container-->
            <div>
               <a class="logo" href="index.php"><img src="images/dhelson-logo (1).png" alt="DEPRIXA PRO" width="210" height="94" style="margin-right: 10px;"></a>
            </div>                 
            <div class="buy-button">
            </div><!--end login button-->
            <div class="menu-extras">
                <div class="menu-item">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </div>
            </div>
            <div id="navigation" class="active">
                <!-- Navigation Menu-->   
                <ul class="navigation-menu">
                    <li class="#"><a href="tracking.html"><i class="mdi mdi-package-variant-closed"></i>Order Tracking</a></li>
                </ul>
        </div>
        </div>
    </header>       
    <!-- Navbar End -->
            <!-- Hero Start -->
    <section class="bg-home">
        <div class="home-center">
            <div class="home-desc-center">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-8 col-md-6">
                            <div class="mr-lg-6">   
                                <img src="images/Building-a-Logistics-App.gif" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                            <div class="login-page bg-black shadow rounded p-4">
                                <div class="text-center">
                                    <h4 class="mb-4"><span>Check the location and </span> <br> status of your shipments<span class="text-primary">.</span></h4>  
                                </div>
                                <form class="login-form" action="track.php" method="post">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group position-relative">
                                                <label>Tracking DEPRIXA PRO<span class="text-primary">.</span></label>
                                                <i class="mdi mdi-cube-send ml-3 icons"></i>
                                                <textarea name="order_inv" placeholder="Enter your Shipping / Tracking / Guide number Ex: (DHEL-100000001)" id="comments" rows="4" class="form-control pl-5" required=""></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 text-center">
                                                <button type="submit" name="submit" class="btn btn-primary rounded w-100"><i class="mdi mdi-cube-outline ml-3 icons"></i> Search now!</button>
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </div>
                                </form>
                            </div><!---->
                        </div>   <!--end col-->                       
                    </div><!--end row-->
                </div> <!--end container-->
            </div>
        </div>
    </section><!--end section-->
    <!-- Hero End -->

    <!-- Back to top -->
    <a href="#" class="back-to-top rounded text-center" id="back-to-top"> 
        <i class="mdi mdi-chevron-up d-block"> </i> 
    </a>
    <!-- Back to top -->
</body>
</html>
   