<?php
 $servername="localhost";
 $username="database username";
 $password="database password";
 $dbname="database name";
$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
	die("Connection Failed".$conn->connect_error);
}
else{
//echo "Conmnection Suscess";
}
?>