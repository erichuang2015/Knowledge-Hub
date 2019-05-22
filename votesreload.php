<?php
include 'dbconnect.php';
$tbl_name="answers";
$id=$_GET['id'];
$aid=$_GET['aid'];
$sql3="SELECT a_upvote,a_downvote FROM $tbl_name WHERE q_id='$id' AND a_id='$aid'";
$result3=$conn->query($sql3);
$rows=$result3->fetch_assoc();
// $votes=$rows['upvote'];
    $votes=$rows['a_upvote']-$rows['a_downvote'];
echo $aid.' '.$votes;

?>


