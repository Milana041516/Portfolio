<!DOCTYPE html>
<html lang="en">
<?php
require_once('includes/connect.php');

$query1 = 'SELECT projects.id AS project, title, overview, role, process, challenges, tools_used, result, project_url, image_main, GROUP_CONCAT(image_gallery) AS images FROM projects, media WHERE media.projects_id = projects.id AND projects.categories_id = 1 AND projects.id = :projectid';
$query2 = 'SELECT projects.id AS project, title, tools_used, project_url, url, alt_text, image_main, overview, categories_id FROM projects, media, categories WHERE media.projects_id = projects.id AND projects.categories_id = categories.id';

$stmt1 = $connect->prepare($query1);
$stmt2 = $connect->prepare($query2);
$projectid = $_GET['id'];


$stmt1->bindParam(':projectid', $projectid, PDO::PARAM_INT);
$stmt1->execute();
$stmt2->execute();


$row1 = $stmt1->fetch(PDO::FETCH_ASSOC);
$image_array = explode(',',$row1['images']);

$projects = [];

while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
    $projects[] = $row2; 
}

$stmt1 = null;
$stmt2 = null;


?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <title>Case Study Web Development</title>
    <link rel="icon" href="images/logo-icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <link href="css/grid.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollToPlugin.min.js"></script>
    <script defer src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
    <script type="module" src="js/case-study.js"></script>
</head>

<body>
    <h1 class="hidden">Portfolio</h1>
    <header class="grid-con">
        <nav class="m-col-span-full navbar">
            <h2 class="hidden">Header</h2>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>

                <a href="index.php"><img class="logo-tablet" src="images/logo-mobile.svg" alt="logo"></a>
            

                <div class="nav-menu">
                <ul>
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a href="about.php" class="nav-link">ABOUT ME</a>
                    </li>
                    <li class="nav-item">
                        <a href="projects.php" class="nav-link">PROJECTS</a>
                    </li>

                    <li class="contact-mobile nav-item">
                        <a href="index.php" class="nav-link">CONTACT ME</a>
                    </li>

                   
                </ul>
                </div>

                <div class="contact-tablet">
                    <a href="index.php" class="nav-link">CONTACT ME</a>
                </div>
        </nav>

        
        <div class="logo-mobile col-start-2 col-end-4">
            <img src="images/logo-mobile.svg" alt="fanshawe-logo">
        </div>
    </header>

    <main>
        <section class="grid-con casestudy-section-intro">
            <h2 class="hidden">Landing Page</h2>
            <!-- <p class="intro-title col-span-full">&lt;ZIMA DRINK&gt;</p> -->
            <img class="intro-image col-span-full card-gsap" src="images/<?php echo $row1['image_main']; ?>" alt="Zima main-picture">
        </section>

        <section class="grid-con casestudy-section-motion-overview-text">
            <h2 class="hidden">Text Description</h2>
            <div class="text-info-cs col-span-full">
                <p class="title-text-cs">&lt;<?php echo $row1['title']; ?>&gt;</p>
                <p class="overview-cs text-cs"><span class="purple-text">Project Overview:</span> <?php echo $row1['overview']; ?></p>
                <p class="role-cs text-cs"><span class="purple-text">Role & Contribution:</span> <?php echo $row1['role']; ?></p>
                <p class="process-cs text-cs"><span class="purple-text">Process:</span><?php echo $row1['process']; ?></p>
                <p class="challenge-cs text-cs"><span class="purple-text">Challenge:</span><?php echo $row1['challenges']; ?></p>
                <p class="tools-cs text-cs"><span class="purple-text">Tools used:</span><?php echo $row1['tools_used']; ?></p>
                <p class="result-cs text-cs"><span class="purple-text">Final Result:</span> <?php echo $row1['result']; ?></p>
            </div>
        </section>

        <section class="grid-con casestudy-section-images">
            <h2 class="hidden">Project Images</h2>
            <div class="images-cs col-span-full">
            <?php 
            for($i = 0; $i < count($image_array); $i++) {
            echo
            '<img src="images/'.$image_array[$i].'.png" alt="Zima Project" class="card-gsap">';
            }
            ?>
            </div>

            <div class="col-span-full view-website-button"><a href="<?php echo $row1['project_url']; ?>">VIEW WEBSITE</a></div>
        </section>

        <section class="grid-con casestudy-section-scroll">
            <h2 class="hidden">Slider with more projects</h2>
            <div class="col-span-full container-projects">
                <div class="scroll">
                    <div class="right-to-left">
                        <p>MORE INTERESTING PROJECTS MORE INTERESTING PROJECTS MORE INTERESTING PROJECTS MORE INTERESTING PROJECTS MORE INTERESTING PROJECTS MORE INTERESTING PROJECTS MORE INTERESTING PROJECTS MORE INTERESTING PROJECTS MORE INTERESTING PROJECTS MORE INTERESTING PROJECTS MORE INTERESTING PROJECTS</p>
                    </div>
                </div>
            </div>


        </section>

        <section class="grid-con casestudy-section-slider">
            <h2 class="hidden">Slider with project cards</h2>
            <div class="slider-wrapper col-span-full">
                <div id="carousel-container" class="relative">
                    <button class="slider-prev">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                      </button>
                      <?php
                      foreach ($projects as $row2) {
                     if($row2['categories_id'] == 1) {

                        echo '<div class="project-card">
                        <div class="project-card-image"><img src="images/'.$row2['image_main'].'" alt="'.$row2['alt_text'].'"></div>
                        <div class="project-card-name">'.$row2['title'].'</div>
                        <div class="project-card-buttons">
                            <div class="black-button"><a href="cs-webdev.php?id='.$row2['project'].'">VIEW PROJECT</a></div>
                        </div>
                    </div>';
                    } elseif ($row2['categories_id'] == 2) {
                        echo '<div class="project-card">
                            <div class="project-card-image"><img src="images/'.$row2['image_main'].'" alt="'.$row2['alt_text'].'"></div>
                            <h2 class="project-card-name">'.$row2['title'].'</h2>
                            <div class="project-card-buttons">
                              <div class="black-button"><a href="cs-motion.php?id='.$row2['project'].'">VIEW PROJECT</a></div>
                            </div>
                      </div>';
                      }
                      }
                      ?>

                    <button class="slider-next">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                      </button>
                </div>
              </div>

        </section>

        

        <div class="ball-blur"></div>

    </main>

    
    
    <footer class="grid-con section-footer">
        <h2 class="hidden">Footer</h2>
        <div class="col-span-full logo-footer"><a href="index.php"><img src="images/logo-mobile.svg" alt="logo-footer"></a></div>
        <div class="col-span-full nav-menu-footer">
            <ul>
                <li class="nav-item-footer">
                    <a href="index.php" class="nav-link-footer">HOME</a>
                </li>
                <li class="nav-item-footer">
                    <a href="about.php" class="nav-link-footer">ABOUT ME</a>
                </li>
                <li class="nav-item-footer">
                    <a href="projects.php" class="nav-link-footer">PROJECTS</a>
                </li>
            </ul>
        </div>

        <div class="col-span-full contact-social-footer">

            <div class="button-footer black-button"><a href="index.php">CONTACT ME</a></div>

            <div class="social-medias-footer">
                <a href="https://www.instagram.com/_.iammilana._/profilecard/?igsh=azA0bmh5M2ZjaG12"><img src="images/instagram.svg" alt="instagram"></a>
                <a href="https://github.com/Milana041516"><img src="images/github.svg" alt="github"></a>
                <a href="https://www.linkedin.com/in/milana-gabbassova/"><img src="images/linkedin.svg" alt="linkedin"></a>
            </div>

        </div>

            <div class="col-span-full"><p class="copyright-text">© 2025 Milana Gabbassova</p></div>
     </footer>
     
</body>

</html>