<!DOCTYPE html>
<html lang="fr" id="html">
<head>
  <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>À propos de <?php echo($projectName);?></title>
  <link rel="stylesheet" type="text/css" href="../assets/stylesheet/updatedStyle.css">
  <link rel="icon" href="../assets/icon/favicon.ico" />
  <script type="text/javascript" src="../assets/scripts/globalScripts.js" defer></script>
  <script type="text/javascript" src="../assets/scripts/projects.js" defer></script>
</head>
<body id="body" onload="load.invokeEndLoad();">
    <div id="loaderFullScreenId" class="loaderFullScreen">
        <div><svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-hash"><line x1="4" y1="9" x2="20" y2="9"></line><line x1="4" y1="15" x2="20" y2="15"></line><line x1="10" y1="3" x2="8" y2="21"></line><line x1="16" y1="3" x2="14" y2="21"></line></svg></div>
    </div>
    <div id="screen-modal" class="fullscreen-modal" style="display: none;">
        <div id="modal-child">
            <div id="modal-img" class="modal-img" style="background-size: contain; background-repeat: no-repeat;">
                <a onclick="modal.closeModal();">
                    <img id="modal-minimize" src="../assets/icon/minimize.svg" aria-label="Fermer" alt="Fermer" title="Pressez 'Échap' pour fermer" onclick="modal.closeModal()">
                </a>
            </div>
        </div>
    </div>
    <section class="about-project">
            <div class="about-project-nodiv"></div>
                <div class="about-project-infos">
                    <a href="../#Z3TN1"><img src="../assets/icon/chevron-left.svg" alt="">Retour</a>
                    <h2><?php echo($projectName);?></h2>
                    <p class="project-description" aria-label="Description du projet">
                    <?php echo($projectDescription);?></p>
                    <div class="tech-used">
                    <p class="hide-text" >Stack de <?php echo($projectName);?></p>
                    <span aria-label="Technologies"><?php echo($techUsed);?></span>
                    <p class="hide-text">Avancement</p>
                    <span aria-label="Status"><?php echo($status);?></span>
                    <p class="hide-text">Débuté en <?=$startedAt?></p>
                </div>
            </div>