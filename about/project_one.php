<?php
    $projectName = "Nom du projet 1";
    $projectDescription = "Décris nous le projet";
    $techUsed = "Quelles technologies utilises ce projet ?";
    $startedAt = "Quand as-tu commencé ce projet ?";
    $status = "Est-t-il terminé ?";
    require_once('./projectBase.php');
?>
            <div class="about-project-content">
                <img class="app-screen" src="./captures/modeNormalExor.webp" alt="" onclick="modal.callModal(event)">
                <p class="hide-text mb-text">Vidéo test avec un lien partagé vers YouTube (vidéo originale)</p>

                <img class="app-screen" src="./captures/modeCinemaExor.webp" alt="" onclick="modal.callModal(event)">
                <p class="hide-text mb-text">Mode Cinéma activé</p>
            </div>
            <div class="about-project-scrollContainer">
                <div class="about-project-autoScroll"><div id="activeScroller" class="about-project-activeScroller"></div></div>
            </div>
        </div>
    </section>
    <style>html{background-color: #000;background-image: linear-gradient(43deg, #3a50c0 0%, #bc37b3 46%, #eaaf45 100%);}</style>
</body>
</html>