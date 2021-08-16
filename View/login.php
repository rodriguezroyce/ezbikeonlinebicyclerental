<?php
  
    session_start();
    require_once "header.php";
    require_once "../Model/Registration.php";
    require_once "../Model/Database.php";
    require_once "functions.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST["login"])){
            // user inpu
            $email = validate($_POST["email"]);
            $password = validate($_POST["password"]);

            date_default_timezone_set('Asia/Manila');
            if(empty($email) || empty($password)){
                $_SESSION["login_msg"] = "username or password must not empty";
            }else{
               
                if(login_attempt($email, $password)){
                    redirectTo("search.php");
                    
                }else{
                    $_SESSION["login_msg"] = "invalid username or password";
                    redirectTo("login.php");
                }

            }


        }
    }

?>
<body>

    <div class="container-fluid">
        <section class="signup-page bg-dark text-light">
            <form class="login-form pt-4 pb-4" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <div>
                    <h3> <a class="text-light" href="index.php">Ezbike</a> </h3>
                </div>
                <div class="text-center">
                    <label for="signin">Sign in</label> 
                    <div>
                        <i class="fas fa-user"></i>
                    </div>
                </div>
                <div class="text-center text-danger">
                    <?php
                        if(isset($_SESSION["login_msg"])){
                            echo $_SESSION["login_msg"];
                        }
                    ?>
                </div>
                <div class="mt-2">
                    <input type="text" class="bg-dark form-control text-light" name="email" placeholder="Email">
                    <input type="password" class="bg-dark form-control mt-2 text-light" name="password" placeholder="Password">
                    <input type="submit" class="btn btn-success form-control mt-2" name="login" value="Log in">
                    <p class="text-center mt-2"><a href="#" class="text-secondary">Forgot password? </a> </p>
                    <p class="text-center"><a href="userRegistration.php">Create new account</a></p>
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
