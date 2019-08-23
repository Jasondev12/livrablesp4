<?php

require('controllers/controller.php');

// if (isset($_GET['action'])) {
//     if ($_GET['action'] == 'listPosts') {
//         listPosts();
//     }
//     elseif ($_GET['action'] == 'post') {
//         if (isset($_GET['id']) && $_GET['id'] > 0) {
//             post();
//         }
//         else {
//             echo 'Erreur : aucun identifiant de billet envoyé';
//         }
//     }elseif($_GET['action'] == 'blog'){
//       blog();
//     }elseif($_GET['action'] == 'apropos'){
//       apropos();
//     }
// }
// else {
//     listPosts();
// }


if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'listPosts':
            listPosts();
            break;
        case 'post':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            else {
                echo 'Erreur : aucun identifiant de billet envoyé';
            }
            break;
        case  'blog' :
            blog();
            break;
        case 'apropos' :
            apropos();
            break;
        default:
            notFound();
            break;
    }
}else{
    listPosts();
}