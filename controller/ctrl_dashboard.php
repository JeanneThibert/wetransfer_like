<?php

require_once 'vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('view');
$twig = new Twig_Environment($loader);


session_start();

// echo $_SESSION["authenticated"];

if(isset($_SESSION["authenticated"])) {

    if($_SESSION["authenticated"]) {

        echo $twig->render('view_dashboard.twig');
        
    } else {
        echo $twig->render('view_403.twig');
    }
    
} else {
    echo $twig->render('view_403.twig');
}

if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 600)) {
    session_unset();    
    session_destroy(); 
}
$_SESSION['last_activity'] = time(); // update last activity time stamp

session_regenerate_id(true);

// if($_SESSION["authenticated"]) {
//     echo "Vous êtes connecté";
// } else {
//     session_destroy();
//     echo "Vous n'êtes pas connecté";
// }

// var_dump($_SESSION["authenticated"]);

// require_once 'model/mdl_admin.php';

    







?>