<?php
//var_dump($_POST);
include 'model/patients.php';
include 'controller/liste-patientsController.php';
include 'navbar.php';
?>
<div class="container-fluid">
    <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12 col-xl-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="text-center">
                    <h1>Partie 2 HOSPITAL E2N</h1>
                    <h2>Exercice 2 :</h2> 
                    <p>Créer une page liste-patients.php et y afficher la liste des patients. Inclure dans la page, un lien vers la création de patients.</p>
                    <table>
                        <thead>
                            <tr> 
                                <th>Nom : </th>
                                <th>Prenom :</th> 
                                <th>Numero d'identification :</th>
                                <th>Voir le detail :</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($patientList as $patient) { ?>
                                <tr>
                                    <td><?= $patient->lastname ?></td>
                                    <td><?= $patient->firstname ?></td>
                                    <td><?= $patient->id ?></td> 
                                    <td>
                                        <a class="btn btn-primary" href="profil-patient.php?idPatient=<?=$patient->id?>">Voir detail</a>
                                        <!--<form action="profil-patient.php" method="post">
                                            <button type="submit" class="btn btn-primary" name="detailPatient" value="<? = $patient->id ?>">Voir le detail</button>
                                        </form> -->
                                    </td>
                                </tr>
                                <?php
                            ;} ?> 
                        </tbody>
                    </table> 
                    <a class="btn btn-success" href="ajout-patient.php">Ajouter patient</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>

