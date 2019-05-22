<?php

    session_start();
    include 'dbconnect.php';
    if(isset($_SESSION['username'])){
header("Location: /"); /* Redirect browser */
  exit();
}
if(isset($_GET['email'])&&isset($_GET['hash'])){
$q1="select email,hash from user where email='$_GET[email]'";
$r1=$conn->query($q1);
while($rows=$r1->fetch_assoc()){
if($_GET['email']==$rows['email']&&$_GET['hash']==$rows['hash']){ ?>
<script>
alert("Your Account Veify Please Login Now!!")
 document.getElementById("empty").className ="alert alert-danger";
 document.getElementById("empty").innerHTML="Your Account Veify Please Login Now!!";
 
</script>
<?php $q2="update user set active='1' where email='$_GET[email]'";
$r2=$conn->query($q2); 
}
else{
echo "something went wrong please try again";
}
}
}

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/login.css" />
<link rel="stylesheet" href="css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.css" />
<meta charset='utf-8'/>
<meta content='width=device-width, initial-scale=1' name='viewport'/>
<style>
    #home {
        font-weight: bold !important;
    background: rgba(12,13,14,0.05) !important;
    color: #0C0D0E !important;
    border-right: 3px solid #F48024 !important;
}
</style>
<script>

        function AJAX_LOGIN(){
            var email = document.getElementById("email").value;
            var pass = document.getElementById("password").value;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function()  {
                if (this.readyState == 4 && this.status == 200) {
                var myObj = this.responseText;
                // alert(myObj);
                // alert(location.href=document.referrer)
                if(this.responseText == "SUCCESS"){
                    // document.getElementById("res").style.display='block';
                        document.getElementById("empty").className ="alert alert-danger";
                         location.href="/";
                        document.getElementById("empty").innerHTML="We Wii redirecting on home page";
                      
                        // document.getElementById("emailsame").style.display='none';
                        //  document.getElementById("pass").style.display='block';
                        
                    }
                else if(this.responseText == "VIEW"){
                        // document.getElementById("emailsame").style.display='block';
                        document.getElementById("empty").className ="alert alert-danger";
                        document.getElementById("empty").innerHTML="INCORRECT DATA";
                       
                        // document.getElementById("res").style.display='none';
                        //  document.getElementById("pass").style.display='none';
                    }    
                 else if(this.responseText == "VERIFY"){
                        // document.getElementById("emailsame").style.display='block';
                        document.getElementById("empty").className ="alert alert-danger";
                        document.getElementById("empty").innerHTML="Your Account Has Need To Verify Please Verify Your Account";
                       
                        // document.getElementById("res").style.display='none';
                        //  document.getElementById("pass").style.display='none';
                    }    
                else{
                        document.getElementById("empty").className ="alert alert-danger";
                        document.getElementById("empty").innerHTML="<ul style='padding-left: 30px;margin: 0;'>"+myObj+"<ul>";
                    }   
                }
            };
            var url = "ajaxlogin.php?email="+email+"&password="+pass;
            // alert(url)
            xmlhttp.open("GET", url, true);
            xmlhttp.send(); 
         return false;
        }

function f(){
var checkemail=document.form1.email.value;
if(checkemail!="")
{
document.getElementById("login").disabled= false;
}
else
{
document.getElementById("login").disabled= true;
}
}

function c(){
var checkbox1=document.getElementById("password");
if(checkbox1.type==="password")
{
	checkbox1.type="text";
}
else{
	checkbox1.type="password";
}

}
</script>
</head>
<body onload="f();">

<?php
// session_start();


// if(isset($_SESSION['username'])){
// header("Location: http://trywebethon.000webhostapp.com/main_forum.php"); /* Redirect browser */
//   exit();
// }
// $conn=new mysqli($servername,$username,$password,$dbname);
//  if($conn->connect_error){
// 	die("Connection Failed".$conn->connect_error);
// }
// if(isset($_REQUEST['login'])){
    
// $email= $_REQUEST['email'];
// $pwd= md5($_REQUEST['password']);
//     $query="select username,email,password from user";
//     $res=$conn->query($query);
// if($res->num_rows>0){
//     while($row=$res->fetch_assoc()){
//     if($row["email"]==$email&&$row["password"]==$pwd){
        
//         $_SESSION["username"]=$row["username"];
//         echo("<script>location.href = 'main_forum.php';</script>");
        
// }
//   else{
//         echo "Incoorect";
//         /*$Incorrectpwd="Incorrect Email/Password you must verify your email";*/
//   }
    
// }
// }
// }
// if(isset($_SESSION["username"])){
//     header('Location:/main_forum.php');
// }
?>
<div class="logo">
<center>
<h1 class="logoname" style="margin:0;">Knowledge Hub</h1></center>
<h5 class="logoinfo" style="margin:0;text-align:center">Everything You Want Is Always Here</h5><br/>
</div>
<div class="outsidebox">
<h5>Login</h5>
<hr/>
<div id="verify"></div>
<div id="empty" style="padding: 10px;color: black;font-weight: 500;"></div>
<!--<div style="margin:0;text-align:center;color:red"><?php echo"$Incorrectpwd"; ?></div>
--><div class="insidebox">
  <div class="input-container">

<i class="fa fa-envelope icon"></i>
<input type="email" class="input-field fa fa-font" name="email" id="email" placeholder="Email or Username" required onkeyup="f();"/></div>
<div class="input-container" style="margin-bottom:10px;">
<i class="fa fa-key icon"></i>
<input type="password" class="input-field fa fa-font" name="password" id="password"  placeholder="Password" required/>
<input type="checkbox" name="checkbox" style="color:black;margin-right:5px;" onclick="c();"/>Show Password
</div>
<button name="login" id="login" class="btn btn-primary" onclick="AJAX_LOGIN()">Login</button>
<label class="btn" style="float:right;"><a href="/forgotpass.php">Forgot Password?</a><span style="margin:0 5px;cursor:default;">Or</span><a href="/register.php">Sign 
Up</a></label>
</div>
</div>

</body>
</html>

