<!DOCTYPE html>
<html lang="fr" id="html">
<head>
  <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Prénom Nom - Intitulé</title>
  <link rel="stylesheet" type="text/css" href="./assets/stylesheet/updatedStyle.css?v=15">
  <link rel="icon" href="./assets/icon/favicon.ico"/>
  <script src="./assets/scripts/globalScripts.js" defer></script>
  <script src="https://www.google.com/recaptcha/api.js"></script>
</head>
<body id="body" onload="load.invokeEndLoad();">
    <div id="loaderFullScreenId" class="loaderFullScreen">
        <div><svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-hash"><line x1="4" y1="9" x2="20" y2="9"></line><line x1="4" y1="15" x2="20" y2="15"></line><line x1="10" y1="3" x2="8" y2="21"></line><line x1="16" y1="3" x2="14" y2="21"></line></svg></div>
    </div>
    <main id="main">
    <div id="openMenu" class="menu-header-dot"><a onclick="nav.openMenu();">
        <img src="./assets/icon/menu.svg" alt="Menu">
    </a></div>
    <div id="closeMenu" class="menu-header-dot"><a onclick="nav.closeMenu();">
        <img src="./assets/icon/x.svg" alt="Fermer">
    </a></div>
    <header>
        <div id="header-links-parent">
            <ul id="header-links-id" class="header-links">
                <li><a href="./#I0CWT">À propos de moi</a></li>
                <li><a href="./#Z3TN1">Mes projets</a></li>
                <li><a href="./#CSC68">Niveaux</a></li>
                <li><a href="./#7H5CP">Me contacter</a></li>
            </ul>
        </div>
        <div class="header-card">
            <div class="header-card-infos"><p>Prénom Nom<br><span id="header-card-job">Intitulé</span></p></div>
            <img id="header-card-img" src="./assets/my_head.png" height="47px" width="47px" alt="">
        </div>
    </header>
    <div class="main">
        <section class="sec-prt-me">
            <p><span id="primary-content-title">Prénom Nom</span><br>
            <span id="primary-content-subtitle">Intitulé</span></p>
            <img id="down-chevrons" src="./assets/icon/chevrons-down.svg" alt="">
            <img id="ovni-laptop" src="./assets/icon/emoji/laptop.png" alt="" style="display: none;">
        </section>
        <section id="I0CWT" class="sec-prt-about-me">
            <span class="section-title">À propos de moi</span>
            <div class="about-me-nogrid">
                <div class="about-me-img">
                    <img src="./assets/coworker_updt.webp" width="100%" alt="">
                </div>
                <div class="about-me-infos">
                    <p>
                        Ici tu peux parler de tout et de rien, de tes compétences et de tes expériences.
                        Comme de tes points forts et tes points faibles.
                    </p>
                    <button id="cv-download-button" class="empty-cta-button" onclick="lib.resDownload()">
                    Téléchargez mon CV</button>
                </div>
            </div>
        </section>
        
        <section id="Z3TN1" class="sec-prt-projects">
            <span class="section-title">Mes projets</span>
            <div class="all-projects-container">
                <div class="projects-container carbon !">
                    <div>
                        <h4>Projet 1</h4>
                        <p>Description du projet 1</p>
                    </div>
                    <a href="./about/project_one.php">En savoir plus</a>
                </div>
                <div class="projects-container exor-cloud !">
                    <div>
                        <h4>Projet 2</h4>
                        <p>Description du projet 2</p>
                    </div>
                    <a href="./about/project_two.php">En savoir plus</a>
                </div>
            </div>
        </section>

        <section id="CSC68" class="lvl">
            <span class="section-title">Niveaux</span>
            <div class="full-level-scan">
                <div class="level-scan-container">
                    <div id="html-scan" class="level-scan"><p>HTML</p></div>
                </div>
                <div class="level-scan-container">
                    <div id="css-scan" class="level-scan"><p>CSS / SASS</p></div>
                </div>
                <div class="level-scan-container">
                    <div id="python-scan" class="level-scan"><p>Python</p></div>
                </div>
                <div class="level-scan-container">
                    <div id="php-scan" class="level-scan"><p>PHP</p></div>
                </div>
                <div class="level-scan-container">
                    <div id="js-scan" class="level-scan"><p>JavaScript</p></div>
                </div>
                <div class="level-scan-container">
                    <div id="react-scan" class="level-scan"><p>React</p></div>
                </div>
            </div>
        </section>
        <section id="7H5CP" class="contact-me">
            <span class="section-title">Me contacter</span>
            <div class="contact-form-container">
            <?php
                if (isset($_POST['submit'])){
                    $name = htmlspecialchars($_POST['name']); $email = htmlspecialchars($_POST['email']);
                    $phone = htmlspecialchars($_POST['phone']); $message = htmlspecialchars($_POST['message']);
					$sendRemoteIP = $_SERVER['REMOTE_ADDR'];
                    if(empty($name) || empty($email) || empty($phone) || empty($message)){
                    ?>
                        <div class="error-message message"><?php echo("Veuillez compléter tout les champs"); ?></div>
                    <?php
                    } else {
                        $smsOnly = $_POST['sms-only'];
                        if(is_null($smsOnly)){$smsOnly = $name." peut recevoir les appels !";}
                        else if (isset($smsOnly) || $smsOnly = "on"){$smsOnly = "Ne souhaite pas recevoir d'appels (SMS uniquement)";}
                        ini_set( 'display_errors', 1 );
                        error_reporting( E_ALL );
                        $from = "L'adresse mail de l'expéditeur";
                        $to = "Ton adresse e-mail";
                        $subject = $name.' a envoyé un message !'; $headers = "From:".$from;
                        $newMessage = "Nom et prénom : ".$name."\nEmail : ".$email."\nNuméro de téléphone : ".$phone."\n".$smsOnly."\nIP du client : ".$sendRemoteIP."\nMessage : \n' ".$message." '";
                        if(mail($to, $subject, $newMessage, $headers)){
                            ?> <div class="success-message message"><?php echo("Votre message a été envoyé avec succès"); ?></div><?php
                        } else {
                            ?> <div class="error-message message"><?php echo("Oops, votre message s'est perdu en route.. Veuillez réessayer ultérieurement"); ?></div> <?php
                        }
                    }
                }
            ?>
            <form method="POST" action="./#7H5CP" autocomplete="off" onkeyup="contact.checkDatas()">
                    <input class="form-input" type="text" name="name" maxlength="44" placeholder="Nom et Prénom" value="<?php if(isset($_POST['name'])){echo($_POST['name']);}?>" onkeyup="contact.handleName(event)">
                    <input class="form-input" type="email" name="email" maxlength="33" placeholder="Adresse e-mail" value="<?php if(isset($_POST['email'])){echo($_POST['email']);}?>" onkeyup="contact.handleEmail(event)">
                    <input class="form-input" type="text" name="phone" maxlength="15" placeholder="Numéro de téléphone" value="<?php if(isset($_POST['phone'])){echo($_POST['phone']);}?>" onkeyup="contact.handlePhone(event)">
                    <textarea class="form-input" type="text" name="message" rows="5" maxlength="590" placeholder="Message" onkeyup="contact.handleMessage(event)"><?php if(isset($_POST['message'])){echo($_POST['message']);}?></textarea>
                    <!-- <div class="g-recaptcha" data-sitekey="_KEY_"></div></br> -->
                    <input id="001submitFromID" type="submit" name="submit" class="empty-cta-button" value="Envoyer" title="Complétez tout les champs avant de continuer, il faut que j'en sache plus sur vous !" disabled>
                </form>
            </div>
        </section>
    </div>
    <footer>
        <span id="footer-left">par moi (ousmanedev.fr)</span>
        <span id="footer-right">
            <img loading="lazy" class="emoji" src="./assets/icon/emoji/glasses.png" alt="">
            <img loading="lazy" class="emoji" src="./assets/icon/emoji/sun.png" alt="">
            <img loading="lazy" class="emoji" src="./assets/icon/emoji/star.png" alt="">
            <img loading="lazy" class="emoji" src="./assets/icon/emoji/eyes.png" alt="">
        </span>
    </footer>
    </main>
</body>
</html>