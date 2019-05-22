
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/login.css" />
<link rel="stylesheet" href="css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.css" />
<meta charset='utf-8'/>
<meta content='width=device-width, initial-scale=1' name='viewport'/>
<script>
        function AJAX_VERIFY(){
            var email = document.getElementById("email").value;
            var otp = document.getElementById("otp").value;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function()  {
                if (this.readyState == 4 && this.status == 200) {
                var myObj = this.responseText;
                // alert(myObj);
                var k =myObj.split(" ");
                // alert(k[0]);
                if(this.responseText == "EMAIL"){
 
                        document.getElementById("empty").className ="alert alert-danger";
                        document.getElementById("empty").innerHTML="EMAIL NOT FOUND";
                       
                        
                    }
                else if(this.responseText == "OTP"){
                        
                        document.getElementById("empty").className ="alert alert-danger";
                        document.getElementById("empty").innerHTML="OTP WRONG";
                       
                    }    
                    else if(this.responseText == "VERIFY"){
                      
                        document.getElementById("empty").className ="alert alert-danger";
                        document.getElementById("empty").innerHTML="EMAIL ALREADY VERIFIED";
                        
                    }
                    else if(this.responseText == "SUCCESS"){
                        document.getElementById("empty").className ="alert alert-danger";
                        document.getElementById("empty").innerHTML="VERIFICATION SUCCESS";
                        setTimeout(function(){
                        document.getElementById("email").value="";
                        document.getElementById("otp").value="";
                    location.href="https://trywebethon.000webhostapp.com/login.php";
                },2000)
                        
                    }
                else{
                        document.getElementById("empty").className ="alert alert-danger";
                        document.getElementById("empty").innerHTML="<ul style='padding-left: 30px;margin: 0;'>"+myObj+"<ul>";
                    }   
                
                }
            };
            var url = "ajaxverify.php?email="+email+"&otp="+otp;
            // alert(url)
            xmlhttp.open("GET", url, true);
            xmlhttp.send(); 
         return false;
        }

</script>
</head>
<body>
<?php
include 'dbconnect.php';
if(isset($_GET['email'])){
?> 
<div class="logo">
<center>
<h1 class="logoname" style="margin:0;">Knowledge Hub</h1></center>
<h5 class="logoinfo" style="margin:0;text-align:center">Everything You Want Is Always Here</h5><br/>
</div>
<div class="outsidebox">
<div class="insidebox">

<h5>Enter OTP</h5>
<hr/>
<b>Knowledge Hub Send Verification OTP on Your Registered Email.</b>
<div id="empty"></div>
  <div class="input-container">
<i class="fa fa-envelope icon"></i>
<input type="email" class="input-field fa fa-font" name="email" id="email" placeholder="Email" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{1,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" title="Invalid email address" value='<?php echo $_GET['email'] ?>' disabled/>
</div>
<div id="emailsame"></div>
<div class="input-container" style="margin-bottom:10px;">
<i class="fa fa-key icon"></i>
<input type="text" class="input-field fa fa-font" name="otp" id="otp" placeholder="Enter Valid OTP" />
</div>
<button name="verify" id="verify" class="btn btn-primary" onclick="AJAX_VERIFY()">VERIFY</button>
<label class="btn" id="fp" style="float:right;cursor:default;">Already Have Account?<a href="login.php">Login Here</a></label>
</div>
</div> 
<?php } ?>
</body>
</html>