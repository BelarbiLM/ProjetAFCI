<?php
    $content_footer .= "<footer class='py-3 border-top'>
                            <div class='d-flex flex-wrap justify-content-between align-items-center border-bottom'>
                                <div class='col-md-4 d-flex align-items-center'>
                                    <a href='" . RACINE_SITE . "home.php' class='d-flex justify-content-center me-2 mb-md-0 text-muted text-decoration-none lh-1'>
                                        <img src='{$line_footer['logo']}'>
                                    </a>
                                    <span class='mb-md-0 text-white'>{$line_footer['text']}</span>
                                </div>
                                <ul class='nav col-md-4 justify-content-end list-unstyled d-flex'>
                                    <li class='ms-3'><a href='{$line_footer['linkTwitter']}' class='text-white'><i class='bi bi-twitter'></i></a></li>
                                    <li class='ms-3'><a href='{$line_footer['linkFacebook']}' class='text-white'><i class='bi bi-facebook'></i></a></li>
                                    <li class='ms-3'><a href='{$line_footer['linkInstagram']}' class='text-white'><i class='bi bi-instagram'></i></a></li>
                                    <li class='ms-3'><a href='{$line_footer['linkTiktok']}' class='text-white'><i class='bi bi-tiktok'></i></a></li>
                                    <li class='ms-3'><a href='{$line_footer['linkYoutube']}' class='text-white'><i class='bi bi-youtube'></i></a></li>
                                </ul>
                            </div>
                            <div class='d-flex align-items-center'>
                                <div class='footer-zone d-flex flex-column text-center'>
                                    <h4>{$line_footer['title1']}</h4>
                                    <a href='" . RACINE_SITE . "contact.php' class='text-white text-decoration-none'>Contact</a>
                                    <a href='" . RACINE_SITE . "delivery.php' class='text-white text-decoration-none'>Livraisons & Retours</a>
                                </div>
                                <div class='footer-zone d-flex flex-column text-center'>
                                    <h4>{$line_footer['title2']}</h4>
                                    <a href='" . RACINE_SITE . "about.php' class='text-white text-decoration-none'>A propos</a>
                                    <a href='" . RACINE_SITE . "obligations.php' class='text-white text-decoration-none'>Obligations légales</a>
                                </div>
                            </div>   
                        </footer>";
    echo $content_footer;
?>
</body>
</html>