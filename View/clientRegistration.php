<?php
  
    session_start();
    require_once "header.php";
    require_once "../Model/Registration.php";
    require_once "library.php";
    include_once "functions.php";
    $register = new Registration();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST["signup"])){

            $regex_name = "/^[a-zA-Z]+$/";
            $mobileLength = strlen($mobile);

        }
    }

?>
<body>

    <div class="container-fluid">
        <section class="signup-page_2 bg-dark text-light">
            <div class="row">
                    <!-- signup -->

            </div>
            <form class="signup-form pt-4 pb-4" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <div class="row" id="signup">
                    <div class="col-md-12 flex-between">
                        <h3><a class="text-light" href="index.php">Ezbike</a> </h3>
                        <button class="btn btn-secondary" id="btnPrevious"> <a href="index.php">X</a>  </button>
                    </div>
                    <div class="col-md-12">
                        <h3 class="text-center ff-2">Client Registration</h3>
                            <?php
                                if(isset($_SESSION["client_msg"])){
                                    echo "<p class=\"text-center text-light bg-danger\">" . $_SESSION["message"] . "</p>";
                                }
                            ?>
                            <div class="text-center">
                            <i class="fas fa-user fa-2x"></i>
                            </div>
                    </div>
                    <!-- personal information -->
                    <div class="col-md-12">
                        <h4>Personal Information</h4>
                        <label for="legalname">Legal Name</label>
                        <br>
                        <small class="text-secondary">This is your full legal name as it appears in any of your government-issued identification documents. Suffixes such as Sr., Jr. or III should be included together with the first name.</small> 
                    </div>
                    <div class="col-md-6 f-col mt-2">
                        <input type="text" name="fname" class="form-control" placeholder="First Name">
                    </div>
                    <div class="col-md-6 f-col mt-2">
                        <input type="text" name="lname" class="form-control" placeholder="Last Name">
                    </div>
                    <div class="col-md-12 mt-3">
                        <h5 class="ff-2">Home Address</h5>
                    </div>
                     <!-- address -->
                    <div class="col-12">
                        <input type="address" name="line1" class="form-control" placeholder="Line 1">
                    </div>
                    <div class="col-12">
                        <input type="address" name="line2" class="form-control" placeholder="Line 2">
                    </div>
                    <div class="col-md-5 mt-2">
                        <input class="form-control" type="text" placeholder="City">
                    </div>
                    <div class="col-md-5 mt-2 p-0">
                        <select class="form-control" name="provinces" id="">
                            <?php
                               for($i=0; $i<count($provinces); $i++){
                            ?>

                            <option value="<?php echo $provinces[$i];?>"> <?php echo $provinces[$i]?> </option>
                            <?php
                               }
                            ?>
                        </select>
                    </div>     
                    <div class="col-md-2 mt-2">
                        <input class="form-control" type="number" placeholder="Zip" min="0">
                    </div>
                    <div class="col-md-12 d-flex justify-content-between mt-3">
                        <h5 class="ff-2 fs-14">Valid Identification Documents</h5>
                        <!-- Button trigger modal -->
                        <button type="button" class="border-0 bg-dark text-info" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        See all Valid Id
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-dark ff-2" id="staticBackdropLabel">List of valid id</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" id="validId">
                                <ul class="text-dark">
                                    <li class="text-success">Primary Id's</li>
                                    <li>Driver's license </li>
                                    <li>SSS ID / UMID ID</li> 
                                    <li>Passport</li> 
                                    <li>Professional Regulation Commission (PRC) ID</li> 
                                    <li>Firearm License</li>  
                                    <li class="text-success">Secondary Id's</li>
                                    <li>NBI Clearance</li>
                                    <li>Police Clearance</li>
                                    <li>PhilHealth ID</li>
                                    <li>Tax Identification Number (ID)</li>
                                    <li>Pag-IBIG ID (Digitized)</li>
                                    <li>Postal ID (Digitized)</li>
                                    <li>Barangay Clearance</li>
                                    <li>Voter's ID</li>
                                </ul>
                            </div>
                            
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <small class="text-secondary"> Please upload one (1) Primary ID or two (2) Secondary IDs (only if you cannot provide a primary ID). To avoid delays in your application, make sure the uploaded IDs are not expired, censored, cropped or blurry.
                        </small>
                    </div>
                    <div class="col-md-12">
                        <input type="file" class="form-control" data-buttonText="Your label here." multiple >
                    </div>
                                
                </div>

            </form>
        </section>
    </div>
    <footer class="bg-dark text-light p-2 text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <small>&copy; Ezbike 2021</small>
                </div>
                <div class="col-md-6">
                    <a class="text-secondary mx-4" href="#">Privacy Policy</a>
                    <a class="text-secondary" href="#">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>

    <?php
        require_once "footer.php";
    ?>
