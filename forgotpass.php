<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/login.css" />
<link rel="stylesheet" href="css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.css" />
<meta charset='utf-8'/>
<meta content='width=device-width, initial-scale=1' name='viewport'/>
<script>
function f(){
var checkemail=document.form1.email.value;
if(checkemail!="")
{
document.getElementById("send").disabled= false;
}
else
{
document.getElementById("send").disabled= true;
}
}</script>
</head>
<body onload="f();">

<form id="form1" name="form1" >
<div class="logo">
<center>
<h1 class="logoname" style="margin:0;">Knowledge Hub</h1></center>
<h5 class="logoinfo" style="margin:0;text-align:center">Everything You Want Is Always Here</h5><br/>
</div>
<div class="outsidebox">
<h5>Forgot Password</h5>
<hr/>
<h6>KnowledgeHub will be send password to your email address.</h6>
<div class="insidebox">
  <div class="input-container" style="margin-bottom:10px;">

<i class="fa fa-envelope icon"></i>
<input type="email" class="input-field fa fa-font" name="email" id="email" placeholder="Email Id" required onkeyup="f();"/></div>
<button name="send" style="float:right;" id="send" class="btn btn-primary">Send</button>
<label class="btn" style="cursor:default;padding-left:0">Already Have Account?<a href="login.php">Login 
Here</a></label>
</div>
</div>



</form>
</body>
</html>
