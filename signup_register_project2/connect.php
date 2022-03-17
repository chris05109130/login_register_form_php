<?php

        $host = 'localhost';
        $user = 'root';
        $password = '';
        $database = 'login_register_project_portfolio';


        $connection = mysqli_connect($host, $user, $password, $database);

        if(mysqli_connect_error()){
            echo 'Connection Error';
        }


?>