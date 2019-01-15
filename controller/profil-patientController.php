<?php
//if (isset($_POST['detailPatient'])) {
//    $patient = new patients();
//    $patient->id = $_POST['detailPatient'];
//    $patientSelect = $patient->getPatientSelect();
//}

$patient = new patients();
$patient->id = $_GET['idPatient'];
$patientInfo = $patient->getPatientSelect();
?>

