<?php 
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Check if the file is uploaded without errors
    if ($_FILES["attachment"]["error"] == UPLOAD_ERR_OK) {
        $attachment_name = $_FILES["attachment"]["name"];
        $attachment_tmp_name = $_FILES["attachment"]["tmp_name"];
        $attachment_type = $_FILES["attachment"]["type"];

        // Move the uploaded file to a specified directory
        $upload_directory = "uploads/";
        $attachment_path = $upload_directory . $attachment_name;

        move_uploaded_file($attachment_tmp_name, $attachment_path);

        // Set up email parameters
        $to = "hiteshprajapati7412@gmail.com";
        $subject = "New Contact Form Submission from $name";
        $headers = "From: $email";
        $headers .= "\r\nMIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        // Build the email body
        $body = "Name: $name<br>";
        $body .= "Email: $email<br>";
        $body .= "Message: $message<br>";

        // Attach the file to the email
        $file_content = file_get_contents($attachment_path);
        $file_content = chunk_split(base64_encode($file_content));
        $body .= "--boundary\r\n";
        $body .= "Content-Type: $attachment_type; name=\"$attachment_name\"\r\n";
        $body .= "Content-Disposition: attachment; filename=\"$attachment_name\"\r\n";
        $body .= "Content-Transfer-Encoding: base64\r\n";
        $body .= "\r\n$file_content\r\n";

        // Send the email
        mail($to, $subject, $body, $headers);

        // Clean up: delete the uploaded file
        unlink($attachment_path);

        echo "Thank you for your submission!";
    } else {
        echo "Error uploading file.";
    }
} else {
    echo "Invalid request method.";
}

?>