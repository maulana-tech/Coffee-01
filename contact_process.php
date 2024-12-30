<?php

// Ambil data dari formulir
$to = "firdaussyah03@gmail.com";
$from = $_REQUEST['email'];
$name = $_REQUEST['name'];
$subject = "New Booking Request"; // Default subject
$booking_date = $_REQUEST['booking_date'];
$booking_time = $_REQUEST['booking_time'];
$number_of_people = $_REQUEST['number_of_people'];
$event_type = $_REQUEST['event_type'];
$cmessage = $_REQUEST['message'];

// Header email
$headers = "From: $from\r\n";
$headers .= "Reply-To: $from\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

// Body email
$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Booking Request</title></head><body>";
$body .= "<h2>New Booking Request</h2>";
$body .= "<p><strong>Name:</strong> $name</p>";
$body .= "<p><strong>Email:</strong> $from</p>";
$body .= "<p><strong>Booking Date:</strong> $booking_date</p>";
$body .= "<p><strong>Booking Time:</strong> $booking_time</p>";
$body .= "<p><strong>Number of People:</strong> $number_of_people</p>";
$body .= "<p><strong>Event Type:</strong> $event_type</p>";
$body .= "<p><strong>Message:</strong></p>";
$body .= "<p>$cmessage</p>";
$body .= "</body></html>";

// Kirim email
$send = mail($to, $subject, $body, $headers);

// Konfirmasi hasil
if ($send) {
    echo "Email sent successfully.";
} else {
    echo "Failed to send email.";
}

?>
