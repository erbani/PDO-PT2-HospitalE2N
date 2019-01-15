<?php
if (isset($_POST['modifPatient'])) {
    $patient = new patients();
    $patient->id = $_POST['IdPatient'];
    $patientSelect = $patient->modifyPatientSelected();
}
?>

