<?php 
    session_start();
 
    include_once('../src/connection.php');
    include_once('../src/article.php');

    
 
    if (isset($_SESSION['logged_in'])) {
        $article = new Article();
        $articles = $article->fetch_all();

        if(isset($_GET['id'])) {
            $id = $_GET['id'];

            $query = $pdo->prepare("DELETE FROM article WHERE id = ?");
            $query->bindValue(1, $id);

            $query->execute();
            
            header('Location: delete.php');
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

                    <h4>Select an Article to delete</h4>
                    <form action="delete.php" method="get" >
                        <select onchange="this.form.submit();" name="id">
                        <?php foreach ($articles as $article) { ?>
                            <option value="<?php echo $article['id']; ?>">
                                <?php echo $article['title']; ?>
                            </option>
                        <?php } ?>
                        </select>
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