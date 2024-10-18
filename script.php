<?php
// Define a flag file to be read upon successful exploitation
$flag = "you have successfully exploited the vulnerability";

// Get the file parameter from the user input
if (isset($_GET['file'])) {
    $file = $_GET['file'];

    // Create the file path, with no input sanitization (vulnerability)
    $filePath = "files/" . $file;

    // Check if the file exists
    if (file_exists($filePath)) {
        // Display the contents of the file
        echo "<h2>File Contents:</h2>";
        echo "<pre>" . htmlspecialchars(file_get_contents($filePath)) . "</pre>";
    } else {
        echo "<h2>File not found!</h2>";
    }

    // Check if the user tried to access the secret file (path traversal)
    if ($file === "../../secrete.txt") {
        // Display the flag (if secret.txt is accessed)
        echo "<h2>Congratulations!</h2>";
        echo "<p>{$flag}</p>";
    }
}
?>