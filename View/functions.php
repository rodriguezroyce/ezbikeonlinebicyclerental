<?php

    require_once "../Model/Database.php";
    require_once "../Model/Registration.php";

    function validate($data){
        $data = trim($data);
        $data = htmlspecialchars($data);
        $data = stripslashes($data);
        return $data;
    }
    function redirectTo($location){
        header("Location:".$location);
        exit;
    }
    function isValidEmail($email){
        $regex = "/^[a-zA-Z\d\._]+@[a-zA-Z\d\._]$/";
        if(preg_match($regex,$email)){
            return true;
        }else{
            return false;
        }
    }
    // function used to check email exists
    function checkEmailExists($email){

        $db = new Database();
        $sql = "SELECT Email FROM `tblusers` WHERE `Email`='$email';";
        $db->query($sql);
        $db->resultSet();
        if($db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
        $db->closeStmt();
    }
    function phoneExists($phone){
        $db = new Database();
        $sql = "SELECT MobileNos FROM `tblusers` WHERE `MobileNos`='$phone'";
        $db->query($sql);
        $db->resultSet();
        if($db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
        $db->closeStmt();
    }


    // function used to check 
    function login_attempt($email, $password){
        $db = new Database();
        $registration = new Registration();
        $sql =  "SELECT * FROM `tblusers` WHERE `Email`='$email'";
        $db->query($sql);
        $row = $db->fetchSingle();
        if($row){
            if($registration->password_check($password, $row['Password'])){
                $_SESSION["Email"] = $row["Email"];
                $_SESSION["Password"] = $row["Password"];
                $_SESSION["FirstName"] = $row["FirstName"];
                $_SESSION["LastName"] = $row["LastName"];
                $_SESSION["MobileNos"] = $row["MobileNos"];
                return $row;
            }
        }else{
            return null;
        }
    }

?>