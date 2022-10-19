<?php

require_once  "./database/startConnection.php";
function getOs(){
  
    $cls = new DatabaseUnix();
    $con = $cls -> initUnixDatabaseConnection();
    //->localConnection();
    
    //startConnection();
    $sql = "SELECT * from os"; 
    $result =  $cls ->selectStm($con , $sql);
    $html = "";
    if($result!=null){
       // echo "reslt wasnt null";
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            $html .= 
            '<div class="form-check">
            <input type="radio" name="os" id="os4" class="form-check-input" value="'.$row['os'].'" required>
            '.$row['os'].' 
            </div>';
        }
        
    }
  
    $con = null;
    return $html;

}


function getSubscribtion(){

    
    $cls = new DatabaseUnix();
    $con = $cls -> initUnixDatabaseConnection();
    //->localConnection();
    
    //startConnection();
    $sql = "SELECT * from subscription"; 
    $result =  $cls ->selectStm($con , $sql);
    $html = '<datalist id="subs" name="subs">';


    


    if($result!=null){
       // echo "reslt wasnt null";
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
           
            $html .= 
            '<option value="'.$row['sub'].'"></option>';
        }
        
    }
  
    $html.="</datalist>";
    $con = null;
    return $html;
}


function getsubList(){

    //echo "in get sub list";
    $cls = new DatabaseUnix();
    $con = $cls -> initUnixDatabaseConnection();
    //->localConnection();
    
    //startConnection();
    $sql = "SELECT  u.user_auto_key as ID , u.fname, u.lname, u.email,  u.phone,  b.sub ,  o.os  FROM user as u, subscription as b , os as o where u.book_auto_key = b.book_auto_key and u.os_auto_key = o.os_auto_key;"; 
    $result =  $cls ->selectStm($con , $sql);
    $html = "";
    if($result!=null){
       // echo "result was not null";
        // echo "reslt wasnt null";
         while($row = $result->fetch(PDO::FETCH_ASSOC)){
          
             $html .= '<tr>
             <td>'.$row['ID'].'</td>
             <td>'.$row['lname'].'</td>
             <td>'.$row['fname'].'</td>
             <td>'.$row['email'].'</td>
             <td>'.$row['phone'].'</td>
             <td>'.$row['sub'].'</td>
             <td>'.$row['os'].'</td>
           </tr>';


        //    <th scope="col">ID</th>
        //    <th scope="col">Last Name</th>
        //    <th scope="col">First Name</th>
        //    <th scope="col">E-mail Address</th>
        //    <th scope="col">Phone Number</th>
        //    <th scope="col">Book</th>
        //    <th scope="col">Operating System</th>
         }
         
     }
   
 
     $con = null;
     return $html;
}


function addUser($data){
   

  // echo "in add user "; 
   $cls = new DatabaseUnix();
   $con = $cls -> initUnixDatabaseConnection();
    //->localConnection();
    
    //startConnection();
   
    $sql = "INSERT INTO `user`(`fname`, `lname`, `email`, `phone`, `book_auto_key`, `os_auto_key`) VALUES 
   (?,?,?,?,(Select b.book_auto_key from subscription as b where b.sub like ?),(Select o.os_auto_key from os as o where o.os like ?)) ON DUPLICATE KEY UPDATE user_auto_key = user_auto_key;"; 
  
    $result = $cls -> insertStm($con , $sql, $data);
    return $result;
}
?>