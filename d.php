<style>
/*    .top-bar._fixed {*/
    
/*    min-width: auto;*/
/*    box-shadow: 0 1px 0 rgba(12,13,14,0.1), 0 1px 6px rgba(59,64,69,0.1);*/
/*}*/

#top-bar {
    position: fixed !important;
    top: 0 !important;
    left: 0 !important;
    width: 100% !important;
    background-color: #fafafb !important;
    box-shadow: 0 1px 0 rgba(12,13,14,0.15) !important;
    transition: box-shadow cubic-bezier(.165, .84, .44, 1) .25s !important;
    height: 50px;
        box-sizing: border-box !important;
    font-family: Arial,"Helvetica Neue",Helvetica,sans-serif !important;
    border-top: 3px solid #F48024 !important;
    z-index:999;
}
#menu-logo{
    flex-shrink: 0 !important;
    display: flex !important;
    flex-flow: row nowrap !important;
    align-items: center !important;
    height: 50px!important;
    font-size: smaller !important;
    margin-left: 10px !important;
}
#menu{
        width: 100% !important;
    height: 100% !important;
    margin: 0 auto !important;
    position: relative !important;
    box-sizing: content-box !important;
    display:inline-box;
    /*display: flex !important;*/
    flex-flow: row nowrap !important;
    align-items: center;
}


#menu-logo a {
    color: #415c8e;
    text-decoration: none;
        font-size: 30;
    font-weight: 600;
    /*width: 20% ;*/
}

/*ul.navul{*/
/*        z-index: 2;*/
/*}*/
/*.menu-left{*/
/*    margin-bottom:10px;*/
/*}*/
#menu-left{
  padding: 0 ;
  top:0;
  width: 100%;
  position:fixed ; 
  overflow: hidden ;
      margin-top: 8px !important;
}
    
ul {
  list-style-type: none;
      padding: 0;
}

#navul li {
  float: right;
}

#navul li a {
  display: block ;
  color: black ;
  text-align: center;
  padding: 10px 10px 9px;
  text-decoration: none ;
}

.navul li a:hover:not(.active) {
  /*background-color: #111;*/
}
#navul li a:hover {
    background-color: #ecf0f1;
    border: 2px solid red;
    border-bottom: none;
    text-decoration:none;
    font-size:15px;
    font-weight:400;
}
.sidenav{
    width: 210px;
    padding-top: 24px;
    flex-shrink: 0;
    height: 100%;
    /*position: relative;*/
    background-color:white;
     position: fixed;
    box-shadow: 0 0 0 rgba(12,13,14,0.05);
    transition: box-shadow ease-in-out .1s,transform ease-in-out .1s;
    border-right:2px solid #3498db;
    overflow: auto;
}

.sidenav ul {
  list-style-type: none;
      margin: 10px 0 0 0;
    /*padding: 8px 0px 8 8;*/
    text-align:left;
    width:100%;
    
  /*  width: 190px;*/
  /*background-color: #6f25c1;*/
  /*border-right:5px solid #3498db;*/
}
.sidenavul li {
  list-style-type: none;
    /*padding: 10px 5px;*/
    text-align:left;
    width:100%;
  /*  width: 190px;*/
  /*background-color: #6f25c1;*/
  /*border-right:5px solid #3498db;*/
}
.sidenavul li a {
           display: block;
    padding: 4px;
    padding-left: 30px;
    line-height: 1.8;
    font-size: 13px;
    color: black;
    /* text-align: center; */
    /*padding: 5;*/
    text-decoration: none;
    /*font-weight: bold;*/
    /*background: rgba(12,13,14,0.05);*/
    /*color: #0C0D0E;*/
    /*border-right: 3px solid #F48024;*/
    /* padding: 8px 16px; */
    /* text-decoration: none; */
}

/*.sidenavul li a.active {*/
/*  background-color: #4CAF50;*/
/*  color: white;*/
/*}*/

/*.sidenavul li a:hover:not(.active) {*/
/*  background-color: #555;*/
/*  color: white;*/
/*}*/
.sidenavul li a:hover {
        font-weight: bold;
    background: rgba(12,13,14,0.05);
    color: #0C0D0E;
    border-right: 3px solid #F48024;
}
.yourname{
    text-align:center;
}
@media only screen and (max-width:700px){
   
    /*#top-bar {*/
    /*height: 90px;*/
    /*}*/
    /*#menu-left {*/
    
    /*    margin:45px 0 0 -10% !important;*/
    /*}*/
    /*li{*/
    /*    float:left !important;*/
    /*}*/
    #menu{
           align-items: unset;
    }
    #menu-logo a {
    color: #415c8e;
    text-decoration: none;
        font-size: 28;
    font-weight: 600;
    text-align:center;
}
 #navul li a{
      padding: 10px 10px 11px ;
  } 
}
@media only screen and (max-width:360px){
    #menu-logo{
        margin:0 20% !important;
    }
    #top-bar {
    height: 90px;
    }
    #menu-left {
    
        margin:45px 0 0 -10% !important;
    }
    /*li{*/
    /*    float:left !important;*/
    /*}*/
    #menu{
           align-items: unset;
    }
    #menu-logo a {
    color: #415c8e;
    text-decoration: none;
        font-size: 28;
    font-weight: 600;
    text-align:center;
}
 #navul li a{
      padding: 10px 10px 11px ;
  } 
}
<meta charset='utf-8'/>
<meta content='width=device-width, initial-scale=1' name='viewport'/>
</style>
<div id="top-bar">
    <div id="menu">
        <div id="menu-logo">
            <a href="/">Knowledge Hub</a>
        </div>
        <div id="menu-left">
            <ul id="navul">
     <?php if(isset($_SESSION['username'])){
        ?><li><a  href="/logout.php">Logout</a></li>
    <?php }
    else{?>
        
        <li><a href="/login.php">Login</a></li>
        <li><a  href="/register.php">Register</a></li>
        
    <?php
    }?>
        <li><a  id="home" href="/">Home</a></li>
 </ul>
        </div>
    </div>
</div>

<div class="sidenav">
    <div class="yourname">
        <img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="rounded-circle" alt="" width="70%"><br/>
     <?php if(isset($_SESSION['username'])){
         
         ?>
          <!--<button class="btn btn-danger" style="margin:5px 0 0 0"><?php $uname ?></a></button>-->
          <button type="submit" class="btn btn-danger" style="margin:5px 0 0 0">
<?php {echo $_SESSION['username'];}?>
</button>
         <?php
     }
     else{?>
         <button type="submit" class="btn btn-danger" style="margin:5px 0 0 0"><a  style="color:white;text-

decoration:none;" href="\login.php">Click Here to Login</a></button>
         <?php
     }
     ?>
     </div>
      <ul class="sidenavul">
     <li><a id="side-home" href="/">HOME</a></li>
     <li><a href="#">Knowledge Hub</a></li>
     <li><a id="side-cat" href="/categories.php">Catagories</a></li>
 </ul>     
</div>