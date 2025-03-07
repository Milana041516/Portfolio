<!DOCTYPE html>
<html lang="en">

<?php

session_start();
if(!isset($_SESSION['username'])) {
    header('Location: login_form.php');
}

require_once('../includes/connect.php');
$query = 'SELECT * FROM projects  WHERE projects.id = :projectId';
$stmt = $connect->prepare($query);
$projectId = $_GET['id'];
$stmt->bindParam(':projectId', $projectId, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$mediaQuery = 'SELECT * FROM media WHERE projects_id = :projectId';
$mediaStmt = $connect->prepare($mediaQuery);
$mediaStmt->bindParam(':projectId', $projectId, PDO::PARAM_INT);
$mediaStmt->execute();
$mediaRow = $mediaStmt->fetch(PDO::FETCH_ASSOC);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project List</title>
    <link rel="stylesheet" href="../css/main.css" type="text/css">
</head>
<body>

        <div class="edit-list-form">
            <form action="edit_project.php" method="POST" enctype="multipart/form-data">

                <input name="pk" type="hidden" value="<?php echo $row['id']; ?>">

                <label for="title">Project title: </label>
                <input name="title" type="text" value="<?php echo $row['title']?>" required><br><br>

                <label for="img-main">Project image main: </label>
                <input name="img-main" type="file" required><br><br>

                <label for="type">Image type: </label>
                <input name="type" type="text" value="<?php echo $mediaRow['type']?>" required><br><br>

                <label for="overview">Project overview: </label>
                <textarea name="overview" required><?php echo $row['overview']?></textarea><br><br>

                <label for="role">Project role & contribution: </label>
                <textarea name="role" required><?php echo $row['role']?></textarea><br><br>

                <label for="process">Project process: </label>
                <textarea name="process" required><?php echo $row['process']?></textarea><br><br>
                
                <label for="challenges">Project challenge: </label>
                <textarea name="challenges" required><?php echo $row['challenges']?></textarea><br><br>

                <label for="tools_used">Project tools: </label>
                <input name="tools_used" type="text" value="<?php echo $row['tools_used']?>" required><br><br>

                <label for="result">Project result: </label>
                <input name="result" type="text" value="<?php echo $row['result']?>" required><br><br>

                <label for="project_url">Project url(if needed): </label>
                <input name="project_url" type="text" value="<?php echo $row['project_url']?>"><br><br>

                <label for="categories_id">Project category: </label>
                <input name="categories_id" type="text" value="<?php echo $row['categories_id']?>" required><br><br>

                <input name="submit" type="submit" value="Edit" class="edit-btn">
            </form>

            <?php
            $stmt = null;
            ?>
        </div>
    
        <a href="logout.php" class="logout-btn">Log Out</a>

</body>
</html>