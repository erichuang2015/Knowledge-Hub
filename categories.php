<?php
session_start();
//  $servername="localhost";
//  $username="id8956522_web";
//  $password="kamlesh302";
//  $dbname="id8956522_web";
// //$servername="remotemysql.com";
// //$username="IRABGUyt2M";
// //$password="jFxN8GJqm1";
// //$dbname="IRABGUyt2M";
// $conn=new mysqli($servername,$username,$password,$dbname);
// if($conn->connect_error){
// 	die("Connection Failed".$conn->connect_error);
// }
// else{
// //echo "Conmnection Suscess";
// }

include 'dbconnect.php';
?>
<html>
    <head>
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
            /* Label */

    #side-cat {
        font-weight: bold !important;
    background: rgba(12,13,14,0.05) !important;
    color: #0C0D0E !important;
    border-right: 3px solid #F48024 !important;
}
.Label li {
        position: relative;
    overflow: hidden;
    display: inline-block;
    list-style: none;
    margin: 0 2.5px 5px 2.5px;
    padding: 0;
    text-transform: capitalize;
    font-size: 14px;
    /*width: %;*/
    float: left;
}
.Label ul{padding:0}
.Label li a, .Label ul li span {
    background: #4f5c75;
    /* background: #516c84; */
    color: #fdfdfd;
    padding: 8px 12px;
    display: block;
    font-size: 16px;
    transition: initial;
    text-decoration: none;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
    border-radius: 3px;
}

.Label li a:hover{background:#ff2424;color:#fff}
        </style>
    </head>
    <body>
  <div class="main">
    <?php include 'd.php';?>
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
      <div class="qa-main-heading">
<h2>Categories</h2></div>
        <div class='Label' id='Label'>

<ul>
<?php
    // include 'dbconnect.php';

    $sql="select distinct(category) from questions order by category asc";
    $result=$conn->query($sql);
    while($rows=$result->fetch_assoc()){ ?>
<li>
<a href='https://trywebethon.000webhostapp.com/label.php?s=<?php echo $rows['category']; ?>'><?php echo $rows['category']; ?></a>
</li>
<?php }  ?>
</ul>
</div>
    </body>
</html>