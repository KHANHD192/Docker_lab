<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <!-- Định nghĩa CSS cho header -->
    <style>
        *{
            padding:0;
            margin:0;
        }


        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
        
        nav {
            text-align: center;
            margin-top: 10px;
        }
        
        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        
        nav ul li {
            display: inline;
            margin-right: 10px;
        }
        
        nav ul li a {
            color: #fff;
            text-decoration: none;
        }
        
        nav ul li a:hover {
            text-decoration: underline;
        }
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
<header>
        <h1>Website Title</h1>
        <nav>
            <ul>
                <li><a href="?file=home.php">Home</a></li>
                <li><a href="?file=about.php">About</a></li>
                <li><a href="?file=news.php">News</a></li>
                <li><a href="?file=contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>
    <content>
        <?php
//validate 
       if(empty($_GET)) {
        include("include/home.php");
       }else {
        $path = "include/".$_GET['file'];
        include($path);
       }
        ?>
    </content>
    <footer>
     <p>&copy; 2022 Your Website. All rights reserved.</p>
    </footer>
</body>
</html>
