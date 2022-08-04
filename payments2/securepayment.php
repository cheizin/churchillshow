
<?php
session_start();
include("../controllers/setup/connect.php");

?>
<!doctype html>
<html lang="en-US">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Churchill</title>
    <!-- Favicon -->
   <link rel="icon" href="../assets/favicon/apple-touch-icon.png" type="image/x-icon" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://trapflix.risksys.co.ke/css/bootstrap.min.css" />
    <!-- Typography CSS -->
    <link rel="stylesheet" href="https://trapflix.risksys.co.ke/css/typography.css">
    <!-- Style -->
    <link rel="stylesheet" href="https://trapflix.risksys.co.ke/css/style.css" />
    <!-- Responsive -->
    <link rel="stylesheet" href="https://trapflix.risksys.co.ke/css/responsive.css" />
</head>

<body>

    <!-- Header -->
    <header id="main-header">
        <div class="main-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <nav class="navbar navbar-expand-lg navbar-light p-0">
                            <a href="#" class="navbar-toggler c-toggler" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <div class="navbar-toggler-icon" data-toggle="collapse">
                                    <span class="navbar-menu-icon navbar-menu-icon--top"></span>
                                    <span class="navbar-menu-icon navbar-menu-icon--middle"></span>
                                    <span class="navbar-menu-icon navbar-menu-icon--bottom"></span>
                                </div>
                            </a>
                            <a class="navbar-brand" href="https://trapflix.com/home.php"> <img class="img-fluid logo" src="../assets/media/site-logo/logo-dark.png"
                                    alt="streamit" /> </a>

                        </nav>
                        <div class="nav-overlay"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->
    <!-- MainContent -->
    <section class="m-profile">
        <div class="container">
            
            <div class="row">
                <?php
                    if(isset($_GET['payment_expired']))
                    {
                        ?>
											<div class="alert alert-danger alert-dismissible fade show w-100" role="alert">
					<strong>Subscription Expired!</strong> Your subscription has expired. Please update payments to continue enjoying.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</div>
                        
                        <?php
                    }
                ?>
            </div>
        
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="sign-user_card" id="payments_section">
                        <div class="table-responsive pricing pt-2">
                            <table id="my-table" class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center prc-wrap"></th>
                                        <th class="text-center prc-wrap">
                                            <div class="prc-box">
                                                <div class="h3 pt-4 text-white">$12<small> / Per month</small></div>
                                                <span class="type">User</span>
                                            </div>
                                        </th>
                                        <th class="text-center prc-wrap">
                                            <div class="prc-box">
                                                <div class="h3 pt-4 text-white">Ksh 24<small> / Per month</small></div>
                                                <span class="type">Channel</span>
                                            </div>
                                        </th>
                                        <th class="text-center prc-wrap">
                                            <div class="prc-box active">
                                                <div class="h3 pt-4 text-white">Ksh 36<small> / Per month</small></div>
                                                <span class="type">Sponsor</span>
                                            </div>
                                        </th>
                                        
                                         <th class="text-center prc-wrap">
                                            <div class="prc-box active">
                                                <div class="h3 pt-4 text-white">Ksh 2<small> / Per month</small></div>
                                                <span class="type">Trial</span>
                                            </div>
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th class="text-center" scope="row">View Movies</th>
                                        <td class="text-center child-cell"><i class="ri-check-line ri-2x"></i></td>
                                        <td class="text-center child-cell"><i class="ri-check-line ri-2x"></i>
                                        </td>
                                        <td class="text-center child-cell active"><i class="ri-check-line ri-2x"></i></td>
                                        <td class="text-center child-cell active"><i class="ri-check-line ri-2x"></i></td>
                                        
                                    </tr>
                                    <tr>
                                        <th class="text-center" scope="row">Create Channels</th>
                                        <td class="text-center child-cell"><i class="ri-close-line i_close"></i></td>
                                        <td class="text-center child-cell "><i class="ri-check-line ri-2x">4 max</i>
                                        </td>
                                        <td class="text-center child-cell active"><i class="ri-check-line ri-2x"></i>Unlimited</td>
                                        <td class="text-center child-cell active"><i class="ri-check-line ri-2x"></i></td>
                                        
                                    </tr>
                                    <tr>
                                        <th class="text-center" scope="row">Verified Channels</th>
                                        <td class="text-center child-cell"><i class="ri-close-line i_close"></i></td>
                                        <td class="text-center child-cell"><i class="ri-close-line i_close"></i>
                                        </td>
                                        <td class="text-center child-cell active"><i class="ri-check-line ri-2x"></i></td>
                                        <td class="text-center child-cell active"><i class="ri-check-line ri-2x"></i></td>
                                    </tr>

                                    <tr>
                                        <th class="text-center" scope="row">Ad Free Entertainment</th>
                                        <td class="text-center child-cell"><i class="ri-close-line i_close"></i></td>
                                        <td class="text-center child-cell"><i class="ri-close-line i_close"></i>
                                        </td>
                                        <td class="text-center child-cell active"><i class="ri-check-line ri-2x"></i></td>
                                        <td class="text-center child-cell active"><i class="ri-check-line ri-2x"></i></td>
                                    </tr>
                                    <tr>
                                    <td>  </td>
                                    
                                    <?php
                                    $sql = mysqli_query($dbc,"SELECT id FROM subscription_packages ORDER by ID ASC");
                                    while($row = mysqli_fetch_array($sql))
                                    {
                                        ?>
                                          <td class="text-center">
                                             <button class="btn btn-hover mt-3" onclick="SelectPackage('<?php echo $row['id'];?>');"> Purchase</button>
                                        </td>
                                        <?php
                                    }
                                    
                                    ?>

                  
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="mb-0">
        <div class="container-fluid">
            <div class="block-space">
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        <ul class="f-link list-unstyled mb-0">
                            <li><a href="#">About Us</a></li>
                            <li><a href="movie-category.html">Movies</a></li>
                            <li><a href="show-category.html">Tv Shows</a></li>
                            <li><a href="#">Coporate Information</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <ul class="f-link list-unstyled mb-0">
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="#">Help</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <ul class="f-link list-unstyled mb-0">
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Cotact Us</a></li>
                            <li><a href="#">Legal Notice</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-12 r-mt-15">
                        <div class="d-flex">
                            <a href="#" class="s-icon">
                                <i class="ri-facebook-fill"></i>
                            </a>
                            <a href="#" class="s-icon">
                                <i class="ri-skype-fill"></i>
                            </a>
                            <a href="#" class="s-icon">
                                <i class="ri-linkedin-fill"></i>
                            </a>
                            <a href="#" class="s-icon">
                                <i class="ri-whatsapp-fill"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright py-2">
            <div class="container-fluid">
                <p class="mb-0 text-center font-size-14 text-body">TRAPFLIX - 2020 All Rights Reserved</p>
            </div>
        </div>
    </footer>
    <!-- MainContent End-->
    <!-- back-to-top -->
    <div id="back-to-top">
        <a class="top" href="#top" id="top"> <i class="fa fa-angle-up"></i> </a>
    </div>
    <!-- back-to-top End -->
    <!-- jQuery, Popper JS -->
    <script src="https://trapflix.risksys.co.ke/js/jquery-3.4.1.min.js"></script>
    <script src="https://trapflix.risksys.co.ke/js/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://trapflix.risksys.co.ke/js/bootstrap.min.js"></script>
    <!-- Slick JS -->
    <script src="https://trapflix.risksys.co.ke/js/slick.min.js"></script>
    <!-- owl carousel Js -->
    <script src="https://trapflix.risksys.co.ke/js/owl.carousel.min.js"></script>
    <!-- select2 Js -->
    <script src="https://trapflix.risksys.co.ke/js/select2.min.js"></script>
    <!-- Magnific Popup-->
    <script src="https://trapflix.risksys.co.ke/js/jquery.magnific-popup.min.js"></script>
    <!-- Slick Animation-->
    <script src="https://trapflix.risksys.co.ke/js/slick-animation.min.js"></script>
    <!-- Custom JS-->
    <script src="https://trapflix.risksys.co.ke/js/custom.js"></script>
    <script src="payments.js"></script>
    
</body>

</html>