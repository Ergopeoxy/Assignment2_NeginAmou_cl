<?php


include_once __DIR__."\startConnection.php";
// function getOs(){
  
    
//     $con =  startConnection();
//     //->localConnection();
    
//     //startConnection();
//     $sql = "SELECT * from os"; 
//     $result = runSelect($con , $sql);
//     $html = "";
//     if($result!=null){
//        // echo "reslt wasnt null";
//         while($row = $result->fetch(PDO::FETCH_ASSOC)){
//             $html .= 
//             '<div class="form-check">
//             <input type="radio" name="os" id="os4" class="form-check-input" value="'.$row['os'].'" required>
//             '.$row['os'].' 
//             </div>';
//         }
        
//     }
  
//     $con = null;
//     return $html;

// }





// function getsubList(){

//     //echo "in get sub list";
   
//     $con =  startConnection();
//     //->localConnection();
    
//     //startConnection();
//     $sql = "SELECT  u.user_auto_key as ID , u.fname, u.lname, u.email,  u.phone,  b.sub ,  o.os  FROM user as u, subscription as b , os as o where u.book_auto_key = b.book_auto_key and u.os_auto_key = o.os_auto_key;"; 
//     $result =  runSelect($con , $sql);
//     $html = "";
//     if($result!=null){
//        // echo "result was not null";
//         // echo "reslt wasnt null";
//          while($row = $result->fetch(PDO::FETCH_ASSOC)){
          
//              $html .= '<tr>
//              <td>'.$row['ID'].'</td>
//              <td>'.$row['lname'].'</td>
//              <td>'.$row['fname'].'</td>
//              <td>'.$row['email'].'</td>
//              <td>'.$row['phone'].'</td>
//              <td>'.$row['sub'].'</td>
//              <td>'.$row['os'].'</td>
//            </tr>';


//         //    <th scope="col">ID</th>
//         //    <th scope="col">Last Name</th>
//         //    <th scope="col">First Name</th>
//         //    <th scope="col">E-mail Address</th>
//         //    <th scope="col">Phone Number</th>
//         //    <th scope="col">Book</th>
//         //    <th scope="col">Operating System</th>
//          }
         
//      }
   
 
//      $con = null;
//      return $html;
// }


function addUser($data){
   

  // echo "in add user "; 
  
   $con =  startConnection();
    //->localConnection();
    echo "in add user ";
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
  
    echo $sql;
    $result = runInsert($con , $sql);
    return $result;
}
function addTrademark($data){
   

    echo "in add TRADEMARK "; 
    print_r($data);
     $con =  startConnection();
      //->localConnection();
      echo "in add trademark ";
      //startConnection();
      // $result = addUser([$fname, $lname, $email, $phone,$password ]);
      
  $tname = $data[0];
  $toname = $data[1];
  $ttype =  $data[2];
  $tdesc = $data[3];
  $bnumber =  $data[4];
  $tdesc = $data[5];
  $bnumber =  $data[6];
  $baddress = $data[7];
  $pcode =  $data[8];
  $formFile = isset($data[9]);
  $account = $data[10];
      //add encypt password later
      $sql = "INSERT INTO `trademarks`(`user_auto_key`, `tname`, `toname`, `ttype`, `tdesc`, `bnumber`, `baddress`, `pcode`, `formFile`) VALUES 
     ( 
        (SELECT user_auto_key from users where Email = '$account'),
        '$tname' ,
          '$toname',
          '$ttype' ,
          '$tdesc'  ,
          '$bnumber' ,
          
       
          '$baddress',
          '$pcode' ,
          '$formFile') "; 
    
      echo $sql;
      $result = runInsert($con , $sql);
     
      //also add undare for trade auto key on account of user
    //   $sql2 = "SELECT trade_auto_key from trademarks where tname = '$tname' ";


    //   $result2 = runSelect($con, $sql2);
    //   if($result2 != null){
    //     while($row = $result2->fetch_assoc()){
    //         $trade_auto_key = $row['trade_auto_key'];
    //         $sql3 = "UPDATE `users` SET `trademark_auto_key`='$trade_auto_key' where Email = '$account'";
    //         runUpdate($con, $sql3 );
    //     }
    //   }

    if(is_resource($con)){
        closeConnection($con);
    }
      //if resource closeConnection
      return $result;
  }
  

function authenticate($data){

    $con =  startConnection();
    echo "in get auth ";
    $account = $data[0];
    $password = $data[1];   
    $sql = "Select 1 as result from users where Email = '$account' and Password = '$password'"; 
    echo $sql;
    $result = runSelect($con, $sql);
    if($result!=null){
        $row = $result->fetch_assoc();
        if($row["result"]==1){
            return 1;

        }else{
            return 0;
        }
    }else{
        return 0;
    }
}


function getTrademarks(){
    $con =  startConnection();
    //->localConnection();
    //echo "in get trademark ";


    $sql = "SELECT *, (select email from users where users.user_auto_key = tm.user_auto_key ) as Account from trademarks as tm"; 
    $result =  runSelect($con , $sql);
    $html = "";
    if($result!=null){
       // echo "result was not null";
        // echo "reslt wasnt null";
         while($row = $result->fetch_assoc()){
          //`tname`, `toname`, `ttype`, `tdesc`, `bnumber`, `baddress`, `pcode`, `formFile`
             $html .= '<tr>
             <td>'.$row['Account'].'</td>
             <td>'.$row['tname'].'</td>
             <td>'.$row['toname'].'</td>
             <td>'.$row['ttype'].'</td>
             <td>'.$row['tdesc'].'</td>
             <td>'.$row['bnumber'].'</td>
             <td>'.$row['baddress'].'</td>
             <td>'.$row['pcode'].'</td>
           </tr>';

         }
         
     }
   
 
     $con = null;
     return $html;
}


function getTrademarkList(){

    
   
    $con =  startConnection();
    //->localConnection();
    
    //startConnection();
    $sql = "SELECT * from trademarks "; 
    $result = runSelect($con , $sql);
    $html = '<datalist id="tmarks" name="tmarks">';


    


    if($result!=null){
       // echo "reslt wasnt null";
        while($row = $result->fetch_assoc()){
           
            $html .= 
            '<option value="'.$row['tname'].'"></option>';
        }
        
    }
  
    $html.="</datalist>";
    $con = null;
    return $html;
}

?>