<?php
    include_once('src/connection.php');
    include_once('src/article.php');
    
    $article = new Article();
    $articles = $article->fetch_all();
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>CMS Projekt WS 2017-18</title>
        <link rel="stylesheet" href="styles/style.css">
    </head>

    <body>
        <div class="container">
            <a href="index.php" id="logo"><h1>CMS Projekt WS 2017-18</h1></a>        
            <h3>Let's get it started!</h3>

            <ol>
            <?php foreach($articles as $article) { ?> 
                <li>
                    <a href="sites/article.php?id=<?php echo $article['id']; ?>">
                        <?php echo $article['title']; ?>
                    </a> 
                    - <small>
                        posted <?php echo date('l jS', $article['createDate']); ?>
                    </small>
                </li>
            <?php } ?>
            </ol>

            <br>
            <a href="admin">admin</a>
        </div>
    </body>
</html>