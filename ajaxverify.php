<?php
session_start();
include 'dbconnect.php';
$msg="";


if(empty($_GET['email'])){
    $msg.="<li>Email is required</li>";
}
else
{
$email=strtolower($_GET['email']);
}

if(empty($_GET['otp'])){
    $msg.="<li>OTP is required</li>";
}
else
{
$otp=$_GET['otp'];
}

$query="select * from user";
$res=$conn->query($query);
if(empty($msg)){
if($res->num_rows>0){
    while($row=$res->fetch_assoc()){
        if($row["email"]==$email&&$row["active"]==1){
            echo "VERIFY";
            exit;
        }
         if($row["email"]==$email&&$row["otp"]!=$otp){
            echo "OTP";
            exit;
        } 
       
    }
}
}
if(empty($msg)){

$q1="select * from user";
$r1=$conn->query($q1);
while($rows=$r1->fetch_assoc()){
if($rows["email"]==$email&&$rows["otp"]==$otp){
// <script>
// alert("Your Account Veify Please Login Now!!")
//  document.getElementById("empty").className ="alert alert-danger";
//  document.getElementById("empty").innerHTML="Your Account Veify Please Login Now!!";
 
// </script>
$q2="update user set active='1' where email='$email'";
$r2=$conn->query($q2); 
echo "SUCCESS";
exit;
    
}

}

}
if(empty($msg)){
$msg="EMAIL NOT FOUND";
}
echo $msg;
?>