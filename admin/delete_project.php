<?php
require_once('../includes/connect.php');

$projectId = $_GET['id'];

$query1 = 'DELETE FROM media WHERE projects_id = :projectId';
$stmt1 = $connect->prepare($query1);
$stmt1->bindParam(':projectId', $projectId, PDO::PARAM_INT);
$stmt1->execute();

$query2 = 'DELETE FROM projects WHERE id = :projectId';
$stmt2 = $connect->prepare($query2);
$stmt2->bindParam(':projectId', $projectId, PDO::PARAM_INT);
$stmt2->execute();

header('Location: project_list.php');
?>