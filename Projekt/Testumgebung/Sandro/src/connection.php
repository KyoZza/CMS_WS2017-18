<?php
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=cms_test;charset=utf8','root','root'); 
    }
    catch(PDOException $e) {
        exit('Database error.');
    }
?>