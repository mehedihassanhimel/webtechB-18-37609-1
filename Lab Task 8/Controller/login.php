<?php

include "../Model/config.php";

if(isset($_POST['submit'])){

    $userid = mysqli_real_escape_string($con,$_POST['userid']);
    $password = mysqli_real_escape_string($con,$_POST['psw']);

    if ($userid != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from student where id='".$userid."' and password='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            session_start();
            $_SESSION["userid"] = $userid;
            $_SESSION["password"] = $password;
            
           


        // if(!empty($_POST["remember"])) {
	    //     setcookie ("username",$_POST["username"],time()+ 20);
	    //     setcookie ("password",$_POST["password"],time()+ 20);
	    //      echo "Cookies Set Successfuly";
        // } else {
	    //     setcookie("username","");
	    //     setcookie("password","");
	    //     echo "Cookies Not Set";
        // }



          // Login time is stored in a session variable 
              $_SESSION["login_time_stamp"] = time(); 
              header('Location: home1.php');
            // header('Location: loginSession.php');
            exit();

        }
        else{
            echo "Invalid ID or password";
            include '../View/loginV.php';
            
        }

    }  elseif ($userid == "" || $password == ""){
        echo "Input Text Field Empty";
        include '../View/loginV.php';
    }

}