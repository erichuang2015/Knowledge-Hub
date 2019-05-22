<?php
session_start();
include 'dbconnect.php';
$msg="";


if(empty($_GET['name'])){
    $msg="<li>Userame is required</li>";
}
else
{
    $name=strtolower($_GET['name']);
}

if(empty($_GET['email'])){
    $msg.="<li>Email is required</li>";
}
else
{
$email=strtolower($_GET['email']);
}

if(empty($_GET['password'])){
    $msg.="<li>Password is required</li>";
}
else
{
$password=$_GET['password'];
}

$query="select * from user";
$res=$conn->query($query);
if(empty($msg)){
if($res->num_rows>0){
    while($row=$res->fetch_assoc()){
        if($row["username"]==$name){
            echo "USERNAME NOT AVAILABLE";
            exit;
        }         
        if($row["email"]==$email){
            echo "EMAIL";
            exit;
        }
    }
}
}
if(empty($msg)){
 if(!preg_match("^[\w]{1,}[\w.+-]{0,}@[\w-]{1,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$^",$email)){
             $msg="EMAIL FORMAT IS WRONG";
        }
else if(strlen($password)<8)
{
    $msg="PASS";
}
else {
$fname= $_REQUEST['fname'];
$lname= $_REQUEST['lname'];
$pwd= md5($_REQUEST['password']);
$hash=md5(rand(0,1000));
$n=6;
function otp($n){
    $d="3562149870";
    $gotp="";
    for($i=1;$i<=$n;$i++){
        $gotp.=substr($d,(rand()%(strlen($d))),1);
    }
    return $gotp;
}
$otp=otp(6);
 $query="insert into user (fname,lname,username,email,password,hash,otp) values ('$fname','$lname','$name','$email','$pwd','$hash','$otp')";
if($conn->query($query)==TRUE){
//   $msg="SUCCESS!! YOUR REGISTRATION SUSSCESSFULLY COMPLETED PLEASE VERIFY YOUR ACCOUNT WE WILL SEND VERIFICATION LINK ON YOUR EMAIL";
   
   require 'PHPMailer/PHPMailerAutoload.php';
   
//   $message='
//   Please click below link to activate your account
//   https://www.guideapps.000webhostapp.com/login.php?email='.$email.'&hash='.$hash.'';
   
$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output
//$mail->isSMTP();                           // Set mailer to use SMTP when use it on localhost
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'your email';
$mail->Password = 'email password';                         // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
$mail->setFrom('email id','Admin');
$mail->addAddress($email);
    // Add a recipient;
$mail->Subject = 'Signup | Verification';
$mail->Body    = 'OTP='.$otp.'';
// Success or Failure
if (!$mail->send()) {
$error = "Mailer Error: " . $mail->ErrorInfo;
echo '<p id="para">'.$error.'</p>';
}

}else{
        echo "Error".$query .$conn->error;
    }
    // $_SESSION['mail']=$email;
   $msg="OTP"; 
}
}
echo $msg;
// $query="select * from user";
// $res=$conn->query($query);
// if($res->num_rows>0){
//     while($row=$res->fetch_assoc()){
//     if(isset($_GET['name'])){
//         $name=$_GET['name'];
//       if($row["username"]==$name){
//             echo "USERNAME NOT AVAILABLE";
//         }
//         }
//     if(isset($_GET['email'])){
// $email=$_GET['email'];
//             if($row["email"]==$email){
//             echo "EMAIL";
//         }
//         }
       
     
//     }
// }
?>