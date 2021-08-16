<?php
    session_start();
    require_once "header.php";
    require_once "functions.php";
    if(isset($_GET["location"])){
        $searchLocation = validate($_GET["location"]);
    }else{
        $searchLocation = validate($_GET["location"]);
    }

?>
<body>
    <div class="container-fluid">
        <div class="bg-dark top-navigation">
            <div class="d-flex align-items-center">
                <h3 class="text-light"> <a class="text-light" href="index.php">Ezbike</a> </h3>
                <form class="d-flex mx-3" class="mx-2" action="" method="post">
                    <i class="fas fa-map-marker-alt text-light px-3"></i>
                    <input class="form-control searchBtn bg-light text-dark" type="search" name="searchLocation" id="" value="<?php echo $searchLocation;?>">
                    <input class="list-bike px-3" type="submit" value="Search">
                </form>
            </div>

            <ul class="top-nav-right">
                <li><a href="index.php#howItWorks">How it works</a></li>
                <?php
                    if(isset($_SESSION["FirstName"])){

                ?>
                    <li><a href="#"><?php echo $_SESSION["FirstName"];?></a></li>
                    <li><a href="logout.php">Log out</a></li>
                <?php
                    }else{

                ?>
                    <li><a href="login.php?searchTerminal=Please login to continue">Login</a></li>
                    <li><a href="#">Sign up</a></li>
                <?php
       

                    }

                ?>

            </ul>
        </div>
        <div class="main-section">
            <div class="column-5">
                <div id="map">

                </div>
            </div>
            <div class="column-7">
                <div class="client-card">
                    <img class="img-fluid" src="../assets/img/dmitrii-vaccinium-sw9Vozf6j_4-unsplash.jpg" alt="">
                    <div class="client-content">
                        <div class="top">

                        </div>
                        <div class="bottom">
                            <div class="left">
                                <h5 class="ff-2">ABC Bicycle Shop</h5>
                                <p class="info"> <span class="text-warning"><a class="btn btn-warning fs-13" href="clientPage.php">View</a></span> | Molino V Bacoor City, Cavite 4103 |</p>
                            </div>
                            <div class="right">
                                <span class="profile">
                                    <img class="img-fluid" src="../assets/img/human-3.jpg" alt="">

                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- sample card 2 -->
                <div class="client-card">
                    <img class="img-fluid" src="../assets/img/christin-hume-zbUH21c9ARk-unsplash.jpg" alt="">
                    <div class="client-content">
                        <div class="top">

                        </div>
                        <div class="bottom">
                            <div class="left">
                                <h5 class="ff-2">DEF Marites Bicycle Shop</h5>
                                <p class="info"> <span class="text-warning"><a class="btn btn-warning fs-13">View</a></span> | Molino V Bacoor City, Cavite 4103 |</p>
                            </div>
                            <div class="right">
                                <span class="profile">
                                    <img class="img-fluid" src="../assets/img/human-2.jpg" alt="">

                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="client-card">
                    <img class="img-fluid" src="../assets/img/pexels-adrien-olichon-2817452.jpg" alt="">
                    <div class="client-content">
                        <div class="top">

                        </div>
                        <div class="bottom">
                            <div class="left">
                                <h5 class="ff-2">GHI Raul Bicycle Shop</h5>
                                <p class="info"> <span class="text-warning"><a class="btn btn-warning fs-13">View</a></span> | Molino V Bacoor City, Cavite 4103 |</p>
                            </div>
                            <div class="right">
                                <span class="profile">
                                    <img class="img-fluid" src="../assets/img/human-1.jpg" alt="">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="client-card">
                    <img class="img-fluid" src="../assets/img/pexels-alexander-dummer-132682.jpg" alt="">
                    <div class="client-content">
                        <div class="top">

                        </div>
                        <div class="bottom">
                            <div class="left">
                                <h5 class="ff-2">Tesla Junior Bicycle Shop</h5>
                                <p class="info"> <span class="text-warning"><a class="btn btn-warning fs-13">View</a></span> | Molino V Bacoor City, Cavite 4103 |</p>
                            </div>
                            <div class="right">
                                <span class="profile">
                                    <img class="img-fluid" src="../assets/img/human-1.jpg" alt="">

                                </span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>


    <script>
        let map;

        function initMap() {
        const manila = { lat: 14.4130, lng: 120.9737};

        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 11,
            center: manila
        });
        const marker = new google.maps.Marker({
            position: manila,
            map: map,
        });

        }
    </script>

    <script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCJxisu_ZHyMeEx7lUvEMl7JYDf85Zpvw4&callback=initMap">
    </script>


    <?php
        require_once "footer.php";
    ?>
