<?php
session_start();
include 'dbconnect.php';

$title=$_REQUEST['title'];
$detail=$_REQUEST['details'];
$category=$_REQUEST['category'];
$cid=$_REQUEST['cid'];
$username=$_SESSION['username'];
// $_SESSION['q']=1;
$datetime=date("d/m/y h:i:s");
if(strlen($title)<15||empty($category))
{
    // echo "<meta http-equiv=Refresh CONTENT='5;URL:https://trywebethon.000webhostapp.com/main_forum.php'>";
    echo "ERROR";
}
else{
    
$sql="INSERT INTO `questions` (`title`, `details`, `category`, `username`, `datetime`) VALUES ('$title','$detail','$category' , '$username','$datetime')";
$result=$conn->query($sql);

// "SELECT * FROM answers WHERE q_id='$id' and (a_id BETWEEN '$cid' AND '$Max_id') ORDER BY a_id DESC";
$query1="SELECT * FROM questions ORDER BY id DESC LIMIT 1";
$result11=$conn->query($query1);
$rows=$result11->fetch_assoc();
$mid=$rows['id'];

$sq2="SELECT * FROM questions WHERE id BETWEEN $cid+1 AND $mid ORDER BY id DESC";
$result1=$conn->query($sq2);
while($rows=$result1->fetch_assoc()){
echo "<div class='que-list'>
    <div class='voting-div'>
    <div class='changes'>
    <div class='check'>
    <div class='count'><span>".$rows['views']."</span><div class='iviews'><i class='fa fa-eye'></i></div></div>
    <div class='textviews' style='margin-top:-23px;font-size: 13px;
    font-weight: 100;
    color: #6a737c;'>views</div>
    </div>
    <!--<div class='count'><span><i class='fa fa-eye'></i></span></div>-->
    <div class='check'>
    <div class='count'><span>".$rows['answers']."</span><div class='ians'><i class='fa fa-comment-o'></i></div></div>
    <div class='textans' style='margin-top:-23px;font-size: 13px;
    font-weight: 100;
    color: #6a737c;'>answers</div>
    </div>
    </div>
    </div>
    <div class='que'>
    <div class='question'>
        <div class='que-title'><a href='view_topic.php?id=".$rows['id']."'>".$rows['title']."</a></div>
    <div class='que-header'>
        <div class='cate'>".$rows['category']."</div>
        <div class='time'>
           Asked By: ".$rows['username']." On ".$rows['datetime']."
        </div>
    </div>
    </div>
    </div>
    </div>";
}
// echo "Your Question Susscessfully Added We Will Redirecting on Your Question Within 3 Second!!<BR>";
// echo "<a href='/'>Click Here To View Your Question</a>";
}
$conn->close();
?>