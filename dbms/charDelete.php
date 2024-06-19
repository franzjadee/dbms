<?php 

include "dbCon.php"; 

if (isset($_GET['charName'])) {

    $charName = $_GET['charName'];

    $sql = "DELETE FROM `characterinfo` WHERE charName='$charName'";

     $result = $con->query($sql);

     if ($result == TRUE) {

        header("Location: charList.php");

    }else{

    }

} 

?>