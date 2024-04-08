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
        
        // print_r($black_list);
//validate 
       if(empty($_GET['file'])) {
        include("include/home.php");
       }else {
        // echo "haha";/
        $black_list= array(
            "/etc/issue",
            "/etc/passwd",
            "/etc/shadow",
            "/etc/group",
            "/etc/hosts",
            "/etc/motd",
            "/proc/[0-9]*/fd/[0-9]*",   
            "/proc/self/environ",
            "/proc/version",
            "/proc/cmdline",
            "/proc/sched_debug",
            "/proc/mounts",
            "/proc/net/arp",
            "/proc/net/route",
            "/proc/net/tcp"
        );
        $path=str_replace("../","",$_GET['file']);
        // echo $path;
        echo "</br>";
        
        foreach($black_list as $item){
            // echo $item;
            echo stripos($path,$item);
            exit();
            // if(stripos($path,$item) >=0 ){
            //     echo "<h3>Hacking detected !</h3>";
            //     echo "</br>";
            // }
        }
        $src = "include/".$path;
        include($src);
       } 
        ?>
    </content>
    <footer>
     <p>&copy; 2022 Your Website. All rights reserved.</p>
    </footer>
</body>
</html>
