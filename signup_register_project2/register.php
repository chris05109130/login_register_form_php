<?php
$errors = array();
// function protectHTML($item){
//   include 'connect.php';
//     return   mysqli_real_escape_string($connection, $item);

// }

function displayErrorsReg($errors){
    foreach($errors as $error){
        echo $error;
    }
}

function validate_reg_form($reg_username, $reg_password, $reg_first_name, $reg_last_name){

        $min = 4;
        $max = 30;

        $reg_username_length= strlen($reg_username);
        $reg_password_length = strlen($reg_password);
        $reg_first_name_length = strlen($reg_first_name);
        $reg_last_name_length = strlen($reg_last_name);

        if($reg_username_length < $min){
            $errors[] = 'Username must be more than 4 characters';
            displayErrorsReg($errors);
        }else if($reg_username_length > $max){
            $errors[] = 'Username can not be more than 30 characters';
            displayErrorsReg($errors);
        }else if($reg_password_length < $min){
            $errors[] = 'Password must be more than 4 characters';
            displayErrorsReg($errors);
        }else if($reg_password_length > $max){
            $errors[] = 'Password can not be more than 30 characters';
            displayErrorsReg($errors);
        }else if($reg_first_name_length < $min){
            $errors[] = 'First Name must be more than 4 Characters';
            displayErrorsReg($errors);
        }else if($reg_first_name_length > $max){
            $erros[] = 'First Name can not be more than 30 characters';
            displayErrorsReg($errors);
        }else if($reg_last_name_length < $min){
            $errors[] = 'Last Name must be more than 4 characters';
            displayErrorsReg($errors);
        }else if($reg_last_name_length > $max){
            $errors[] = 'Last Name can not be more than 30 characters';
            displayErrorsReg($errors);
        }
         


}
function reg_info($reg_username, $reg_password_hash, $reg_first_name, $reg_last_name){
        include 'connect.php';
     

 $query = "SELECT username FROM users 
                                WHERE username = '$reg_username'
                        ";
   if($result = mysqli_query($connection, $query)){
                   
                    if(mysqli_num_rows($result)){
                            if(empty($errors)){
                       echo '';
                        $errors[] = 'Sorry Username is Taken, <a href="index.php">Go back</a> ';
                        
                        displayErrorsReg($errors);
                }
}
                else{
                     
             

       $query = 
                "INSERT INTO users (`username`, `password`, `first_name`, `last_name`)
                VALUES('$reg_username', '$reg_password_hash', '$reg_first_name', '$reg_last_name')";

             if($result = mysqli_query($connection, $query))   {
                  echo 'Registered Successfully <a href="index.php">Click Here</a> to login';
                }
               
                mysqli_close($connection);


                }
                      

                    }
}

        

function register_user(){

if(isset($_POST['reg_username']) && 
   isset($_POST['reg_password']) &&
   isset($_POST['reg_first_name'])&&
   isset($_POST['reg_last_name'])){
    
    
    $reg_username =$_POST['reg_username'];
    $reg_password = $_POST['reg_password'];

 $reg_password_hash = md5($reg_password);

    

    $reg_first_name = $_POST['reg_first_name'];
    $reg_last_name = $_POST['reg_last_name'];

        validate_reg_form($reg_username, $reg_password, $reg_first_name, $reg_last_name);

       


       reg_info($reg_username, $reg_password_hash, $reg_first_name, $reg_last_name);
}}

register_user();
?>