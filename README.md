📅 AI-Powered Past Event Calendar
A dynamic web application that displays historical events for any given date by leveraging the powerful generative capabilities of the OpenAI API, all served by a PHP backend.

💡 Project Concept
This calendar is not static. When a user selects a date, the application sends a prompt to the OpenAI API via a secure PHP server script. The AI then returns a curated list and summary of significant historical events that occurred on that specific date (e.g., "What happened on July 20th in history?").

✨ Features
Date Selection: Simple HTML form allows users to pick any day of the year from the calendar.

AI-Generated Content: Historical events and summaries are created by the OpenAI large language model.

Secure API Handling: PHP acts as a secure intermediary, ensuring the OpenAI API key is never exposed on the client-side.

Dynamic Loading: Events are loaded and displayed asynchronously without requiring a full page refresh.

🛠️ Technology Stack
Area

Technologies Used

Notes

Backend/API Proxy

PHP

Manages the secure connection to the OpenAI API and serves the HTML.

AI Integration

OpenAI API

Used for generating the historical event data based on the date input.

Frontend Structure

HTML5

Provides the date input form and the structure for displaying results.

Styling

CSS3

Handles the visual layout and presentation of the calendar interface.

Interaction

JavaScript (JS)

Handles the user interaction (date submission) and the asynchronous call to the PHP backend.

🚀 Installation and Setup
1. Requirements

A web server that supports PHP (e.g., Apache, Nginx).

A valid OpenAI API Key.

Basic knowledge of API integration.

2. File Structure

You will primarily need three files:

/
├── index.html       # The main user interface      
└── asg2.php    # The backend script that talks to OpenAI

3. API Key Configuration

The OpenAI API key must be kept secret and should only be stored on the server side (in api_proxy.php or, ideally, in an environment variable).

In api_proxy.php:

Securely define your OpenAI API Key.

$apiKey = "YOUR_OPENAI_API_KEY_HERE"; // Use environment variables in production!

Set up the cURL request to send the user's date query to the OpenAI /completions or /chat/completions endpoint.

The request should include a system prompt (e.g., "You are a world-class historian. Provide a concise list of 5 significant events that happened on [Selected Date].")

4. Frontend (HTML/JS) Setup

In index.html and supporting JS:

Create an input field for the date.

Use JavaScript's fetch() API to send the selected date (e.g., "07/20") to your PHP file (api_proxy.php).

The JavaScript will then parse the JSON response returned by api_proxy.php and dynamically insert the historical event list into the HTML page.

5. Running the Application

Place the files in your web server's root directory.

Ensure your PHP server is running.

Navigate to http://localhost/index.html (or your server's public IP).

