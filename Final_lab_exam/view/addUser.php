<?php
    session_start();

    if (!isset($_SESSION['loginflag']) || $_SESSION['userType'] != 'admin') {
        header('location: login.html');
    }
?>

<html>
    <head>
        <title>Add User</title>

        <script>
            function validate() {
                let username = document.getElementById('username').value;
                let password = document.getElementById('password').value;

                if (username == "" || password == "") {
                    alert("Username or Password is empty");
                    return false;
                }
            }
    </head>
    <body>
        <h1 align="center">Add User</h1>
        <form action="../controller/addUserCheck.php" method="post" onsubmit="return validate()">
            <table align="center">
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="addUser"></td>
                </tr>
            </table>
        </form>
    </body>
</html>