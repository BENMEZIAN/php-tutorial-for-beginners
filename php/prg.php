<?php
session_start(); // Start session to store success message or errors

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and process form data
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $age = trim($_POST['age']);
    
    // Initialize error array
    $errors = [];

    // Validate name
    if (empty($name)) {
        $errors[] = "Please enter your name.";
    }

    // Validate email
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }

    // Validate age
    if (empty($age) || !is_numeric($age) || $age <= 0) {
        $errors[] = "Please enter a valid age.";
    }

    // If no errors, store success message in session and redirect
    if (empty($errors)) {
        $_SESSION['success_message'] = "Hello, $name! Your form was submitted successfully.";
        
        // Clear error messages in case of success
        unset($_SESSION['errors']);
        
        // Redirect to avoid resubmission
        header("Location: prg.php",true,303);
        exit();
    } else {
        // Store errors in session
        $_SESSION['errors'] = $errors;
        
        // Redirect to display errors without resubmitting
        header("Location: prg.php",true,303);
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRG Example Form with Multiple Fields</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #333;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"] {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 10px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #4cae4c;
        }

        .message {
            margin: 10px 0;
            padding: 10px;
            border-radius: 4px;
        }

        .success {
            background-color: #dff0d8;
            color: #3c763d;
        }

        .error {
            background-color: #f2dede;
            color: #a94442;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Submit Your Information</h2>
        
        <!-- Display success message if it exists in session -->
        <?php if (isset($_SESSION['success_message'])): ?>
            <div class="message success">
                <?php echo $_SESSION['success_message']; ?>
                <?php unset($_SESSION['success_message']); // Clear message ?>
            </div>
        <?php endif; ?>

        <!-- Display error messages if they exist in session -->
        <?php if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])): ?>
            <div class="message error">
                <ul>
                    <?php foreach ($_SESSION['errors'] as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php unset($_SESSION['errors']); // Clear errors ?>
        <?php endif; ?>

        <!-- Form to submit multiple fields -->
        <form action="prg.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>

            <label for="age">Age:</label>
            <input type="text" id="age" name="age" required>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
