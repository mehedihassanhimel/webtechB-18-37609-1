<?php   
session_start();
  
// To check if session is started.
if(isset($_SESSION["userid"])) 
{
    if(time()-$_SESSION["login_time_stamp"] >600)  
    {
        session_unset();
        session_destroy();
        header("Location:../View/loginV.php");
    }
}
else
{
    header("Location:../View/loginV.php");
}
?> 
<?php
include 'navBar2.php';
$passwordErr = $passwordErrNew = $passwordErrNew2 = "";
?>
<!DOCTYPE HTML>  
<html>
<head>
<link rel = "stylesheet" type="text/css" href="../CSS/changePasswordV2.css">
</head>
<body>  
<div class="form">
<form action="../Controller/changePasswordC2.php" method="post" name="myForm" onsubmit="return validateForm()">

    <label for="pswOld"><b>Current Password:</b></label>
    <input type="password" placeholder="Enter Current Password" id="myPswOld"  onfocus="focusPswOld()" onblur="blurPswOld()" name="pswOld">
    <span class="error">* <?php echo $passwordErr;?></span>
    <p id="pswOldError"></p>
    <label for="pswNew"><b>New Password:</b></label>
    <input type="password" placeholder="Enter New Password" id="myPswNew"  onfocus="focusPswNew()" onblur="blurPswNew()" name="pswNew" >
    <span class="error">* <?php echo $passwordErrNew;?></span>
    <p id="pswNewError"></p>
 
  <label for="pswNew2"><b>Retype New Password:</b></label>
    <input type="password" placeholder="Retype New Password" id="myPswNew2"  onfocus="focusPswNew2()" onblur="blurPswNew2()" name="pswNew2" >
    <span class="error">* <?php echo $passwordErrNew2;?></span>
    <p id="pswNew2Error"></p>
    <br><br>
    <input type="submit" value=Submit>
    <input type="button" class="cancelbtn" value=Cancel>
    <br>

</form>
</div>
<script>
function focusPswOld() {
  document.getElementById("pswOldError").innerHTML = "";
  document.getElementById("myPswOld").style.background = "yellow";
  
}

function blurPswOld() {
  var x = document.forms["myForm"]["pswOld"].value;
  if (x == ""){

  document.getElementById("pswOldError").innerHTML ="<span style='color: red;'>Password must be filled out</span>"; 
  document.getElementById("myPswOld").style.background = "red";
  }
  else if(x.length<8) {
    document.getElementById("pswOldError").innerHTML ="<span style='color: red;'>Password must be at eight characters               </span>"; 
    document.getElementById("myPswOld").style.background = "red";
  }
  // else {
  //   var pass = checkPassword(x);
  //   if(!pass) {
  //     document.getElementById("pswOldError").innerHTML ="<span style='color: red;'>Password must contain min 8 letter password, with at least a symbol, upper and lower case letters and a number</span>"; 
  //     document.getElementById("myPswOld").style.background = "red";
  //   }
  // }
}
function focusPswNew() {
  document.getElementById("pswNewError").innerHTML = "";
  document.getElementById("myPswNew").style.background = "yellow";
  
}
function checkPassword(str)
{
    var re = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    return re.test(str);
}
function blurPswNew() {
  var x = document.forms["myForm"]["pswNew"].value;
  if (x == ""){

  document.getElementById("pswNewError").innerHTML ="<span style='color: red;'>Password must be filled out</span>"; 
  document.getElementById("myPswNew").style.background = "red";
  }
  else if(x.length<8) {
    document.getElementById("pswNewError").innerHTML ="<span style='color: red;'>Password must be at least eight characters</span>"; 
  document.getElementById("myPswNew").style.background = "red";
  }
  // else {
  //   var pass = checkPassword(x);
  //   if(!pass) {
  //     document.getElementById("pswNewError").innerHTML ="<span style='color: red;'>Password must contain min 8 letter password, with at least a symbol, upper and lower case letters and a number</span>"; 
  //     document.getElementById("myPswNew").style.background = "red";
  //   }
  // }
}
function focusPswNew2() {
  document.getElementById("pswNew2Error").innerHTML = "";
  document.getElementById("myPswNew2").style.background = "yellow";
  
}

function blurPswNew2() {
  var x = document.forms["myForm"]["pswNew2"].value;
  if (x == ""){

  document.getElementById("pswNew2Error").innerHTML ="<span style='color: red;'>Password must be filled out</span>"; 
  document.getElementById("myPswNew2").style.background = "red";
  }
  else if(x.length<8) {
    document.getElementById("pswNew2Error").innerHTML ="<span style='color: red;'>Password must be at least eight characters</span>"; 
  document.getElementById("myPswNew2").style.background = "red";
  }
  // else {
  //   var pass = checkPassword(x);
  //   if(!pass) {
  //     document.getElementById("pswNew2Error").innerHTML ="<span style='color: red;'>Password must contain min 8 letter password, with at least a symbol, upper and lower case letters and a number</span>"; 
  //     document.getElementById("myPswNew2").style.background = "red";
  //   }
  // }
}

function validateForm() {
  var a = document.forms["myForm"]["pswOld"].value;
  var b = document.forms["myForm"]["pswNew"].value;
  var c = document.forms["myForm"]["pswNew2"].value;


  if (a == null || a == "" , b == null || b == "", c == null || c == "") {
      alert("Please Fill All Required Field");
      return false;
    }
  else if(a.length<8, b.length<8, c.length<8) {
    alert("Password must be at least eight characters");
  }
 
}
</script>
</body>
<html>