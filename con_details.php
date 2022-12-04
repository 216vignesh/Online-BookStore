<?php

function __construct()
    {
       header('Access-Control-Allow-Origin: *');
       header('Access-Control-Allow-Methods:  GET, POST, PATCH, PUT, DELETE, OPTIONS');
       header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
       header('Content-type:application/json');
       if($_SERVER['REQUEST_METHOD'] == 'OPTIONS'){
         exit;
       }
    }
include('db_connection.php');//make connection here 
if(isset($_POST['submit']))  
{  
    $user_name=$_POST['Name'];//here getting result from the post array after submitting the form.  
    $user_phone = $_POST['Phone'];
    $user_email=$_POST['Email'];//same 
    $user_message=$_POST['Message'];//same
    


    // echo $user_name;

    if($user_name=='')  
    {  
        //javascript use for input checking  
        echo"<script>alert('Please enter the name')</script>";  
exit();//this use if first is not work then other will not show  
    }  
  
  
    if($user_email=='')  
    {  
        echo"<script>alert('Please enter the email')</script>";  
    exit();  
    }  

    $insert_user = "INSERT into Contact(name, phone, email, message) VALUES ('$user_name', '$user_phone', '$user_email', '$user_message')";  
    if(mysqli_query($dbcon,$insert_user))  
    {  
        echo"<script>alert('Details submitted')</script>"; 
        echo ("<SCRIPT LANGUAGE='JavaScript'>
window.location.href='index.html';
</SCRIPT>");

    }


}

?>