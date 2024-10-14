<?php

session_start();
include 'connection.php';
include 'phpqrcode/phpqrcode.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get the input text for generating QR code
    $gen = $_POST['gen'];

    // Generate current timestamp
    $dataGen = date("Y-m-d H:i:s");

    $text = $gen; 

    // Generate unique file name for QR code image
    $file = uniqid() . ".png"; 
    $path = 'images/' . $file;

    // Error correction capability and size settings for QR code
    $ecc = 'L'; 
    $pixel_Size = 10; 
    $frame_Size = 10; 

    // Generate QR code and save it to the specified path
    QRcode::png($text, $path, $ecc, $pixel_Size, $frame_Size); 

    // Insert generated text, QR code image path, and timestamp into the database
    $RecordInsert = $db->prepare("INSERT INTO qrcode(add_text, brcode, data_gen) VALUES (?, ?, ?)");
    $RecordInsert->bind_param("sss", $gen, $file, $dataGen);

    if($RecordInsert->execute()) {
        // Success message storing the generated QR code
        $_SESSION['success'] = "<img src='$path' alt='QR Code'>";
        header("location: ./");
        exit; // It's a good practice to exit after header redirection
    } else {
        // Handle error if the query fails
        echo "Error: Could not execute the query.";
    }
}

?>
