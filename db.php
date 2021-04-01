<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=fp', 'root', 'root');
} catch (PDOException $exception) {
    die($exception->getMessage('Connection error'));
}

?>
