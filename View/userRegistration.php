<?php
  
    session_start();
    require_once "header.php";
    require_once "../Model/Registration.php";
    require_once "../Model/Database.php";
    require_once "functions.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST["signup"])){
            // user input
            $fname = validate($_POST["fname"]);
            $lname = validate($_POST["lname"]);
            $email = validate($_POST["email"]);
            $mobile = validate($_POST["mobile"]);
            $password = validate($_POST["password"]);
            $confirmPassword = validate($_POST["confirmPassword"]);

            $regex_name = "/^[a-zA-Z]+$/";
            $mobileLength = strlen($mobile);

            // validation
            if(empty($fname) || empty($lname) || empty($email) || empty($mobile) || empty($password) || empty($confirmPassword)){
                $_SESSION["message"] = "All fields required";
            }else if(!preg_match($regex_name, $fname) || !preg_match($regex_name, $lname)){
                $_SESSION["message"] = "name should not contain any special characters or digits";
            }else if(checkEmailExists($email)){
                $_SESSION["message"] = "email already exists";
                redirectTo("userRegistration.php");
            }else if($mobileLength !=10){
                $_SESSION["message"] = "invalid phone number";   
            }else if(strlen($password) < 8){
                $_SESSION["message"] = "password is too short";
            }else if($password != $confirmPassword){
                $_SESSION["message"] = "password does not match!";
            }else if(phoneExists($mobile)){
                $_SESSION["message"] = "phone already taken. please choose another";
            }
            else{
                $register = new Registration();
                $db = new Database();
                // success validation
                $_SESSION["message"] = "";
                $hashPassword = $register->Password_Encryption($password);
                date_default_timezone_set('Asia/Manila');

                $today = date("F j, Y, g:i a");
                $Token = bin2hex(openssl_random_pseudo_bytes(40));

                $sql = "INSERT INTO `tblusers` (`FirstName`,`LastName`,`Email`,`MobileNos`,`Password`,`Token`,`Date_Created`,`Active`) VALUES (:FIRSTNAME,:LASTNAME,:EMAIL,:MOBILENOS,:PASSWORD,:TOKEN,:DATE_CREATED,:ACTIVE)";
                $db->query($sql);
                $db->bindValues($fname,$lname,$email,$mobile,$hashPassword,$Token,$today,"OFF");
                if($db->execute()){
                    redirectTo("userRegistration.php?success=Successfully Added New Records!");
                    session_unset($_SESSION["message"]);
                }else{
                    echo "unsucessfully added new records";
                }
                $db->closeStmt();
            }
        

        }
    }

?>
<body>

    <div class="container-fluid">
        <section class="signup-page bg-dark text-light">
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
                        
                        <h3 class="text-center ff-2">Sign Up</h3>
                        <div class="text-center mt-4 mb-4">
                        <span class="text-center bg-secondary border rounded-circle p-3">
                            <i class="fas fa-user fa-2x"></i>
                        </span>
                        </div>
                            <?php
                                if(isset($_SESSION["message"])){
                                    echo "<p class=\"text-center text-light bg-danger\">" . $_SESSION["message"] . "</p>";
                                }
                                if(isset($_GET["success"])){
                                   echo "<div class=\"alert alert-success text-center\" role=\"alert\">
                                     Successfully Created Account!
                                    </div> ";
                                    header('Refresh: 3; URL=http://localhost/ezbikerental/View/index.php');
                                }
                            ?>
                            
                    </div>
                    <!-- first name -->
                    <div class="col-md-6 f-col">
                        <label for="fname" class="p-1">
                            First Name
                        </label>
                        <input type="text" name="fname" class="bg-dark text-light" placeholder="Enter First Name" />
                    </div>
                    <!-- last name -->
                    <div class="col-md-6 f-col">
                        <label for="lname" class="p-1">
                            Last Name
                        </label>
                        <input type="text" name="lname" class="bg-dark text-light" placeholder="Enter Last Name" />
                    </div>
                    <!-- email -->
                    <div class="col-md-6 f-col">
                        <label for="email" class="p-1">
                            Email
                        </label>
                        <input type="email" name="email" class="bg-dark text-light" />
                    </div>
                    <!-- mobile -->
                    <div class="col-md-6 f-col">
                        <label for="mobile" class="p-1">
                            Mobile
                        </label>
                        <input type="number" name="mobile" class="bg-dark text-light" placeholder="ex: 9555672612" min="0" />
                    </div>

                    <!-- password -->
                    <div class="col-md-6 f-col">
                        <label for="password" class="p-1">
                            Password
                        </label>
                        <input type="password" name="password" class="bg-dark text-light" />
                    </div>
                    <!-- confirm password -->
                    <div class="col-md-6 f-col">
                        <label for="confirmPassword" class="p-1">
                            Confirm Password
                        </label>
                        <input type="password" name="confirmPassword" class="bg-dark text-light" />
                    </div>
                    <!-- submit button -->
                    <div class="col-md-12 pt-3 f-col">
                        <input type="submit" name="signup" class="btn list-bike text-center" value="Sign up" />
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
