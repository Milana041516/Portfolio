
<?php
$dsn = "mysql:host=localhost;dbname=milanawe16_portfolio;charset=utf8mb4";

try {
    $connect = new PDO($dsn, 'milanawe16_mgabbassova', 'RSMc@041516databaseuser');
} catch (Exception $e){
    error_log($e->getMessage());
    exit('unable to connect');
}
?>