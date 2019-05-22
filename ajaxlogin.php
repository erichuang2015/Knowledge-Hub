<?php
session_start();
include 'dbconnect.php';
$msg="";

if(empty($_GET['email'])){
    $msg.="<li>Email is required</li>";
}
else
{
$email=$_GET['email'];
}

if(empty($_GET['password'])){
    $msg.="<li>Password is required</li>";
}
else
{
$password=md5($_GET['password']);
}
$query="select * from user";
$res=$conn->query($query);
if(empty($msg)){
if($res->num_rows>0){
    while($row=$res->fetch_assoc()){
        if($row["email"]==$email&&$row["password"]==$password){
            if($row['active']==1){
        $_SESSION["username"]=$row["username"];
    //   $str1=$_SESSION['url'];
    //   if(strstr($str1,"view_topic.php"))
    //   {
    //       echo "VIEW";
    //       exit;
    //   }
    //   else{
           echo "SUCCESS";
           exit;
            }
      else{
          echo "VERIFY";
          exit;
      }
           
            
        }
    }
}
}
if(empty($msg)){
    echo "INCORRECT DATA";
}
echo $msg;
?>