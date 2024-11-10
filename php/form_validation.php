<?php

const NAME_REQUIRED = 'Please enter your name';
const EMAIL_REQUIRED = 'Please enter your email';
const EMAIL_INVALID = 'Please enter a valid email';
const TERMS_REQUIRED = 'You must agree to the terms and conditions';
const CONTACT_METHOD_REQUIRED = 'Please select a contact method';


$errors = [];
$inputs = [];

// if REQUEST_METHOD is post
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // sanitize and validate name
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $inputs['name'] = $name;

    if ($name) {
        $name = trim($name);
        if ($name === '') {
            $errors['name'] = NAME_REQUIRED;
        }
    } else {
        $errors['name'] = NAME_REQUIRED;
    }

    // sanitize & validate email
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $inputs['email'] = $email;

    if ($email) {
        // validate email
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        if ($email === false) {
            $errors['email'] = EMAIL_INVALID;
        }
    } else {
        $errors['email'] = EMAIL_REQUIRED;
    }

    // Validate terms agreement checkbox
    $terms = filter_input(INPUT_POST, 'terms', FILTER_VALIDATE_BOOLEAN);
    if (!$terms) {
        $errors['terms'] = TERMS_REQUIRED;
    }

    // Validate radio button for contact method
    $contactMethod = filter_input(INPUT_POST, 'contact_method', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $inputs['contact_method'] = $contactMethod;
       
    if (!$contactMethod) {
       $errors['contact_method'] = CONTACT_METHOD_REQUIRED;       
    }

    // Process topics of interest checkboxes
    $topics = filter_input(INPUT_POST, 'topics', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
    $inputs['topics'] = $topics ?: [];  // Default to empty array if no topics are selected


    $selected_colors = filter_input(INPUT_POST,'colors',FILTER_SANITIZE_FULL_SPECIAL_CHARS,FILTER_REQUIRE_ARRAY);


}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscribe</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color: #f5f5f5;
            padding: 20px;
        }

        main {
            background-color: #fff;
            padding: 2em;
            max-width: 600px;
            width: 100%;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        h1 {
            font-size: 2em;
            color: #333;
            text-align: center;
            margin-bottom: 1em;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 1em;
        }

        header h1 {
            font-size: 1.8em;
            color: #333;
            text-align: center;
            margin-bottom: 0.2em;
        }

        header p {
            color: #666;
            text-align: center;
            margin-bottom: 1.5em;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 0.5em;
            color: #333;
        }

        input[type="text"],
        input[type="checkbox"] {
            padding: 0.75em;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1em;
            transition: border-color 0.3s ease;
        }

        input[type="text"].error {
            border-color: #f44336;
        }

        .error-message {
            color: #f44336;
            font-size: 0.9em;
            margin-top: 0.3em;
        }

        .checkbox-group {
            margin-top: 1em;
        }

        .checkbox-group label {
            font-weight: normal;
            display: flex;
            align-items: center;
            gap: 0.5em;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 0.75em;
            font-size: 1em;
            font-weight: bold;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        section {
            margin-top: 1.5em;
            text-align: center;
        }

        section h2 {
            font-size: 1.5em;
            color: #4CAF50;
            margin-bottom: 1em;
        }

        section p {
            color: #666;
            font-size: 1em;
            margin-bottom: 1em;
        }

        ol {
            text-align: left;
            margin: 1em auto;
            padding-left: 20px;
            color: #333;
        }

        ol li {
            margin-bottom: 0.5em;
            line-height: 1.5;
        }

        ol li a {
            color: #4CAF50;
            text-decoration: none;
        }

        ol li a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <main>
        <h1>Form Validation</h1>
        <form action="" method="post">
            <header>
                <h1>Get FREE Updates</h1>
                <p>Join us for FREE to get email updates!</p>
            </header>
            <div>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" placeholder="Full Name" 
                       value="<?php echo htmlspecialchars($inputs['name'] ?? '') ?>" 
                       class="<?php echo isset($errors['name']) ? 'error' : '' ?>">
                <?php if (isset($errors['name'])): ?>
                    <p class="error-message"><?php echo $errors['name'] ?></p>
                <?php endif; ?>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" placeholder="Email Address" 
                       value="<?php echo htmlspecialchars($inputs['email'] ?? '') ?>" 
                       class="<?php echo isset($errors['email']) ? 'error' : '' ?>">
                <?php if (isset($errors['email'])): ?>
                    <p class="error-message"><?php echo $errors['email'] ?></p>
                <?php endif; ?>
            </div>

            <!-- Single Checkbox for Terms Agreement -->
            <div class="checkbox-group">
                <label>
                    <input type="checkbox" name="terms" id="terms">
                    I agree to the terms and conditions
                </label>
                <?php if (isset($errors['terms'])): ?>
                    <p class="error-message"><?php echo $errors['terms']; ?></p>
                <?php endif; ?>                
            </div>

            <!-- Multiple Checkboxes for Topics of Interest -->
            <div class="checkbox-group">
                <p>Select topics of interest:</p>
                <label>
                    <input type="checkbox" name="topics[]" value="Technology"> Technology
                </label>
                <label>
                    <input type="checkbox" name="topics[]" value="Health"> Health
                </label>
                <label>
                    <input type="checkbox" name="topics[]" value="Finance"> Finance
                </label>
                <label>
                    <input type="checkbox" name="topics[]" value="Education"> Education
                </label>
                <label>
                    <input type="checkbox" name="topics[]" value="Entertainment"> Entertainment
                </label>
            </div>

            <!-- Radio Button Group for Preferred Contact Method -->
            <div class="radio-group">
                <p>Preferred Contact Method:</p>
                <label>
                    <input type="radio" name="contact_method" value="Email" <?php echo ($inputs['contact_method'] ?? '') === 'Email' ? 'checked' : ''; ?>> Email
                </label>
                <label>
                    <input type="radio" name="contact_method" value="Phone" <?php echo ($inputs['contact_method'] ?? '') === 'Phone' ? 'checked' : ''; ?>> Phone
                </label>
                <label>
                    <input type="radio" name="contact_method" value="SMS" <?php echo ($inputs['contact_method'] ?? '') === 'SMS' ? 'checked' : ''; ?>> SMS
                </label>
                <?php if (isset($errors['contact_method'])): ?>
                    <p class="error-message"><?php echo $errors['contact_method']; ?></p>
                <?php endif; ?>
            </div>

            <!-- Select Dropdown for Background Color -->
            <div>
                <label for="colors">Background Color:</label>
                <select name="colors[]" id="colors" multiple>
                    <option value="red">Red</option>
                    <option value="green">Green</option>
                    <option value="blue">Blue</option>
                    <option value="purple">Purple</option>
                    <option value="magenta">Magenta</option>
                    <option value="cyan">Cyan</option>
                </select>
            </div>

            <button type="submit">Subscribe</button>
        </form>

        <?php if (empty($errors)) : ?>
            <section>
                <h2>Thanks <?php echo htmlspecialchars($name) ?> for your subscription!</h2>
                <p>Please follow the steps below to complete your subscription:</p>
                <ol>
                    <li>Check your email (<?php echo htmlspecialchars($email) ?>) - Find the message sent from webmaster@phptutorial.net</li>
                    <li>Click to confirm - Click on the link in the email to confirm your subscription.</li>
                </ol>

                <?php if (!empty($inputs['topics'])) : ?>
                    <p>Your selected topics of interest:</p>
                    <ul>
                        <?php foreach ($inputs['topics'] as $topic) : ?>
                            <li><?php echo htmlspecialchars($topic); ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <p>Preferred Contact Method: <?php echo htmlspecialchars($inputs['contact_method'] ?? ''); ?></p>
                
                <?php if ($selected_colors) : ?>
                    <p>You selected the following colors:</p>
                    <ul>
                        <?php foreach ($selected_colors as $color) : ?>
                            <li style="color:<?php echo $color ?>"><?php echo $color ?></li>
                        <?php endforeach ?>
                    </ul><br>
                <?php else : ?>
                    <p>You did not select any color.</p>
                <?php endif ?>
            </section>
        <?php endif; ?>
    </main>
</body>
</html>