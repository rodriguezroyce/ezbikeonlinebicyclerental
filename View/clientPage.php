<?php
    session_start();
    require_once "header.php";
    require_once "../Model/Database.php";
    require_once "functions.php";
?>
<body>
    <div class="container-fluid">
        <div class="bg-dark top-navigation">
            <div class="d-flex align-items-center">
                <h3 class="text-light"> <a class="text-light" href="index.php">Ezbike</a> </h3>
                <form class="d-flex mx-3" class="mx-2" action="" method="post">
                    <i class="fas fa-map-marker-alt text-light px-3"></i>
                    <input class="form-control searchBtn bg-light text-dark" type="search" name="searchLocation" id="" value="">
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
                    <li><a href="userRegistration.php">Sign up</a></li>
                <?php
       

                    }

                ?>

            </ul>
        </div>
        <div class="cover-page">
            <img class="img-size" src="../assets/img/dmitrii-vaccinium-sw9Vozf6j_4-unsplash.jpg" alt="">
        </div>
        <div class="business-information">
            <div class="container">
                    <div class="row p-3">
                        <div class="col-md-6">
                            <h5 class="ff-2">Molino V Bacoor City 4102</h5>
                        </div>
                        <div class="col-md-2">

                        </div>
                        <div class="col-md-2">

                        </div>
                        <div class="col-md-2">

                        </div>
                    </div>
                </div>
        </div>


    </div>

    <?php
        require_once "footer.php";
    ?>

