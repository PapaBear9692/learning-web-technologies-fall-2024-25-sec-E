<?php
    
    session_start();
    require_once ('../model/userModel.php');

    if (!isset($_SESSION['loginflag']) || $_SESSION['userType'] != 'user') {
        header('location: login.html');
    }

    $blogs = getAllBlogs();
?>

<html>
    <head>
        <title>User Home</title>
    </head>
    <body>
        <h1 align="center">Welcome User</h1>
        <table align="left" height="100%" border="1">
                
            <tr>
                <td><a href="addBlog.php">Add Blog</a></td>
                <td><a href="../controller/logout.php">Logout</a></td>
            </tr>
        </table>

        <table align="center">
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Category</th>
            </tr>
            <?php
                foreach ($blogs as $blog) {
                    echo "<tr>";
                    echo "<td>".$blog['title']."</td>";
                    echo "<td>".$blog['description']."</td>";
                    echo "<td>".$blog['category']."</td>";
                    echo "</tr>";
                }
            ?>
        </table>

    </body>
</html>