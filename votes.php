<?php
session_start();
include 'dbconnect.php';
// $uname=$_SESSION['username'];
$msg="";
$tbl_name="questions";
$id=$_GET['id'];
$name=$_GET['name'];
$count=0;
if(isset($_SESSION['username'])){
$uname=$_SESSION['username'];
$sql15="select v_name,qvote from votequestion WHERE q_id='$id'";
$result15=$conn->query($sql15);
while($rows=$result15->fetch_assoc()){
if($uname==$rows['v_name']&&$rows['qvote']==1){
    $msg="Hello";
$sql3="SELECT upvote,downvote FROM $tbl_name WHERE id='$id'";
$result3=$conn->query($sql3);
$rows=$result3->fetch_assoc();
// $votes=$rows['upvote'];
$votes=$rows['upvote']-$rows['downvote'];
echo "VOTED ".$votes;

    exit;
}
}
if(empty($msg)){
if($name=="upvote"){
    $count=1;
$sql1="select upvote from questions WHERE id='$id'";
$result1=$conn->query($sql1);
$rows=$result1->fetch_assoc();
$upvote=$rows['upvote'];
$addupvote=$upvote+1;
$sql5="update questions set upvote='$addupvote' WHERE id='$id'";
$result5=$conn->query($sql5);
}
if($name=="downvote"){
    $count=1;
$sql2="select downvote from questions WHERE id='$id'";
$result2=$conn->query($sql2);
$rows=$result2->fetch_assoc();
$downvote=$rows['downvote'];
$adddownvote=$downvote+1;
$sql5="update questions set downvote='$adddownvote' WHERE id='$id'";
$result5=$conn->query($sql5);
}
if($count==1){
    $sql10="INSERT INTO votequestion (q_id,v_name,qvote) values ('$id','$uname','$count')";
    $conn->query($sql10);
}
}
}

$sql3="SELECT upvote,downvote FROM $tbl_name WHERE id='$id'";
$result3=$conn->query($sql3);
$rows=$result3->fetch_assoc();
// $votes=$rows['upvote'];
$votes=$rows['upvote']-$rows['downvote'];
echo "$votes";


?>