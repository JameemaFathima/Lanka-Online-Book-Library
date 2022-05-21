<?php

require_once __DIR__ . '/vendor/autoload.php';

// Grab the variables
$username = $_POST['username'];
$userid = $_POST['userid'];
$email = $_POST['email'];
$contactno = $_POST['contactno'];
$password = $_POST['password'];

// Create new PDF instance
$mpdf = new \Mpdf\Mpdf();

// Create new PDF
$data = '';

$data .= '<h1> Your Details </h1>';

// Add data
$data .= '<strong> Username </strong>' . $username . '<br />';
$data .= '<strong> User Id </strong>'. $userid .'<br />';
$data .= '<strong> E-mail </strong>'. $email .'<br />';
$data .= '<strong> Contact No </strong>'. $contactno .'<br />';
$data .= '<strong> Password </strong>'. $password .'<br />';

// Write PDF
$mpdf->WriteHTML($data);

// Output to browser
$mpdf->Output('myfile.pdf','D');
