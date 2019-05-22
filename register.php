<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/login.css" />
<link rel="stylesheet" href="css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.css" />
<meta charset='utf-8'/>
<meta content='width=device-width, initial-scale=1' name='viewport'/>
<script>
        function AJAX_BOOM(){
            var un = document.getElementById("username").value;
            var fn = document.getElementById("fname").value;
            var ln = document.getElementById("lname").value;
            var email = document.getElementById("email").value;
            var pass = document.getElementById("password").value;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function()  {
                if (this.readyState == 4 && this.status == 200) {
                var myObj = this.responseText;
                // alert(myObj);
                var k =myObj.split(" ");
                // alert(k[0]);
                if(this.responseText == "USERNAME NOT AVAILABLE"){
                    // document.getElementById("res").style.display='block';
                        document.getElementById("empty").className ="alert alert-danger";
                        document.getElementById("empty").innerHTML="USERNAME NOT AVAILABE";
                        // document.getElementById("emailsame").style.display='none';
                        //  document.getElementById("pass").style.display='block';
                        
                    }
                else if(this.responseText == "EMAIL"){
                        // document.getElementById("emailsame").style.display='block';
                        document.getElementById("empty").className ="alert alert-danger";
                        document.getElementById("empty").innerHTML="EMAIL ALREADY REGISTERED";
                        // document.getElementById("res").style.display='none';
                        //  document.getElementById("pass").style.display='none';
                    }    
                    else if(this.responseText == "PASS"){
                        // document.getElementById("pass").style.display='block';
                        document.getElementById("empty").className ="alert alert-danger";
                        document.getElementById("empty").innerHTML="PASSWORD LENGTH MUST BE 8";
                        // document.getElementById("res").style.display='none';
                        //  document.getElementById("emailsame").style.display='none';
                    }
                    else if(this.responseText == "OTP"){
                    location.href="https://trywebethon.000webhostapp.com/verify.php?email="+email;
                        
                    }
                else{
                        document.getElementById("empty").className ="alert alert-danger";
                        document.getElementById("empty").innerHTML="<ul style='padding-left: 30px;margin: 0;'>"+myObj+"<ul>";
                        if(k[0]=="SUCCESS!!"){
                            // alert("Dasd")
            document.getElementById("username").value="";
            document.getElementById("fname").value="";
            document.getElementById("lname").value="";
            document.getElementById("email").value="";
            document.getElementById("password").value="";}
                    }   
                
                }
            };
            var url = "ajaxregister.php?name="+un+"&fname="+fn+"&lname="+ln+"&email="+email+"&password="+pass;
            // alert(url)
            xmlhttp.open("GET", url, true);
            xmlhttp.send(); 
         return false;
        }
        // function AJAX_EMAIL(){
        //     // var un = document.getElementById("username").value;
        //     // var fn = document.getElementById("fname").value;
        //     // var ln = document.getElementById("lname").value;
        //     var email = document.getElementById("email").value;
        //     // var pass = document.getElementById("password").value;
        //     var xmlhttp = new XMLHttpRequest();
        //     xmlhttp.onreadystatechange = function()  {
        //         if (this.readyState == 4 && this.status == 200) {
        //         var myObj = this.responseText;
        //         alert(myObj);
        //         if(this.responseText == "USERNAME NOT AVAILABLE"){
        //                 document.getElementById("res").className ="alert alert-primary";
        //                 document.getElementById("res").innerHTML="USERNAME NOT AVAILABE";
        //             }
        //         else if(this.responseText == "EMAIL"){
        //                 document.getElementById("emailsame").className ="alert alert-primary";
        //                 document.getElementById("emailsame").innerHTML="EMAIL ALREADY REGISTERED";
        //             }    
        //         // else if(this.responseText == "EMPTY"){
        //         //         document.getElementById("empty").className ="alert alert-primary";
        //         //         document.getElementById("empty").innerHTML="PLEASE FILL ALL DETAILS";
        //         //     }    
        //         }
        //     };
        //     var url = "ajax.php?email="+email;
        //     alert(url)
        //     xmlhttp.open("GET", url, true);
        //     xmlhttp.send(); 
        // return false;
        // }

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
<body>
<?php
include 'dbconnect.php';
// $userlogin="";
// if(isset($_SESSION['username'])){
// echo "logout";
// }
// else{
//     if(isset($_REQUEST['status'])){
//       if($_REQUEST['status']=='regsucess')
//         {
//             $userlogin= "Your Registration Sucessful Please Login";
            
//         }
//     }
// }
// if(isset($_REQUEST['signup'])){

// $fname= $_REQUEST['fname'];
// $lname= $_REQUEST['lname'];
// $username= $_REQUEST['username'];
// $email= $_REQUEST['email'];
// $pwd= md5($_REQUEST['password']);
// $hash=md5(rand(0,1000));
// if($username==''){
//     echo "<html><head><script>alert('Please Enter Name')</script></head></html>";
// }
// else if($email==""){
//     echo "<html><head><script>alert('Please Enter Email')</script></head></html>";
// }
// else if($pwd==""){
//     echo "<html><head><script>alert('Please Enter Password')</script></head></html>";
// }
// else{
//     $query="insert into user (fname,lname,username,email,password,hash) values ('$fname','$lname','$username','$email','$pwd','$hash')";
// if($conn->query($query)==TRUE){

// require_once 'PHPMailer/PHPMailerAutoload.php';
// if(isset($_POST['signup']))
// {
    
// // Fetching data that is entered by the user


// $message='
//   Thanks For Registration!
//   You Can Login Via below link.
//   ----------------------------
//   username='.$username.'
//   password='.$password.'
//   ----------------------------
//   please click below link to activate your account
//   http://www.trywebethon.000webhostapp.com/verify.php?email='.$email.'&hash='.$hash.'';
   
// $mail = new PHPMailer;

// //$mail->SMTPDebug = 3;                               // Enable verbose debug output
// //$mail->isSMTP();                           // Set mailer to use SMTP when use it on localhost
// $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
// $mail->SMTPAuth = true;                               // Enable SMTP authentication
// $mail->Username = 'chaudharykamlesh90679@gmail.com';
// $mail->Password = '';                         // SMTP password
// $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
// $mail->Port = 587;                                    // TCP port to connect to
// $mail->setFrom('chaudharykamlesh90679@gmail.com','Admin');
// $mail->addAddress($email);
//     // Add a recipient;
// $mail->Subject = 'Signup | Verification';
// $mail->Body    = $message;
// // Success or Failure
// if (!$mail->send()) {
// $error = "Mailer Error: " . $mail->ErrorInfo;
// echo '<p id="para">'.$error.'</p>';
// }
// else {
// //echo "<script>window.location='login.php'</script>";
// }
// }
// else{
// echo '<script>alert(Please enter valid data)</script></p>';
// }
 
// }
//     else{
//         echo "Error".$query .$conn->error;
//     }
// }
// }




?> 
<div id="otp">
<div class="logo">
<center>
<h1 class="logoname" style="margin:0;">Knowledge Hub</h1></center>
<h5 class="logoinfo" style="margin:0;text-align:center">Everything You Want Is Always Here</h5><br/>
</div>
<div class="outsidebox">
<div class="insidebox">
<h5>Register</h5>
<hr/>
<!--<div style="color:red;text-align:center"><?php echo"$userlogin"; ?></div>-->
<div id="empty" style="padding: 10px;color: black;font-weight: 500;"></div>
<div class="input-container">

<input type="text" class="input-field fa fa-font" name="fname" id="fname"  placeholder="First Name" />
<input type="text" class="input-field fa fa-font" name="lname" id="lname"  placeholder="Last Name" />
</div>
<div class="input-container">
<i class="fa fa-user icon"></i>
<input type="text" class="input-field fa fa-font" name="username" id="username"  placeholder="Username" />
</div>
<div id="res"></div>
  <div class="input-container">
<i class="fa fa-envelope icon"></i>
<input type="email" class="input-field fa fa-font" name="email" id="email" placeholder="Email" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{1,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" title="Invalid email address"  required/>
</div>
<div id="emailsame"></div>
<div class="input-container" style="margin-bottom:10px;">
<i class="fa fa-key icon"></i>
<input type="password" class="input-field fa fa-font" name="password" id="password" placeholder="Password" />
<input type="checkbox" name="checkbox" style="color:black;margin-right:5px;" onclick="c();"/>Show Password
</div>
<button name="signup" id="signup" class="btn btn-primary" onclick="AJAX_BOOM()">Signup</button>
<label class="btn" id="fp" style="float:right;cursor:default;">Already Have Account?<a href="login.php">Login 

Here</a></label>
</div>
</div> 
</div>
</body>
</html>