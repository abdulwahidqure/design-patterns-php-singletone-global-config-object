<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Configuration;

$config = Configuration::getInstance();

// Get the request URI
$requestUri = $_SERVER['REQUEST_URI'];

// Find the position of "public" in the URI
$publicPos = strpos($requestUri, 'public');

// Check if "public" exists in the URI
if ($publicPos !== false) {
    // Get the path after "public"
    $path = substr($requestUri, $publicPos + strlen('public'));

    // Remove leading and trailing slashes
    $path = trim($path, '/');

    // Split the path into segments
    $segments = explode('/', $path);

    // Check if there are segments available
    if (!empty($segments)) {
        // Take the last segment as the filename
        $filename = end($segments);

        // Remove the filename from the segments array
        array_pop($segments);

        // Construct the directory structure
        $directory = implode('/', $segments);

        // Specify the path to the app folder
        $appPath = __DIR__ . '/../app/';

        // Construct the full path to the file
        $filePath = $appPath . $directory . '/' . $filename . '.php';

        // Check if the file exists
        if (file_exists($filePath)) {
            // Include the file
            include $filePath;
        } else {
            // The file does not exist
            echo "File not found.";
        }
    } else {
        // No segments available
        echo "No segment provided.";
    }
} else {
    // "public" not found in the URI
    echo "Invalid request.";
}
