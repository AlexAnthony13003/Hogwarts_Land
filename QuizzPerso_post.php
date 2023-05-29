<?php 
session_start();

if($_SESSION['indexperso'] >=$_SESSION['numQuestion']-1 ){
    $_SESSION['indexperso']=0;
    header('Location: QuizzPersonnage.php');
}
else{
    if ($_POST['answer']==1){
        $_SESSION['harry']++;
    }
    else if ($_POST['answer']==2){
        $_SESSION['ron']++;
    }
    else if ($_POST['answer']==3){
        $_SESSION['hermione']++;
    }
    else if ($_POST['answer']==4){
        $_SESSION['neuville']++;
    }
    else if ($_POST['answer']==5){
        $_SESSION['voldi']++;
    }
    else if ($_POST['answer']==6){
        $_SESSION['drago']++;
    }
    else if ($_POST['answer']==7){
        $_SESSION['dumbi']++;
    }
    else if ($_POST['answer']==8){
        $_SESSION['rog']++;
    }
    else if ($_POST['answer']==9){
        $_SESSION['luna']++;
    }
    else if ($_POST['answer']==10){
        $_SESSION['gin']++;
    }
    $_SESSION['indexperso']++;
    header('Location: QuizzPersonnage.php');
}
?>