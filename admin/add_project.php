<?php
require_once('../includes/connect.php');


$random = rand(10000,99999);
$newname = 'image'.$random;

$filetype = strtolower(pathinfo($_FILES['img-main']['name'],PATHINFO_EXTENSION));

if($filetype == 'jpeg') {
    $filetype = 'jpg';
}

if($filetype == 'exe') {
    exit('Nice try');
}

$newname .= '.'.$filetype;

$target_file = '../images/'.$newname;

if (file_exists($target_file)) {
    echo 'Sorry, file already exists.';
    $uploadOk = 0;
}

if(move_uploaded_file($_FILES['img-main']['tmp_name'], $target_file)) {
    $query = "INSERT INTO projects (title, overview, role, process, challenges, tools_used, result, project_url, categories_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $connect->prepare($query);
    $stmt->bindParam(1, $_POST['title'], PDO::PARAM_STR);
    $stmt->bindParam(2, $_POST['overview'], PDO::PARAM_STR);
    $stmt->bindParam(3, $_POST['role'], PDO::PARAM_STR);
    $stmt->bindParam(4, $_POST['process'], PDO::PARAM_STR);
    $stmt->bindParam(5, $_POST['challenges'], PDO::PARAM_STR);
    $stmt->bindParam(6, $_POST['tools_used'], PDO::PARAM_STR);
    $stmt->bindParam(7, $_POST['result'], PDO::PARAM_STR);
    $stmt->bindParam(8, $_POST['project_url'], PDO::PARAM_STR);
    $stmt->bindParam(9, $_POST['categories_id'], PDO::PARAM_INT);


    $stmt->execute();

    $last_id = $connect->lastInsertId();

    $stmt = null;

    $mediaquery = "INSERT INTO media (projects_id, type, image_main) VALUES (?, ?, ?)";

    $stmt2 = $connect->prepare($mediaquery);
    $stmt2->bindParam(1, $last_id, PDO::PARAM_INT);
    $stmt2->bindParam(2, $_POST['type'], PDO::PARAM_STR);
    $stmt2->bindParam(3, $newname, PDO::PARAM_STR);

    $stmt2->execute();

    $stmt2 = null;

    header('Location: project_list.php');
}

?>