<?php

//stockage des regex
$regexText = "/^\w+$/";
$regexPhone = "/[0-9{10}]/";
$regexDate = "/[0-9]{4}-[0-9]{2}-[0-9]{2}/";
$regexMail = " /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ ";

//declaration d'un tableau d'erreur
$formError = array();
//declaration de la var succes à false, elle servira a controler si on a des erreurs ou non
$isSuccess = FALSE;
$isError = FALSE;

//A la validation si le submit est validé et qu'il existe :
if (isset($_POST['submit'])) {
// On commence par récupérer et faire le tri dans les champs
    if (!empty($_POST['lastname'])) {
        //Si POST est pas vide alors on verrifie avec la regex
        if (preg_match($regexText, $_POST['lastname'])) {
            /* si ca correspond a la regex on protege avec un html specialchars au cas ou
             * la personne veuille inserer du code dans la BDD.
             * on indique au passage la valeur de la var $lastname avec le $lastname =
             */
            $lastname = htmlspecialchars($_POST['lastname']);
        } else {
//si cela ne correspond pas a la regex on affiche le message suivant :
            $formError['lastname'] = "Nom invalide";
        }
    } else {
//si le champ est vide on l'indique a l'utilisateur
        $formError['lastname'] = 'Nom vide';
    }
//on applique la meme chose pour les autres champs :
    if (!empty($_POST['firstname'])) {
        if (preg_match($regexText, $_POST['firstname'])) {
            $firstname = htmlspecialchars($_POST['firstname']);
        } else {
            $formError['firstname'] = "Prenom invalide";
        }
    } else {
        $formError['firstname'] = 'Prenom vide';
    }

    if (!empty($_POST['birthdate'])) {
        if (preg_match($regexDate, $_POST['birthdate'])) {
            $birthdate = htmlspecialchars($_POST['birthdate']);
        } else {
            $formError['birthdate'] = "Date de naissance invalide";
        }
    } else {
        $formError['birthdate'] = "Date de naissance vide";
    }

    if (!empty($_POST['mail'])) {
        if (preg_match($regexMail, $_POST['mail'])) {
            $mail = htmlspecialchars($_POST['mail']);
        } else {
            $formError['mail'] = "E-mail invalide";
        }
    } else {
        $formError['mail'] = "E-mail vide";
    }

    if (!empty($_POST['phone'])) {
        if (preg_match($regexPhone, $_POST['phone'])) {
            $phone = htmlspecialchars($_POST['phone']);
        } else {
            $formError['phone'] = "Telephone invalide";
        }
    } else {
        $formError['phone'] = "Telephone vide";
    }
    if (count($formError) == 0) {
//Instenciation (on charge) de l'objet patients. 
//$patients devient une instance de la classe patients.
//la methode __construct charge automatiquement $patient
//grace au mot new.
        $patients = new patients();
        $patients->lastname = $lastname;
        $patients->firstname = $firstname;
        $patients->birthdate = $birthdate;
        $patients->mail = $mail;
        $patients->phone = $phone;
//si tout s'est bien derroulé on declenche add patient qui est dans le model (voir model/patients.php)
        if ($patients->addPatients()) {
//on fini par charger isSuccess avec true pour declencher le commentaire succes dans la vue.     
            $isSuccess = TRUE;
//si ya une couille dans le chemin de la bdd on charge $isErreor avec true pour l'afficher dans la vue
        } else {
            $isError = TRUE;
        }
        /*
         * Attention a bien inserer le compteur d'erreur dans la validation du submit
          sinon il sortira de la condition et ne pourra pas avoir les valeurs des post.
         */
    }
}
?> 
