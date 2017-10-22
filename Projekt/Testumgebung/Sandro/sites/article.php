<?php
    include_once('../src/connection.php');
    include_once('../src/article.php');

    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        $article = new Article();
        $data = $article->fetch_data($id);
    ?>

    <html>
        <head>
            <meta charset="utf-8">
            <title>CMS Projekt WS 2017-18</title>
            <link rel="stylesheet" href="../styles/style.css">
        </head>

        <body>
            <div class="container">
                <a href="../index.php" id="logo"><h1>CMS Projekt WS 2017-18</h1></a>        
                <h3>Let's get it started!</h3>

                <h4>
                    <?php echo $data['title'] ?> -
                    <small>
                        <?php echo date('l jS', $data['createDate']) ?>
                    </small>
                </h4>

                <p>
                    <?php echo $data['content'] ?>
                </p>

                <a href="../index.php">&larr; back</a>

            </div>
        </body>
    </html>

    <?php    
    }
    else {
        header('Location: ../index.php');
        exit();
    }
?>