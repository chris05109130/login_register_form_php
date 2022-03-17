<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Sign Up Project</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>



    <?php
 require 'connect.php';
 require 'login_script.php';
 include 'register.php';
?>



    <div class="form-container">

        <div class="option-choice">

            <ul>
                <li class="login choice active">Login</li>
                <li class="register choice">Register</li>
            </ul>



        </div>

        <div class=" login-form">




            <form action="login_script.php" method="POST">

                <label for="username">Username:</label>
                <input type="text" name="username" class="username">

                <label for="password">Password</label>
                <input type="password" name="password" class="password"><br><br>



                <input type="submit" value="Login!">
            </form>



        </div>



        <div class="register-form">
            <form id="reg_form" action="register.php" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="reg_username" class="username">
                    <label for="password">password</label>
                    <input type="password" name="reg_password" class="password">
                </div>
                <div class="form-group">

                    <label for="first-name">First Name</label>
                    <input type="text" name="reg_first_name" class="firstName">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="reg_last_name" class="lastName">


                </div>

                <input type="submit" value="Register!!!">


            </form>




        </div>

        <script src="back.js"></script>

</body>

</html>