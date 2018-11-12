<?php
    include_once('db.php');
    $name = $_REQUEST['name'];
    $mat_no = $_REQUEST['mat_no'];
    $level  = $_REQUEST['level'];
    $phone_number = $_REQUEST['phone_number'];
    $group = $_REQUEST['group'];
    session_start();
    $_SESSION['name']=$name;
    $_SESSION['mat_no']=$mat_no;
    $_SESSION['level']= $level;
    $_SESSION['phone_number']=$phone_number;
    $_SESSION['group'] = $group;
    if(!user_Exist($mat_no,$phone_number,$connect)){
        $query = "INSERT into participants (name, mat_no, level, phone_number, debate_group) 
        values ('$name','$mat_no','$level','$phone_number','$group')";
        $query_run = mysqli_query($connect, $query);
        if ($query_run) {
            
            $_SESSION['registration_status'] ="<h3>Thanks $name for your enrollment...! You belong to group $group</h3>";
           header("location:groups.php");
        } 
        else{
            die('mysql query error! pls enroll again');
        }
    }
    else{
            header("location:index.php");
    }
    function user_Exist($mat_no,$phone_number,$connect){
        $query = "SELECT * FROM participants WHERE mat_no = '$mat_no' or phone_number = '$phone_number'" ;
        $result = mysqli_query($connect,$query);
        if(mysqli_num_rows($result)==0){
          return false;
        }else {
            $row = mysqli_fetch_assoc($result);
                    
            if ($row['mat_no']==$mat_no) {
                $_SESSION['errorMsg1'] = "$mat_no already enrolled... change mat. no";
              }   
            if ($row['phone_number']==$phone_number) {
                $_SESSION['errorMsg2']= "$phone_number already enrolled.. change phone number";
              }   
              return true;  
            }
            return false;
        }
?>