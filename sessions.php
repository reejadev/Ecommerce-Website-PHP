<?php
session_start();

// $_SESSION['username'] = "Reeja";
// $_SESSION['password'] = "coding";
// echo "Session data is saved";
if(isset($_SESSION['views']))
    $_SESSION['views'] = $_SESSION['views']+1;
else
    $_SESSION['views']=1;
      
echo"views = ".$_SESSION['views'];
?>
