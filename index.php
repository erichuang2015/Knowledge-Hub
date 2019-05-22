<?php
    session_start();
    if(isset($_SESSION['username'])){
        
    if(!isset($_SESSION['first'])){
        $_SESSION['first']=0;
    }
    else{
        $_SESSION['first']=1;
    }
    }
include 'dbconnect.php';
$sqlq="SELECT MAX(id) AS Maxa_id FROM questions";
$resultq=$conn->query($sqlq);
$rows=$resultq->fetch_assoc();
$cid=$rows['Maxa_id'];
$sql="SELECT * FROM questions ORDER BY id DESC";
    $result=$conn->query($sql);

?>
<link rel = "shortcut icon" href = "https://khub.net/image/company_logo?img_id=71629675&t=1552901653594">
<title>Knowledge Hub - EYWIAH</title>

<link rel="stylesheet" href="css/main1.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.css" />
   <script src="https://cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
<meta charset='utf-8'/>
<meta content='width=device-width, initial-scale=1' name='viewport'/>
<style>
    #side-home {
        font-weight: bold !important;
    background: rgba(12,13,14,0.05) !important;
    color: #0C0D0E !important;
    border-right: 3px solid #F48024 !important;
}
#home{ background-color: #ecf0f1;
    border: 2px solid red;
    border-bottom: none;
    text-decoration:none;
    font-size:15px;
    font-weight:400;
    
}
</style>
<script>
    // function checkque(){
    //     var title=document.form1.title.value;
    //     var categories=document.form1.categories.value;
        
    //     if(title.length<15){
    //          document.getElementById("res").className ="alert alert-primary";
    //          document.getElementById("res").innerHTML="TITLE LENGTH MUST BE 15";
    //       return false;
    //     }
    // //   if(catagories.length<0)
    // //     {
    // //         document.getElementById("rescat").className ="alert alert-primary";
    // //          document.getElementById("rescat").innerHTML="MUST ADD CATEGORY";
    // //         return false;
    // //     }
    //     return true;
    // }
   function cktext(){
            for(instance in CKEDITOR.instances)
                CKEDITOR.instances[instance].updateElement();
                CKEDITOR.instances[instance].setData('');
        }
    function AJAX_ADD(){
        // alert("RUN")
         
             var form = new FormData();
             var cid='<?php echo $cid ?>'
            var title = document.getElementById("title");
            var details = document.getElementById("details");
            var category = document.getElementById("categories");
            form.append("title",title.value);
            form.append("details",details.value);
            form.append("category",category.value);
            form.append("cid",cid);
            
            var c=0;
            if(title.value.length<15){
             document.getElementById("res").className ="alert alert-primary";
             document.getElementById("res").innerHTML="TITLE LENGTH MUST BE 15";
            //  c=1;
            
            return;
            }
          if(category.value.length<2){
                 document.getElementById("res").className ="alert alert-primary";
             document.getElementById("res").innerHTML="MUST BE ADD CATEGORY";
            //  c=1;
            return;
            }
           
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function()  {
                if (this.readyState == 4 && this.status == 200) {
                var myObj = this.responseText;
                // var k=myObj.split(" ");
                // alert(myObj);
                
               
                    if(myObj!="ERROR"){
                     document.getElementById("added").innerHTML = myObj;
                    document.getElementById("qadded").innerHTML = "<div class='alert alert-success alert-dismissible'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Question Successfull Added</strong></div>";
            
                }
                else{
                   document.getElementById("qadded").innerHTML = "<div class='alert alert-success alert-dismissible'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Something went Wrong!! Please Add Your Question Again!!</strong></div>";
                }
                setTimeout(function(){
                    $("#myModal").modal('hide');
                    document.getElementById("title").value="";
                    document.getElementById("details").value="";
                    document.getElementById("categories").value="";
                },1000)
                setTimeout(function(){
                    $("#myalert").alert('close');
                },6000)
                }
                
            };
            // var url = "add_question.php?title="+title+"&details="+details+"&category="+category+"&cid="+cid;
            //  alert(form.get("details"));
            xmlhttp.open("POST","add_question.php", true);
            // xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send(form); 
        return false;
        
    } 
</script>
<!--<script>-->
       
<!--</script> -->

<div class="main">
<?php include 'd.php'; ?>
<link rel="stylesheet" href="css/bootstrap.css"/>
<div class="container">
    <div class="header-container">
 <button type="button" class="btn btn-primary" style="    margin-bottom: 5px;
    margin-top: 10px;" data-toggle="modal" data-target="#myModal" data-backdrop="static">
    Add a Question
  </button>
<?php if(isset($_SESSION['username'])){ ?>
  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Ask a Question</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<!--<form id="form1" name="form1" method="post" action="add_question.php" onsubmit="return checkque()">-->
<!--<label><b>Title:</b></label>-->
<!--<input class="form-control" type="text" name="title" id="title" required/>-->
<!--<div id="res"></div>-->
<!--<label><b>Body:</b></label>-->
<!--<textarea class="form-control" name="details" id="details" rows="5" required></textarea>-->
<!--<label><b>Categories:</b></label>-->
<!--<input class="form-control" type="text" name="categories" id="categories" required/>-->
<!-- <div id="rescat"></div>-->
<form id="form1" name="form1" method="post">
    <div id="res"></div>
<label><b>Title:</b></label>
<input class="form-control" type="text" name="title" id="title" required/>
<label><b>Body:</b></label>
<!--<textarea class="form-control" name="details" id="details" rows="5" required></textarea>-->
<textarea name="details" id="details"></textarea>
                <script>
                        CKEDITOR.replace( 'details' );
                </script>
<label><b>Categories:</b></label>
<input class="form-control" type="text" name="categories" id="categories" required/>
 </form>
</tr>
</table>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button name="add" id="add" class="btn btn-danger" onclick="cktext();AJAX_ADD()">ADD</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>   
  <?php }
  else
  {
   ?>
     <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Login</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form id="form1" name="form1" method="post" action="login.php">
   <p> You can't Ask a question!!</p>
    <p>Please Login via below link after then you ask your question !!</p>
  <button name="add" id="add" class="btn btn-danger">Click Here to Login</button>
</tr>
</table>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
</form>        
      </div>
    </div>
  </div>  
 <?php } ?>
<?php if(isset($_SESSION['username'])&&$_SESSION['first']==0){echo   "<div class='alert alert-success alert-dismissible'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Welcome Back !! ".$_SESSION['username']."</strong></div>";}else if(!isset($_SESSION['username'])){echo "<div class='alert alert-success alert-dismissible'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Please Login For Get More Features!!</strong></div>";}?>
<div id="queadd"></div>
    <div class="qa-main-heading">
<h1>
Latest Question 
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
