
//     $('#sidepanel-toggle').click(function () {
// 		$('#sidenavul').toggleClass('open');
// 		$(this).toggleClass('active');
// 		$(this).find('i').toggleClass('fa fa-arrow-circle-left');
// 	});

<div class="topnav">
 <ul class="navul">
     <li><a href="#">HOME</a></li>
     <li><a href="#">NEWS</a></li>
     <li><a href="#">ABOUT</a></li>
      <li><a href="#">NEWS</a></li>
     <li><a href="#">ABOUT</a></li>
     <?php if(isset($_SESSION['username'])){
        ?><li style="float:right"><a  href="/logout.php">Logout</a></li>
    <?php }
    else{?>
        <li style="float:right"><a  href="/register.php">Register</a></li>
        <li style="float:right"><a href="/login.php">Login</a></li>
    <?php
    }?>
 </ul>     
</div>

<div class="sidenav">
      <ul class="sidenavul">
     <!--<img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="rounded-circle" alt="" width="70%">-->
     <?php if(isset($_SESSION['username'])){
         
         ?>
         <br/>
          <!--<button class="btn btn-danger" style="margin:5px 0 0 0"><?php $uname ?></a></button>-->
          <div class="user-heading">
<h1>
<?php {echo $_SESSION['username'];}?>
</h1>
</div>
         <?php
     }
     else{?>
         <button type="submit" class="btn btn-danger" style="margin:5px 0 0 0"><a  style="color:white;text-

decoration:none;" href="\login.php">Click Here to Login</a></button>
         <?php
     }
     ?>
     <hr style="border-color:white;">
     <li><a href="#">HOME</a></li>
     <li><a href="#">NEWS</a></li>
     <li><a href="#">ABOUT</a></li>
     <li><a href="#">CONTACT</a></li>
 </ul>     
</div>