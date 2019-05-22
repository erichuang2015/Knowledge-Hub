<?php
session_start();
session_destroy();
unset($_SESSION['username']);
unset($_SESSION['first']);
unset($_SESSION['q']);
// header("Location:/main_forum.php");
?> 
<script type="text/javascript">javascript:window.location.href = document.referrer</script>
