<?php 
    session_start();
 
    include_once('../src/connection.php');
 
    if (isset($_SESSION['logged_in'])) {
        if (isset($_POST['title'], $_POST['content'])) {
            $title = $_POST['title'];
            $content = nl2br($_POST['content']);

            if (empty($title) or empty($content)) {
                $error = "all fields are requiered!";
            } else {
                $query = $pdo->prepare("INSERT INTO article (title, content, createDate) VALUES (?, ?, ?)");
                $query->bindValue(1, $title);
                $query->bindValue(2, $content);
                $query->bindValue(3, time());

                $query->execute();

                header('Location: index.php');
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

                    <br>
                    <h4>Add Article</h4>
                    <?php if (isset($error)) { ?>
                        <small style="color: #aa0000"><?php echo $error ?></small>
                        <br><br>
                    <?php } ?>
                    <form action="add.php" method="post" autocomplete="off">
                        <input type="text" name="title" placeholder="title" ><br><br>
                        <textarea rows="15" cols="50" name="content" placeholder="content"></textarea>
                        <input type="submit" value="Add Article">
                    </form>

                    <a href="index.php">&larr; back</a>
                </div>
            </body>
        </html>
    
    <?php
    }
    else {
        header('Location: index.php');
    }
?>