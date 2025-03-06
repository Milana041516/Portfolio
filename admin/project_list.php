<!DOCTYPE html>
<html lang="en">

<?php

session_start();

if(!isset($_SESSION['username'])) {
    header('Location: login_form.php');
}

require_once('../includes/connect.php');

$stmt = $connect->prepare('SELECT projects.id, title FROM projects ORDER BY id ASC');
$stmt->execute();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project List</title>
    <link rel="stylesheet" href="../css/main.css" type="text/css">
</head>
<body>

    <section class="projects-list-container">
        <h1 class="hidden">Portfolio Project List</h1>
        <h2>My Current Projects</h2>

        <?php
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        echo '<div class="projects-list">
            <p class="project-list-title">'.$row['title'].'</p>
            <a class="project-list-edit-btn" href="edit_project_form.php?id='.$row['id'].'">Edit Project</a>
            <a class="project-list-delete-btn" href="delete_project.php?id='.$row['id'].'">Delete Project</a>
        </div>';
        }

        $stmt = null;
        ?>

        <div class="projects-list-form">
        <h2>This space looks lonely… Add a project!</h2>

            <form action="add_project.php" method="post" enctype="multipart/form-data">

                <label for="title">Project title: </label>
                <input name="title" type="text" required><br><br>

                <label for="img-main">Project image main: </label>
                <input name="img-main" type="file" required><br><br>

                <label for="type">Image type: </label>
                <input name="type" type="text" required><br><br>

                <label for="overview">Project overview: </label>
                <textarea name="overview" required></textarea><br><br>

                <label for="role">Project role & contribution: </label>
                <textarea name="role" required></textarea><br><br>

                <label for="process">Project process: </label>
                <textarea name="process" required></textarea><br><br>
                
                <label for="challenges">Project challenge: </label>
                <textarea name="challenges" required></textarea><br><br>

                <label for="tools_used">Project tools: </label>
                <input name="tools_used" type="text" required><br><br>

                <label for="result">Project result: </label>
                <input name="result" type="text" required><br><br>

                <label for="project_url">Project url(if needed): </label>
                <input name="project_url" type="text"><br><br>

                <label for="categories_id">Project category: </label>
                <input name="categories_id" type="text" required><br><br>

                
                
                <input name="submit" type="submit" value="Add">
            </form>

            <a href="logout.php">Log Out</a>

        </div>

    </section>
    
</body>
</html>