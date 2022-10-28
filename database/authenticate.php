<?php
include_once "../startConnection.php";
function auth($user , $password){


    $sql = "select 1 from users where email = '$user' and password = '$password'";
    $con = startConnection();
    $result = runSelect($con, $sql);
    if($result!= null){
        $row = $result->fetch_assoc();

        if($row[0]==1){
            echo "authenticated successfully";
        }else{
            echo "authentication failed";
        }
        
        closeConnection($con);
    }
}
?>