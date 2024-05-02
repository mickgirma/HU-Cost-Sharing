<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $to = "habtemaryam95@gmail.come"; // Replace with the desired email address
  $subject = "Form Submission";
  $message = "Name: ".$_POST["name"]."\n";
  $message .= "Email: ".$_POST["email"]."\n";
  // Add additional form fields as needed

  // Send the email
  $headers = "From: ".$_POST["email"]."\r\n";
  if (mail($to, $subject, $message, $headers)) {
    echo "Email sent successfully.";
  } else {
    echo "Error: Unable to send email.";
  }
}
?>
