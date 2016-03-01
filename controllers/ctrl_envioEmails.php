<?php
require '../models/Emails.php';

if (isset($_POST['data'])) {
    
    $em = new Emails();
    $em->consultarCorreos();
    
}