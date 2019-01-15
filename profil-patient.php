<?php
//var_dump($_POST);
include 'model/patients.php';
include 'controller/profil-patientController.php';
include 'navbar.php';
?>
<div class="text-center">
    <h1>Partie 2 HOSPITAL E2N</h1>
    <h2>Exercice 3 :</h2> 
    <p>Créer une page profil-patient.php. Elle doit permettre d'afficher toutes les informations d'un patient. Elle doit être accessible depuis la page liste-patients.php et afficher les informations du patient sélectionné.</p>
    <h2>Exercice 4 :</h2>
    <p>Depuis la page de profil d'un patient, permettre la modification de ce patient.</p>    
    <table>
        <thead>
            <tr> 
                <th>Numero d'identification :</th>
                <th>Nom : </th>
                <th>Prenom :</th> 
                <th>Date de naissance :</th>
                <th>Téléphone :</th>
                <th>E-mail :</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?=$patientInfo->id?></td>
                <td><?=$patientInfo->lastname?></td>
                <td><?=$patientInfo->firstname?></td>
                <td><?=$patientInfo->birthdate?></td>
                <td><?=$patientInfo->phone?></td>
                <td><?=$patientInfo->mail?></td>
            </tr>
        </tbody>
<!--        <tbody>
            <tr>
                <td><? = !empty($_POST) ? $patientSelect->id : 'vide' ?></td>
                <td><? = !empty($_POST) ? $patientSelect->lastname : 'vide' ?></td>
                <td><? = !empty($_POST) ? $patientSelect->firstname : 'vide' ?></td>
                <td><? = !empty($_POST) ? $patientSelect->birthdate : 'vide' ?></td>
                <td><? = !empty($_POST) ? $patientSelect->phone : 'vide' ?></td>
                <td><? = !empty($_POST) ? $patientSelect->mail : 'vide' ?></td>
            </tr>
        </tbody>-->
    </table> 
    <a class="btn btn-success" href="liste-patients.php">Retour Liste Patient</a>
</div>
<?php
include 'footer.php';
?>


