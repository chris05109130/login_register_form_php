<?php
session_start();
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
    echo ' Welcome' . ' ' ;
      getField('first_name'). ' ';
        getField('last_name'); 
  
  
    echo ' <a href="logout.php">Logout</a>';
}


function getField($field){
    include 'connect.php';
    $query = "SELECT $field FROM users WHERE id =' " .$_SESSION['user_id']. " ' ";

    if($result = mysqli_query($connection, $query)){
            $row = mysqli_fetch_row($result);
         $row[0];
       echo $cap =' '. ucfirst($row[0]);
         
    }



    mysqli_free_result($result);

    mysqli_close($connection);
}


?>