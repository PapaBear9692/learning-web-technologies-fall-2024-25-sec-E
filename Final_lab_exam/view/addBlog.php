<?php
    session_start();
    require_once('../model/blogModel.php');

    if (!isset($_SESSION['loginflag']) || $_SESSION['userType'] != 'user') {
        header('location: login.html');
    }
?>

<html>
    <head>
        <title>Add Blog</title>

        <script>
            function validate() {
                let title = document.getElementById('title').value;
                let description = document.getElementById('description').value;
                let category = document.getElementById('category').value;

                if (title == "" || description == "" || category == "") {
                    alert("Title or Description or Category is empty");
                    return false;
                }
            }
    </head>
    <body>
        <h1 align="center">Add Blog</h1>
        <form action="../controller/addBlogCheck.php" method="post">
            <table align="center">
                <tr>
                    <td>Title:</td>
                    <td><input type="text" name="title"></td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td><textarea name="description" rows="4" cols="50"></textarea></td>
                </tr>
                <tr>
                    <td>Category:</td>
                    <td>
                        <select name="category">
                            <option value="sports">Sports</option>
                            <option value="technology">Technology</option>
                            <option value="personal">Personal</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="addBlog"></td>
                </tr>
            </table>
        </form>
    </body>
</html>