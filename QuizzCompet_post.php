<?php 
session_start();

if($_SESSION['indexpatro'] >=$_SESSION['numQuestion']-1 ){
    $_SESSION['competition']=0;
    header('Location: QuizzCompet.php');
}
else{
    if ($_POST['answer']==1){
        $_SESSION['isTrue']++;
    }
    $_SESSION['competition']++;
    header('Location: QuizzCompet.php');
}
?>