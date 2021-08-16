<?php
    session_start();
    require_once "header.php";
?>

<body>
    <div class="container-fluid">
        <header class="showcase">
            <div class="showcase-content">
                <div class="container" id="main-container">
                    <nav class="main-nav p-3 border-bottom pb-1">
                        <div class="col-md-6 text-light ">
                            <a class="text-light" href="index.php">
                                <h3 class="logo">Ezbike</h3>
                            </a>
 
                        </div>
                        <div class="col-md-6" id="nav-right">
                            <ul class="main-navbar pt-3">
                                <li><a href="./index.php#howItWorks">How it works</a></li>
                                <?php
                                    if(isset($_SESSION["Email"])){
                                        echo "<li> <a href=\"#\">" . $_SESSION["FirstName"]. "</a></li>";
                                        echo "<li> <a class=\"fs-13\" href=\"logout.php\"> Logout </a></li>";
                                    }else{
                                ?>
                                <li><a class="fs-13" href="login.php">Log in</a></li>
                                <li><a class="fs-13" href="userRegistration.php">Sign up</a>
                                </li>
                                <?php
                                    }
                                ?>
                               

                                
                        
                            </ul>
                        </div>
                    </nav>
                    <section class="landing-page">
                        <div class="text-light text-center">
                            <h3>Rent anywhere in the Philippines!</h3>
                            <p>Feel free to travel with your friends..</p>
                        </div>
                        <form autocomplete="off" style="width: 100%; height: 200px;" action="search.php" method="GET">
                            <div class="row" id="searchLocator">
                                <div class="autocomplete col-md-9 p-0">
                                    <i class="fas fa-search icon text-center"></i>
                                    <input class="searchLocation" type="text" name="location" id="myInput"
                                        placeholder="Where would you like to ride?">
                                </div>
                                <div class="col-md-3">
                                    <input class="btn list-bike p-1 px-4 w-100" type="submit" value="Search">
                                </div>
                            </div>

                        </form>


                    </section>
                </div>
            </div>
        </header>
        <main class="bg-dark text-light p-4 text-center" id="howItWorks">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 p-4">
                        <h1>How it works</h1>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                    </div>
                    <div class="col-md-4 p-1">
                        <div class="top">
                            <img class="img-Container mb-3" src="../assets/img/locations-on-map.png" alt="">
                        </div>
                        <div class="bottom">
                            <h3 class="box-header fs-21">Search Location</h3>
                            <div class="mt-4">
                                <i class="fas fa-globe border rounded-circle text-warning p-2"></i>
                            </div>
                            <p class="mt-3">Search through thousands of rides all over the Philippines. Search by its cities to</p>
                        </div>

                    </div>
                    <div class="col-md-4 p-1">
                        <div class="top">
                            <img class="img-Container mb-3" src="../assets/img/bicycles-hanging-on-rack-in-store-royalty-free-image-1604673160_.jfif" alt="">
                        </div>
                        <div class="bottom">
                            <h3 class="box-header fs-21">Select Preferred Bicycles</h3>
                            <div class="mt-4">
                                <i class="fas fa-biking border rounded-circle text-warning p-2"></i>
                            </div>
                            <p class="mt-3">Select your preferred bicycles available in your town. </p>
                        </div>


                    </div>
                    <div class="col-md-4 p-1">
                        <div class="top">
                            <img class="img-Container mb-3" src="../assets/img/munbaik-cycling-clothing-9oF4BnJLBo8-unsplash.jpg" alt="">
                        </div>
                        <div class="bottom">
                            <h3 class="box-header fs-21">
                                Get the ride and have fun
                            </h3>
                            <div class="mt-4">
                                <i class="fas fa-user-friends border rounded-circle text-warning p-2"></i>
                            </div>
                            <p class="mt-3">Get and Enjoy the ride with your family, friends or your love ones. Be the one to change the world to a better place. </p>
                        </div>


                    </div>
                    <div class="col-md-12">
                        <a class="btn list-bike" href="#">Browse Location</a>
                    </div>
                    <div class="col-md-12 mt-5">
                        <div class="showcase-bottom">
                            <div class="left-content p-3">
                                <p class="fs-4 pb-0 mb-1">Make money from your under utilized bikes!</p>
                                <p class="pt-0">Make extra cash by sharing your bikes with travelers, racers, and enthusiasts.</p>
                            </div>
                            <div class="right-content">
                                <a class="btn list-bike" style="width: 200px;" href="#">Browse Location</a>
                            </div>

                        </div>
                    </div>

                    <div class="row p-4" id="places">
                        <!-- 1st row -->
                        <div class="col-md-3 box">
                            <a href="#">
                                <img class="img-Container" src="../assets/img/cavite.jpg" alt="cavite">
                            </a>
                            <p class="text-inside">Cavite</p>
                        </div>
                        <div class="col-md-3 box">
                            <a href="#">
                                <img class="img-Container" src="../assets/img/cebu.jpg" alt="cebu">
                            </a>
                            <p class="text-inside">Cebu</p>
                        </div>
                        <div class="col-md-3 box">
                            <a href="#">
                                <img class="img-Container" src="../assets/img/davao.jpg" alt="davao">
                            </a>
                            <p class="text-inside">Davao</p>

                        </div>
                        <div class="col-md-3 box">
                            <a href="#">
                                <img class="img-Container" src="../assets/img/ilocos.jpg" alt="ilocos">
                            </a>
                            <p class="text-inside">Ilocos</p>

                        </div>
                        <!-- 2nd row -->
                        <div class="col-md-3 box">
                            <a href="#">
                                <img class="img-Container" src="../assets/img/laguna.jpg" alt="laguna">
                            </a>
                            <p class="text-inside">Laguna</p>
                        </div>
                        <div class="col-md-3 box">
                            <a href="#">
                                <img class="img-Container" src="../assets/img/manila.jpg" alt="manila">
                            </a>
                            <p class="text-inside">Manila</p>

                        </div>
                        <div class="col-md-3 box">
                            <a href="#">
                                <img class="img-Container" src="../assets/img/pampanga.jfif" alt="pampanga">
                            </a>
                            <p class="text-inside">Pampanga</p>

                        </div>
                        <div class="col-md-3 box">
                            <a href="#">
                                <img class="img-Container" src="../assets/img/batangas.jpg" alt="batangas">
                            </a>
                            <p class="text-inside">Batangas</p>

                        </div>
                        <!-- 3rd row -->

    
                    </div>

                </div>

            </div>

        </main>
        <footer class="footer bg-dark text-light">
            <div class="container border-top pt-4 border-1">
                <div class="row">
                    <div class="col-md-3">
                        <ul class="footer-links">
                            <li><p class="fs-5">Rent a ride</p></li>
                            <li><a class="text-secondary" href="#">Renter FAQ</a></li>
                            <li><a class="text-secondary" href="#">Bike Rentals</a></li>

                        </ul>
                    </div>
                    <div class="col-md-3">
                        <ul class="footer-links">
                            <li><p class="fs-5">List a ride</p></li>
                            <li><a class="text-secondary" href="#">Lister FAQ</a></li>
                        </ul>

                    </div>
                    <div class="col-md-3">
                        <ul class="footer-links">
                            <li><p class="fs-5">About</p></li>
                            <li><a class="text-secondary" href="#">How it works</a></li>
                        </ul>

                    </div>
                    <div class="col-md-3">
                        <ul class="footer-links">
                            <li><p class="fs-5">Connect</p></li>
                            <li><a class="text-secondary" href="#"><i class="fab fa-twitter"></i> Twitter</a></li>
                            <li><a class="text-secondary" href="#"><i class="fab fa-instagram"></i> Instagram</a></li>
                            <li><a class="text-secondary" href="#"><i class="fab fa-facebook"></i> Facebook</a></li>
                        </ul>

                    </div>
                    <div class="col-md-6 text-left">
                        <small>@2021 ezbike</small>
                    </div>
                    <div class="col-md-6 text-end">
                        <small><a class="text-secondary" href="#">Privacy Policy</a></small>
                        <small><a class="text-secondary" href="#">Terms of Use</a></small>

                    </div>
                </div>
            </div>
        </footer>
    </div>

        <?php
            include_once "footer.php";
        ?>
