<?php 
    session_start();

    include_once('../src/connection.php');

    if (isset($_SESSION['logged_in'])) {
    ?>    

        <html>
            <head>
                <meta charset="utf-8">
                <title>CMS Projekt WS 2017-18</title>
                <link rel="stylesheet" href="../styles/style.css">
            </head>

            <body>
                <div class="container">
                    <a href="index.php" id="logo"><h1>CMS Projekt WS 2017-18</h1></a>        
                    <h3>Let's get it started!</h3>

                    <br>
                    <ol>
                        <li><a href="add.php">Add Article</a></li>
                        <li><a href="delete.php">Delete Article</a></li>
                        <li><a href="../index.php">View Website</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ol>
                </div>
            </body>
        </html>

    <?php
    } else {
        if (isset($_POST['username'], $_POST['password'])) {
            $username = $_POST['username'];
            $password = md5($_POST['password']);
        
            if (empty($username) or empty($username)) {
                $error = "all fields are requiered!";
            }
            else {
                $query = $pdo->prepare("SELECT * FROM user WHERE name = ? AND password = ?");
                $query->bindValue(1, $username);
                $query->bindValue(2, $password);

                $query->execute();

                $num = $query->rowCount();
                
                if ($num == 1) {
                    $_SESSION['logged_in'] = true;
                    header('Location: index.php');
                    exit();
                } else {
                    $error = "incorrect details!";
                }
                
            }
        }    
    ?>
        
        <html>
            <head>
                <meta charset="utf-8">
                <title>CMS Projekt WS 2017-18</title>
                <link rel="stylesheet" href="../styles/style.css">
            </head>

            <body>
                <div class="container">
                    <a href="index.php" id="logo"><h1>CMS Projekt WS 2017-18</h1></a>        
                    <h3>Let's get it started!</h3>

                    <br><br>
                    <?php if (isset($error)) { ?>
                        <small style="color: #aa0000"><?php echo $error ?></small>
                        <br><br>
                    <?php } ?>
                    <form action="index.php" method="post" autocomplete="off">
                        <input type="text" name="username" placeholder="Username">
                        <input type="password" name="password" placeholder="Password">
                        <input type="submit" value="Login">
                    </form>
                </div>
            </body>
        </html>
        
        
        <?php
    }
    
?>