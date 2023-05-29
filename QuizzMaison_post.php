<?php 
session_start();

if($_SESSION['index'] >=$_SESSION['numQuestion']-1 ){
    $_SESSION['index']=0;
    header('Location: QuizzMaison.php');
}
else{
    if ($_POST['answer']==1){
        $_SESSION['gryff']++;
    }
    else if ($_POST['answer']==2){
        $_SESSION['slyth']++;
    }
    else if ($_POST['answer']==3){
        $_SESSION['pouf']++;
    }
    else if ($_POST['answer']==4){
        $_SESSION['serd']++;
    }
    $_SESSION['index']++;
    header('Location: QuizzMaison.php');
}
?>