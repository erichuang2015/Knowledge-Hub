<?php
session_start();
include 'dbconnect.php';
$tbl_name="questions";
$id=$_GET['id'];

$sql1="SELECT MAX(a_id) AS Maxa_id FROM answers WHERE q_id='$id'";
$result1=$conn->query($sql1);
$rows=$result1->fetch_assoc();
$a_id=$rows['Maxa_id'];

$sql="SELECT * FROM $tbl_name WHERE id='$id'";
$result=$conn->query($sql);
$rows=$result->fetch_assoc();
?>
<link rel = "shortcut icon" href = "https://khub.net/image/company_logo?img_id=71629675&t=1552901653594">
<title><?php echo $rows['title']; ?> - Knowledge Hub</title>
<script>
        function AJAX_VOTES(v){
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function()  {
                if (this.readyState == 4 && this.status == 200) {
                var myObj = this.responseText;
                var k =myObj.split(" ");
                if(k[0]=="VOTED"){
                 document.getElementById("status").innerHTML = k[0];
                document.getElementById("sow").innerHTML = k[1];
                }
                else{
                    document.getElementById("sow").innerHTML = myObj;
                }
                }
            };
            var url = "votes.php?id=<?php echo $id; ?>&name="+v;
            xmlhttp.open("GET", url, true);
            xmlhttp.send(); 
        return false;
        }
        
        function check(){
            var maxaid = '<?php echo $a_id ?>';
             var i;
            for(i=maxaid;i>0;i--)
            {
             var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function()  {
                if (this.readyState == 4 && this.status == 200) {
                var myObj = this.responseText;
                var k =myObj.split(" ");
                document.getElementById("sowans-"+k[0]).innerHTML = k[1];
            // alert(document.getElementById("sowans-"+myObj[0]).innerHTML = k[1]);
                }
            };
           
            var url = "votesreload.php?id=<?php echo $id; ?>&aid="+i;
           
            xmlhttp.open("GET", url, true);
            xmlhttp.send(); 
            }
            // alert(url);
            
        return false;
        }
        // function AJAX(){
        //     var xmlhttp = new XMLHttpRequest();
        //     xmlhttp.onreadystatechange = function()  {
        //         if (this.readyState == 4 && this.status == 200) {
        //         var myObj = this.responseText;
        //         document.getElementById("sowans-<?php $aid ?>").innerHTML = myObj;
        //         }
        //     };
        //     var url = "votesreload.php?id=<?php echo $id; ?>&aid=<?php echo $a_id ?>";
        //     // alert(url);
        //     xmlhttp.open("GET", url, true);
        //     xmlhttp.send(); 
        // return false;
        // }
        function cktext(){
            for(instance in CKEDITOR.instances)
                CKEDITOR.instances[instance].updateElement();
                CKEDITOR.instances[instance].setData('');
        }
        function show(){
           var l  = document.getElementById('editor');
            l.style.display = '';
            var c  = document.getElementById('openeditor');
            c.style.display= 'none';
            var o  = document.getElementById('closeeditor');
            o.style.display= '';
        }
        
        function closee(){
           var l  = document.getElementById('editor');
            l.style.display = 'none';
            var c  = document.getElementById('openeditor');
            c.style.display= '';
            var o  = document.getElementById('closeeditor');
            o.style.display= 'none';
        }
        

        function AJAX_ADDANS(){
        //   alert(aid);
        // alert(document.getElementById("a_answer").value)
        document.getElementById("addans").disabled=true;
        var form = new FormData();
            var a_answer=document.getElementById("a_answer")
            form.append("a_answer",a_answer.value);
            form.append("id",'<?php echo $id ?>');
            form.append("cid",'<?php echo $a_id ?>');
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function()  {
                if (this.readyState == 4 && this.status == 200) {
                var myObj = this.responseText;
                // alert(myObj)
                document.getElementById("addans").disabled=false;
                closee();
                 setTimeout(function(){
                   $(".alert").alert('close');
                },6000)
                    // document.getElementById("res").style.display='block';
                        // document.getElementById("empty").className ="alert alert-danger";
                        
                        
                
                if(myObj!="ERROR"){
                    document.getElementById("empty").innerHTML=myObj;
                    document.getElementById("aadded").innerHTML = "<div class='alert alert-success alert-dismissible'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Answer Successfull Added</strong></div>";
            
                }
                else{
                   document.getElementById("aadded").innerHTML = "<div class='alert alert-success alert-dismissible'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Something went Wrong!! Please Add Your Answer Again!!</strong></div>";
                }
               
                        // location.href = 'view_topic.php?id=<?php echo $id ?>';
                        
                        
                        // document.getElementById("emailsame").style.display='none';
                        //  document.getElementById("pass").style.display='block';
                   

                // else{
                //         document.getElementById("empty").className ="alert alert-danger";
                //         document.getElementById("empty").innerHTML="<ul style='padding-left: 30px;margin: 0;'>"+myObj+"<ul>";
                //     }   
                 
                }
            };
            var url = "add_answer.php";
            // alert(url);
            xmlhttp.open("POST", url, true);
            xmlhttp.send(form); 
        return false;
        }
        
        function AJAX_VOTESANS(v,aid){
        //   alert(aid);
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function()  {
                if (this.readyState == 4 && this.status == 200) {
                var myObj = this.responseText;
                var k =myObj.split(" ");
                if(k[0]=="VOTED"){
                 document.getElementById("statusans-"+aid).innerHTML = k[0];
                document.getElementById("sowans-"+aid).innerHTML = k[1];
                }
                else{
                    document.getElementById("sowans-"+aid).innerHTML = myObj;
                }
                
                }
            };
            var url = "votesans.php?id=<?php echo $id; ?>&name="+v+"&aid="+aid;
            // alert(url);
            xmlhttp.open("GET", url, true);
            xmlhttp.send(); 
        return false;
        }
        

</script>   

<!--<link rel="stylesheet" href="css/main.css"/>-->
<link rel="stylesheet" href="css/main1.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-

awesome/4.5.0/css/font-awesome.css" />
  <script src="https://cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
<meta charset='utf-8'/>
<meta content='width=device-width, initial-scale=1' name='viewport'/>
<?php include 'd.php'; ?>
<link rel="stylesheet" href="css/bootstrap.css"/>
<body onload="AJAX_VOTES(); check()">
 
 <div class="container" style="width:calc(100% - 230px)">
<!-- <input type="submit" name="upvote" value="upvote" onclick="AJAX_VOTES(this.value);"/>-->
<!--<input type="submit" name="downvote" value="downvote" onclick="AJAX_VOTES(this.value);"/>-->

<!--<input type="submit" onclick="check()" />-->
 <div class="qa-main-heading" style="margin-top: 10px;">
<h1>
<div class="que-title"><a href="" style="color:white!important"><?php echo $rows['title']; ?></a></div>
</h1>
</div>
<div class="details-list">
    <!--<div class="que-title"><a href=""><?php echo $rows['title']; ?></a></div>-->
    <div class="caret-list">
    <div class="caret-div">
    <div class="caret-vote">
        
    <button name="upvote" id="upvote" value="upvote" onclick="AJAX_VOTES(this.value);"><i class="fa fa-caret-up" 

style="font-size:35px"></i></button>
    <div id="sow" style="text-align:center"></div>
    <div id="status" style="text-align:center;font-size: 10px;color: #ffffff;font-weight: 500;"></div>
    <button name="downvote" id="downvote" value="downvote" onclick="AJAX_VOTES(this.value);"><i class="fa fa-caret-down" style="font-size:35px"></i></button>
    
    </div>
    </div>
    </div>
    <div class="que-details-wrapper">
    <div class="que-details">
        <div class="details-title"><?php echo $rows['details']; ?></div>
    <div class="que-header">
        <div class="cate">
        <b><?php echo $rows['category']; ?></b>
        </div>
        <div class="time">
           Asked By: <b><?php echo $rows['username']; ?></b> On  <?php echo $rows['datetime'] ?>
        </div>
    </div>
    </div>
    </div>
    
    </div>
        
<div class="qa-main-heading"  style="background-color:#2ecc71!important">
<h1>
<div class="que-title"><?php if(isset($a_id)){echo $a_id;}else{echo 0;} ?> Answers <div ids="s"></div></div>

</h1>

</div>
<!--<div id="empty"></div>-->
<?php if(isset($_SESSION['username'])){ ?>
<button class="btn btn-danger" id="openeditor" style="margin-bottom:5px" onclick="show()">ADD ANSWER</button>
<button class="btn btn-danger" id="closeeditor" style="display:none;margin-bottom:5px" onclick="closee()">CLOSE 

ANSWER EDITOR</button>
<div id="editor" style="display:none">
    <!--<form name="form"  method="post" action="add_answer.php">-->
<textarea name="a_answer" id="a_answer"></textarea>
                <script>
                        CKEDITOR.replace( 'a_answer' );
                </script>
<input name="id" type="hidden" value="<?php echo $id; ?>">
<button type="submit" id="addans" style="margin:5px 0" class="btn btn-danger" onclick="cktext();AJAX_ADDANS()">Submit Answer</button>
<!--</form>-->
</div>

<div id="aadded"></div>
<div id="empty"></div>

<?php 
}else
{
?>


<!--<button class="btn btn-danger" onclick="show()">ANSWER</button>-->
<!--<div id="editor" >-->
<!--<form name="form1" method="post" action="add_answer.php">-->
<!--<textarea name="a_answer" id="a_answer"></textarea>-->
<!--                <script>-->
<!--                        CKEDITOR.replace( 'a_answer' );-->
<!--                </script>-->
<!--<input name="id" type="hidden" value="<?php echo $id; ?>"><br>-->
<!--<button name="submit" class="btn btn-danger">Submit Answer</button>-->
<!--</form>-->
<!--</div>-->
 <div class="qa-main-heading">
<h1>
<div class="que-title" style="font-size:18px">Please <a href="/login.php" style="color:#6affba!important;text-decoration: underline;">Login</a> or <a href="/register.php" style="color:#6affba!important;text-decoration:underline;">Signup</a> for given answer of this question</div>
</h1>
</div>
<?php } ?>
<?php

$tbl_name2="answers";
// $datetime=date("d/m/y H:i:s"); 
$sql2="SELECT * FROM $tbl_name2 WHERE q_id='$id' ORDER BY a_id DESC";
$result2=$conn->query($sql2);
while($rows=$result2->fetch_assoc()){
?>
<div class="details-list">
    <!--<div class="que-title"><a href=""><?php echo $rows['title']; ?></a></div>-->
    <div class="caret-list">
    <div class="caret-div">
       
    <div class="caret-vote">
        <input type="hidden" value="<?php echo $rows['a_id']; ?>" />
    <button name="upvote" id="upvote" value="upvote" onclick="AJAX_VOTESANS(this.value,<?php echo $rows['a_id']; ?>);"><i class="fa fa-caret-up" style="font-size:30px"></i></button>
    <div id="sowans-<?php echo $rows['a_id']; ?>" style="text-align:center;color: white;
    font-weight: 600;font-size: 25px;"></div>
     <div id="statusans-<?php echo $rows['a_id']; ?>" style="text-align:center;font-size: 10px;color: #ffffff;font-weight: 500;"></div>
    <button name="downvote" id="downvote" value="downvote" onclick="AJAX_VOTESANS(this.value,<?php echo $rows['a_id']; ?>);"><i class="fa fa-caret-down" style="font-size:30px"></i></button>
    
    </div>
    </div>
    </div>
    <div class="que-details-wrapper">
        <div class="user-que-details" style="border-bottom:1px solid black;margin-bottom:10px">

            <span style="font-size:12px;">answered <?php echo $rows['a_datetime'] ?> ago by <?php echo $rows

['a_username']?></span>
        </div>
        
    <div class="que-details">
        <div class="answers-title"><?php echo $rows['a_answer']; ?></div>
    </div>
    </div>
    </div>
   




<?php
}



$sql3="SELECT views FROM $tbl_name WHERE id='$id'";
$result3=$conn->query($sql3);
$rows=$result3->fetch_assoc();
$view=$rows['views'];

// if(empty($view)){
// $view=1;
// $sql4="INSERT INTO $tbl_name(views) VALUES('$view') WHERE id='$id'";
// $result4=$conn->query($sql4);
// }

$addview=$view+1;
$sql5="update $tbl_name set views='$addview' WHERE id='$id'";
$result5=$conn->query($sql5);
$conn->close();
?>

<!--<BR>-->
<!--<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">-->
<!--<tr>-->
<!--<form name="form1" method="post" action="add_answer.php">-->
<!--<td>-->
<!--<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">-->
<!--<tr>-->
    <!--<input name="id" type="hidden" value="<?php echo $a_id+1; ?>">-->
<!--<td width="18%"><strong>Name</strong></td>-->
<!--<td width="3%">:</td>-->
<!--<td width="79%"><input name="a_username" type="text" id="a_username" size="45"></td>-->
<!--</tr>-->
<!--<td valign="top"><strong>Answer</strong></td>-->
<!--<td valign="top">:</td>-->
<!--<td><textarea name="a_answer" cols="45" rows="3" id="a_answer"></textarea></td>-->
<!--</tr>-->
<!--<tr>-->
   
<!--<td>&nbsp;</td>-->
<!--<td><input name="id" type="hidden" value="<?php echo $id; ?>"></td>-->
<!--<td><input type="submit" name="Submit" value="Submit"></td>-->
<!--</tr>-->
<!--</table>-->
<!--</td>-->
<!--</form>-->
<!--</tr>-->
<!--</table>-->
<!--</div> -->
    

<!--</body>-->