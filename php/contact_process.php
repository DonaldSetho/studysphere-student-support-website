<?php
session_start();


$file = __DIR__ . '/../data/messages.csv';


$min_seconds_between = 10; // rate limit

function respond($ok, $msg) {
echo "<script>alert('$msg'); window.location.href='../contact.php';</script>";
exit;
}


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
respond(false, 'Invalid request method.');
}


if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== ($_SESSION['csrf_token'] ?? '')) {
respond(false, 'Invalid form submission.');
}


if (!empty($_POST['website'])) {
respond(false, 'Spam detected.');
}


if (isset($_SESSION['last_submit']) && (time() - $_SESSION['last_submit'] < $min_seconds_between)) {
respond(false, 'Please wait a few seconds before sending another message.');
}
$_SESSION['last_submit'] = time();


$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$subject = trim($_POST['subject'] ?? '');
$message = trim($_POST['message'] ?? '');


if ($name === '' || $email === '' || $subject === '' || $message === '') {
respond(false, 'Please fill in all required fields.');
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
respond(false, 'Invalid email address.');
}


$safe_name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
$safe_email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
$safe_subject = htmlspecialchars($subject, ENT_QUOTES, 'UTF-8');
$safe_message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
$timestamp = date('Y-m-d H:i:s');


$fp = fopen($file, 'a');
if (!$fp) {
respond(false, 'Cannot write to messages file. Check permissions.');
}
fputcsv($fp, [$timestamp, $safe_name, $safe_email, $safe_subject, $safe_message]);
fclose($fp);

respond(true, '✅ Message sent successfully! Thank you for contacting us.');
?>

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

