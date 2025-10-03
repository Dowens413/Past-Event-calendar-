<?php
// Check if 'query' parameter is sent
if (!isset($_GET["query"]) || trim($_GET["query"]) === "") {
    echo "No question sent";
    exit;
}

// Define API key (replace YOUR-API-KEY with your real key)
$openaiApiKey = "YOUR API KEY HERE !";

// Setup headers for OpenAI API request
$headerParameters = [
    "Content-Type: application/json",
    "Authorization: Bearer " . $openaiApiKey,
];

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, "https://api.openai.com/v1/chat/completions");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headerParameters);

// Prepare the request payload
$parameters = [
    "model" => "gpt-3.5-turbo",
    "messages" => [
        ["role" => "user", "content" => $_GET["query"]]
    ],
    "max_tokens" => 200,
    "temperature" => 1.0,
];

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($parameters));

// Execute the request
$response = curl_exec($ch);

if ($response === false) {
    echo "cURL Error: " . curl_error($ch);
    curl_close($ch);
    exit;
}

// Get HTTP status code
$httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if ($httpStatusCode !== 200) {
    echo "HTTP Error: " . $httpStatusCode . " " . $response;
    curl_close($ch);
    exit;
}

// Decode JSON response
$result = json_decode($response);

if (!$result || !isset($result->choices[0]->message->content)) {
    echo "Error decoding response or unexpected response format.";
    curl_close($ch);
    exit;
}

// Output ChatGPT's reply
echo $result->choices[0]->message->content;

// Close cURL session
curl_close($ch);
?>
