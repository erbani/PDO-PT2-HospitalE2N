<?php

/*
 * Instanciation de l'objet patient.
 * $patients devient une instance de la classe patients.
 * la méthode magique construc est appelée automatiquement grâce au mot clé new.
 */
$patients = new patients();
$patientList = $patients->getPatientList();
?>
