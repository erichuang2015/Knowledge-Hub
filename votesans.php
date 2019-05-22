<?php
session_start();
include 'dbconnect.php';
$tbl_name="answers";
$msg="";
$id=$_GET['id'];
$aid=$_GET['aid'];
$name=$_GET['name'];
$count=0;
if(isset($_SESSION['username'])){
    $uname=$_SESSION['username'];
    $sql15="select va_name,avote from voteanswer WHERE q_id='$id' AND a_id='$aid'";
$result15=$conn->query($sql15);
while($rows=$result15->fetch_assoc()){
    if($uname==$rows['va_name']&&$rows['avote']==1){
         $msg="Hello";
$sql3="SELECT a_upvote,a_downvote FROM $tbl_name WHERE q_id='$id' AND a_id='$aid'";
$result3=$conn->query($sql3);
$rows=$result3->fetch_assoc();
// $votes=$rows['upvote'];
$votes=$rows['a_upvote']-$rows['a_downvote'];
echo "VOTED ".$votes;
exit;
    }
}
if(empty($msg)){   
if($name=="upvote"){
    $count=1;
$sql1="select a_upvote from $tbl_name WHERE q_id='$id' AND a_id='$aid'";
$result1=$conn->query($sql1);
$rows=$result1->fetch_assoc();
$upvote=$rows['a_upvote'];
$addupvote=$upvote+1;
$sql5="update $tbl_name set a_upvote='$addupvote' WHERE q_id='$id' AND a_id='$aid'";
$result5=$conn->query($sql5);
}
if($name=="downvote"){
    $count=1;
$sql2="select a_downvote from $tbl_name WHERE q_id='$id' AND a_id='$aid'";
$result2=$conn->query($sql2);
$rows=$result2->fetch_assoc();
$downvote=$rows['a_downvote'];
$adddownvote=$downvote+1;
$sql5="update $tbl_name set a_downvote='$adddownvote' WHERE q_id='$id' AND a_id='$aid'";
$result5=$conn->query($sql5);
}
if($count==1){
    $sql10="INSERT INTO voteanswer (q_id,a_id,va_name,avote) values ('$id','$aid','$uname','$count')";
    $conn->query($sql10);
}
}
}
$sql3="SELECT a_upvote,a_downvote FROM $tbl_name WHERE q_id='$id' AND a_id='$aid'";
$result3=$conn->query($sql3);
$rows=$result3->fetch_assoc();
// $votes=$rows['upvote'];
$votes=$rows['a_upvote']-$rows['a_downvote'];
echo "$votes";
?>