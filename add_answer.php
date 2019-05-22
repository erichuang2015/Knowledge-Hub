<?php
session_start();
include 'dbconnect.php';
$tbl_name="answers";
// $_SESSION['a']=1;
$id=$_POST['id'];


$sql="SELECT MAX(a_id) AS Maxa_id FROM $tbl_name WHERE q_id='$id'";
$result=$conn->query($sql);
$rows=$result->fetch_assoc();

if ($rows) {
$Max_id = $rows['Maxa_id']+1;
}
else {
$Max_id = 1;
}

$a_username=$_SESSION['username'];
$a_answer=$_POST['a_answer']; 

$datetime=date("Y-m-d H:i:s"); 

if(strlen($a_answer)<20){
    echo "ERROR";
    exit();
    
}
else{
$sql2="INSERT INTO $tbl_name(q_id, a_id, a_username, a_answer, a_datetime)VALUES('$id', '$Max_id', '$a_username',  '$a_answer', '$datetime')";
$result2=$conn->query($sql2);
if($result2){
$tbl_name2="questions";
$sql3="UPDATE $tbl_name2 SET answers='$Max_id' WHERE id='$id'";
$result3=$conn->query($sql3);
$cid=$_POST['cid'];
// $datetime=date("d/m/y H:i:s"); 
$sql21="SELECT * FROM answers WHERE q_id='$id' and (a_id BETWEEN $cid+1 AND $Max_id) ORDER BY a_id DESC";
$result21=$conn->query($sql21);
while($rows=$result21->fetch_assoc()){

echo "<div class='details-list'>
    <div class='caret-list'>
    <div class='caret-div'>
       
    <div class='caret-vote'>
        <input type='hidden' value='".$rows['a_id']."' />
    <button name='upvote' id='upvote' value='upvote' onclick='AJAX_VOTESANS(this.value,".$rows['a_id'].")'><i class='fa fa-caret-up' style='font-size:30px'></i></button>
    <div id='sowans-".$rows['a_id']."' style='text-align:center;color: white;
    font-weight: 600;font-size: 25px;'></div>
     <div id='statusans-".$rows['a_id']."' style='text-align:center;font-size: 10px;color: #ffffff;font-weight: 500;'></div>
    <button name='downvote' id='downvote' value='downvote' onclick='AJAX_VOTESANS(this.value,".$rows['a_id'].")'><i class='fa fa-caret-down' style='font-size:30px'></i></button>
    
    </div>
    </div>
    </div>
    <div class='que-details-wrapper'>
        <div class='user-que-details' style='border-bottom:1px solid black;margin-bottom:10px'>

            <span style='font-size:12px;'>answered ".$rows['a_datetime']." ago by ".$rows['a_username']."</span>
        </div>
        
    <div class='que-details'>
        <div class='answers-title'>".$rows['a_answer']."</div>
    </div>
    </div>
    </div>";
}
}
}

$conn->close();
?>