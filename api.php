<?php
// Set the content type header to application/json
header('Content-Type: application/json');

// Define the path to the data file
$dataFile = 'data.json';

// Check if the data file exists
if (file_exists($dataFile)) {
    // Read the file content and output it
    echo file_get_contents($dataFile);
} else {
    // If the file doesn't exist, return a default empty structure
    echo json_encode([
        "articles" => [],
        "socialFeed" => [],
        "newsFlashes" => [],
        "advertisements" => [
            "top_banner_url" => "https://placehold.co/1200x200/ccc/999?text=Advertisement",
            "sidebar_ad_url" => "https://placehold.co/300x600/ccc/999?text=Advertisement"
        ]
    ]);
}
?>
