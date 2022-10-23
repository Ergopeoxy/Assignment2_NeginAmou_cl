<?php

require_once  "../database/startConnection.php";
function getOs(){
  
    
    $con =  startConnection();
    //->localConnection();
    
    //startConnection();
    $sql = "SELECT * from os"; 
    $result = runSelect($con , $sql);
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

    
   
    $con =  startConnection();
    //->localConnection();
    
    //startConnection();
    $sql = "SELECT * from subscription"; 
    $result = runSelect($con , $sql);
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
   
    $con =  startConnection();
    //->localConnection();
    
    //startConnection();
    $sql = "SELECT  u.user_auto_key as ID , u.fname, u.lname, u.email,  u.phone,  b.sub ,  o.os  FROM user as u, subscription as b , os as o where u.book_auto_key = b.book_auto_key and u.os_auto_key = o.os_auto_key;"; 
    $result =  runSelect($con , $sql);
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
  
   $con =  startConnection();
    //->localConnection();
    
    //startConnection();
    // $result = addUser([$fname, $lname, $email, $phone,$password ]);
    $fname = $data[0];
    $lname = $data[1];
    $email= $data[2];
    $phone = $data[3];
    $password = $data[4];
    //add encypt password later
    $sql = "INSERT INTO `users`(`FirstName`, `LastName`, `Email`, `Phone`, `Password`) VALUES 
   ('$fname','$lname','$email','$phone','$password') ON DUPLICATE KEY UPDATE user_auto_key = user_auto_key;"; 
  
  //echo $sql;
    $result = runInsert($con , $sql);
    return $result;
}


function getTrademarks(){
    
}
?>