<?php
    session_start();
include 'dbconnect.php';
$s=$_REQUEST['s'];
$sql="SELECT * FROM questions where category='$s' ORDER BY id DESC";
    $result=$conn->query($sql);

?>
<link rel = "shortcut icon" href = "https://khub.net/image/company_logo?img_id=71629675&t=1552901653594">
<title><?php echo $s ?> - Knowledge Hub</title>

<link rel="stylesheet" href="css/main1.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.css" />
<meta charset='utf-8'/>
<meta content='width=device-width, initial-scale=1' name='viewport'/>
<style>
/*.sidenav{*/
/*       margin-top: -25px;*/
/*}*/
/*    #side-home {*/
/*        font-weight: bold !important;*/
/*    background: rgba(12,13,14,0.05) !important;*/
/*    color: #0C0D0E !important;*/
/*    border-right: 3px solid #F48024 !important;*/
/*}*/
/*#home{ background-color: #ecf0f1;*/
/*    border: 2px solid red;*/
/*    border-bottom: none;*/
/*    text-decoration:none;*/
/*    font-size:15px;*/
/*    font-weight:400;*/
    
/*}*/
</style>

<div class="main">
<?php include 'd.php'; ?>
<link rel="stylesheet" href="css/bootstrap.css"/>
<div class="container">
    <div class="header-container" style=" margin-top: 10px;">
<div id="queadd"></div>
    <div class="qa-main-heading">
<h1>
Category: <?php echo $s ?>
</h1>
</div>
</div>
<div class="wrapper-que">
    <div id="qadded"></div>
        <div id="added"></div>
<?php

// Start looping table row
if($result->num_rows>0){
while($rows=$result->fetch_assoc()){
?>
<tr>
<div class="que-list">
         <div class="voting-div">
    <div class="changes">
      <div class="check"> 
    <div class="count"><span><?php echo $rows['views']; ?></span><div class="iviews"><i class="fa fa-eye"></i></div></div>
    <div class="textviews" style="margin-top:-23px;font-size: 13px;
    font-weight: 100;
    color: #6a737c;">views</div>
    </div>
    <!--<div class="count"><span><i class="fa fa-eye"></i></span></div>-->
    <div class="check">
    <div class="count"><span><?php echo $rows['answers']; ?></span><div class="ians"><i class="fa fa-comment-o"></i></div></div>
    <div class="textans" style="margin-top:-23px;font-size: 13px;
    font-weight: 100;
    color: #6a737c;">answers</div>
    </div>
    
    </div>
    </div>
    <div class="que">
       
    <div class="question">
        <div class="que-title"><a href="view_topic.php?id=<?php echo $rows['id']; ?>"><?php echo $rows['title']; ?></a></div>
    <div class="que-header">
     <!--<div class="answeradd">-->
     <!--   <button class="btn btn-danger">Answer</button>-->
     <!--   </div>-->
        <div class="cate">
        <?php echo $rows['category']; ?>
        </div>
        <div class="time">
           Asked By: <?php echo $rows['username']; ?> On <?php echo $rows['datetime']; ?>
        </div>
    </div>
    </div>
    </div>
    
    </div>
   </tr>
      



<!--
<div class="que-list">
    
    <div class="que">
    <div class="changes">
    <div class="view">
    <div class="count"><span>0</span></div>
    <div>views</div>
    </div>
    <div class="ans">
    <div class="count"><span>0</span></div>
    <div>views</div>
    </div>
    </div>
    
    <div class="question"><a href="gooogle.com">how to use third party apps in angular elements and deploy it along with js and css when doing a prod build</a></div>
    </div>
    <div class="que-header">
       <div class="answeradd">
        <button class="btn btn-danger">Answer</button>
        </div>
        <div class="cate">
        Technology
        </div>
        <div class="time">
            11/12/2019
        </div>
    </div>
</div>
<div class="desktop-container" style="border-bottom: 1px solid red;">
  <div class="question-container">    
<div class="question-wrapper post" >
    <h2><a href="view_topic.php?id=<?php echo $rows['id']; ?>"><?php echo $rows['topic']; ?></a></h2>
</div>
   <div class="votes">
            <div class="mini-counts"><span><?php echo $rows['view']; ?> view</span></div>
        </div>
        <div class="views">
            <div class="mini-counts"><span><?php echo $rows['reply']; ?> answer</span></div>
    </div>
</div> 
</div>
<div class="mobile-container" style="border-bottom: 1px solid red;">
<div class="mquestion-container post">    
<div class="show-total" >
  
    <div class="ans-count"><i class="fa fa-comment-o"><span><?php echo $rows['reply']; ?></span></i></div>

    <div class="view-count"><i class="fa fa-eye"><span><?php echo $rows['view']; ?></span></i></div>
    </div>
    

<div class="question-wrapper" >
    <h2><a href="view_topic.php#?id=<?php echo $rows['id']; ?>"><?php echo $rows['topic']; ?></a></h2>
    
</div>

</div> 
</div>

-->
<?php

}
}
?>
</div>
 </div>
</div>
<?php
$conn->close();
?>
