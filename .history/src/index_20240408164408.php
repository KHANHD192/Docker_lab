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
       if(!isset($_GET['file'])) {
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
            echo stripos($path,$item);
            if(stripos($path,$item) >=0 ){
                echo "<h3>Hacking detected !</h3>";
                echo "</br>";
               echo "
               <div style='
                display: flex;
                justify-content: center;
                align-items: center;
               '>
  <img style='max-width: 300px;
    max-height: 600px;'
   src='https://cdn.xaluannews.com/images/news/Image/2021/04/02/46066908629012.img.jpg'>
</div>
               ";
                die();
            }
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
