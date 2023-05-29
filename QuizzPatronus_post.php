<?php 
session_start();

if($_SESSION['indexpatro'] >=$_SESSION['numQuestion']-1 ){
    $_SESSION['indexpatro']=0;
    header('Location: QuizzPatronus.php');
}
else{
    if ($_POST['answer']==1){
        $_SESSION['cerf']++;
    }
    else if ($_POST['answer']==2){
        $_SESSION['biche']++;
    }
    else if ($_POST['answer']==3){
        $_SESSION['loutre']++;
    }
    else if ($_POST['answer']==4){
        $_SESSION['chien']++;
    }
    $_SESSION['indexpatro']++;
    header('Location: QuizzPatronus.php');
}
?>