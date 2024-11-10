<?php

session_start();

// Define constants for flash messages
const FLASH = 'FLASH_MESSAGES';
const FLASH_ERROR = 'error';
const FLASH_WARNING = 'warning';
const FLASH_INFO = 'info';
const FLASH_SUCCESS = 'success';

// Function to create a flash message
function create_flash_message(string $name, string $message, string $type): void {
    // Remove existing message with the same name
    if (isset($_SESSION[FLASH][$name])) {
        unset($_SESSION[FLASH][$name]);
    }
    // Add the message to the session
    $_SESSION[FLASH][$name] = ['message' => $message, 'type' => $type];
}

// Function to format a flash message into HTML
function format_flash_message(array $flash_message): string {
    return sprintf('<div class="alert alert-%s">%s</div>',
        $flash_message['type'], htmlspecialchars($flash_message['message'])
    );
}

// Function to display a single flash message
function display_flash_message(string $name): void {
    if (!isset($_SESSION[FLASH][$name])) {
        return;
    }

    // Get message from the session
    $flash_message = $_SESSION[FLASH][$name];

    // Delete the flash message from session
    unset($_SESSION[FLASH][$name]);

    // Display the flash message
    echo format_flash_message($flash_message);
}

// Function to display all flash messages
function display_all_flash_messages(): void {
    if (!isset($_SESSION[FLASH])) {
        return;
    }

    // Get flash messages
    $flash_messages = $_SESSION[FLASH];

    // Remove all flash messages
    unset($_SESSION[FLASH]);

    // Show all flash messages
    foreach ($flash_messages as $flash_message) {
        echo format_flash_message($flash_message);
    }
}

// Main function to handle flash messages
function flash(string $name = '', string $message = '', string $type = ''): void {
    if ($name !== '' && $message !== '' && $type !== '') {
        create_flash_message($name, $message, $type);
    } elseif ($name !== '' && $message === '' && $type === '') {
        display_flash_message($name);
    } elseif ($name === '' && $message === '' && $type === '') {
        display_all_flash_messages();
    }
}

// Example usage of creating a flash message
flash('greeting', 'Hi there', FLASH_INFO);
// Example usage of displaying a flash message
flash('success', 'successfully logged in', FLASH_SUCCESS);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flash Messages Example</title>
    <style>
        .alert {
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
        }
        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
        }
        .alert-warning {
            background-color: #fff3cd;
            color: #856404;
        }
        .alert-info {
            background-color: #d1ecf1;
            color: #0c5460;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }
    </style>
</head>
<body>
    <main>
        <h1>Flash Messages</h1>

        <!-- Display the flash messages -->
        <?php 
        // What could be the required parameter for this function : display_flash_message()
        //display_flash_message('success');
        display_all_flash_messages();
        ?>
    </main>
</body>
</html>
