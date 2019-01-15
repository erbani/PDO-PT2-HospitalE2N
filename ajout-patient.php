<?php
//var_dump($_POST);
include 'model/patients.php';
include 'controller/ajout-patientController.php';
include 'navbar.php';
?>
<div class="text-center">
    <h1>Partie 2 HOSPITAL E2N</h1>
    <h2>Exercice 1 :</h2> 
    <p>Créer une page ajout-patient.php et y créer un formulaire permettant de créer un patient. Elle doit être accessible depuis la page index.php.</p>
    <?php
    if ($isSuccess) {
        ?>
        <p class="text-success">Enregistrement effectué !</p>
        <a class="btn btn-success" href="ajout-patient.php">Retour</a>
        <?php
//si le chemin de la bdd est pas bon ou que la requette est mal faite on affiche ce mesage d'erreur :
    }else if ($isError) {?>
         <p class="text-danger">Désolé, le patient n'a pu etre enregistré erreur interne.</p>
        <a class="btn btn-success" href="ajout-patient.php">Retour</a>
        <?php
    } else {
        ?>
        <form method="post" action="ajout-patient.php">
            <p>Coordonnées nouveau patient</p>
            <ul>
                <li><label for="lastname">Nom : </label> <input type="text" name="lastname" id="lastname" maxlength="40" /></li>
                <li class="text-danger"><?= isset($formError['lastname']) ? $formError['lastname'] : ''; ?>                    
                <li><label for="firstname">Prénom : </label> <input type="text" name="firstname" id="firstname" maxlength="40"/></li>
                <li class="text-danger"><?= isset($formError['firstname']) ? $formError['firstname'] : ''; ?>  
                <li><label for="birthdate">Date de naissance : </label> <input type="date" name="birthdate" id="birthdate" /></li>
                <li class="text-danger"><?= isset($formError['birthdate']) ? $formError['birthdate'] : ''; ?>  
                <li><label for="mail">E-mail : </label> <input type="email" name="mail" id="mail" maxlength="70" /></li>
                <li class="text-danger"><?= isset($formError['mail']) ? $formError['mail'] : ''; ?>  
                <li><label for="phone">Téléphone : </label> <input type="tel" name="phone" id="phone" maxlength="10" /></li>
                <li class="text-danger"><?= isset($formError['phone']) ? $formError['phone'] : ''; ?></li>
            </ul>
            <button type="submit" class="btn btn-success" name="submit">Valider</button>
        </form>
        <?php
    };
    ?>
</div>
<?php
include 'footer.php';
?>
