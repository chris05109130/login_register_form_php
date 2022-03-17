<?php
$errors = array();
session_start();

function displayErrors($errors){
 
 foreach($errors as $error){
      echo $error;
  }
}


    function login_User(){
        include 'connect.php';

        if(isset($_POST['username'])&&isset($_POST['password'])){
                $username = protectHTML($username =$_POST['username']);
            $password = protectHTML($password = $_POST['password']);

            $password_hash = protectHTML(md5($password));
            

                if(!empty($username)&&!empty($password)){
                   validate_form($username, $password);
                }else{
                    $errors[] =  'Please fill in Username and Password';
                    displayErrors($errors);
                }
            
              $query = "SELECT `id`  FROM users WHERE `username`= '$username' AND `password` = '$password_hash' ";


        if($result = mysqli_query($connection, $query)){
           
           if(mysqli_num_rows($result)){
              $user_id = mysqli_fetch_row($result);

           $_SESSION['user_id'] = $user_id[0];
            header('location: success.php');
         
           }else{
               echo $errors[] = 'Could not find You to log you in have you resigtered? <a href="index.php">Register</a>';
             
           }
    mysqli_free_result($result);

mysqli_close($connection);
        }

        }
 
    }

   function validate_form($username, $password){
       $usernameLength = strlen($username);
        $passwordLength = strlen($password);

    if($usernameLength > 20){
        $errors[] = 'Username can not be more than 20 characters';
        displayErrors($errors);
      
    }else if($usernameLength < 4){
        $errors[] = 'Username has to be at least 4 characters';
        displayErrors($errors);
    }

    if($passwordLength > 45){
        $errors[]  = 'Password Can not be more than 25 characters';
        displayErrors($errors);
     
    }else if($passwordLength < 4 ){
      $errors[]  = 'Password has to be at least 4 characters';
        displayErrors($errors); 


    }
   }

login_User();

?>