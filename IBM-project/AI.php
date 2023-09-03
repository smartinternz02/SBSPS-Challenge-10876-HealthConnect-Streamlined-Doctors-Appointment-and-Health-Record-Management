<!doctype html>
<html lang="en">
  <head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>logout page</title>
    <style>
          body {
            font-family: Arial, sans-serif;
               user-select: none;
        }

        #chat-container {
            max-width: 700px;
            margin: 30px auto;
            padding: 30px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: lightgray;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        #chat-messages {
            max-height: 300px;
            overflow-y: auto;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f7f7f7;
        }

        .message {
            margin-bottom: 10px;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .user {
            background-color: none;
            color: black;
            text-align: right;
        }

        .bot {
            background-color: none;
            color: black;
        }

        #user-input {
            margin-top: 10px;
            display: flex;
            justify-content: space-between;
        }

        #user-message {
            flex-grow: 1;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
        }

        button:hover {
            background-color: #2980b9;
        }
    </style>
  </head>
  <body>
<?php require 'partials/_nav.php' ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

 
  </body>

  <body>
    <div id="chat-container">
        <div id="chat-messages">
            <!-- Chat messages will be displayed here -->
        </div>
        <div id="user-input">
            <input type="text" id="user-message" placeholder="Type your problem...">
            <button onclick="sendMessage()">Send</button>
        </div>
    </div>

    <script>
        // JavaScript for the chat functionality (same as before)
      // JavaScript for the chat functionality
        function sendMessage() {
            var userMessage = document.getElementById('user-message').value;
            displayMessage('user', userMessage);

            // You can add code here to send the user message to an AI service for processing and get a response
            // For simplicity, let's assume a simple AI response
            var aiResponse = "Thank you for wisiting our website :) Apologize for not giving solution because i am still in bulding stage"; // Replace with the actual response

            displayMessage('bot', aiResponse);
        }

        function displayMessage(sender, message) {
            var chatMessages = document.getElementById('chat-messages');
            var messageElement = document.createElement('div');
            messageElement.classList.add(sender);
            messageElement.innerText = message;
            chatMessages.appendChild(messageElement);
        }
    
    </script>
</body>
</html>
