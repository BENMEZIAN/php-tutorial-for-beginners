<?php

function clean_input(string $data): string {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$errors = [];
$interests = [];
$option = '';
$multiple_select = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer et nettoyer les données du formulaire avec des valeurs par défaut
    $email = isset($_POST['email']) ? clean_input($_POST['email']) : '';
    $url = isset($_POST['url']) ? clean_input($_POST['url']) : '';
    $integer = isset($_POST['integer']) ? clean_input($_POST['integer']) : '';
    $float = isset($_POST['float']) ? clean_input($_POST['float']) : '';
    $boolean = isset($_POST['boolean']) ? clean_input($_POST['boolean']) : '';
    $username = isset($_POST['username']) ? clean_input($_POST['username']) : '';
    $date = isset($_POST['date']) ? clean_input($_POST['date']) : '';

    // Traitement des cases à cocher
    if (isset($_POST['interests'])) {
        $interests = array_map('clean_input', $_POST['interests']);
    }

    // Traitement des boutons radio
    if (isset($_POST['option'])) {
        $option = clean_input($_POST['option']);
    }

    // Traitement de la boîte de sélection multiple
    if (isset($_POST['multiple_select'])) {
        $multiple_select = array_map('clean_input', $_POST['multiple_select']);
    }

    // Validation de l'email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email invalide.';
    }

    // Validation de l'URL
    if (!filter_var($url, FILTER_VALIDATE_URL)) {
        $errors[] = 'URL invalide.';
    }

    // Validation de l'entier
    if (filter_var($integer, FILTER_VALIDATE_INT) === false) {
        $errors[] = 'Nombre entier invalide.';
    }

    // Validation du nombre flottant
    if (filter_var($float, FILTER_VALIDATE_FLOAT) === false) {
        $errors[] = 'Nombre flottant invalide.';
    }

    // Validation du booléen
    if (filter_var($boolean, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) === null) {
        $errors[] = 'Booléen invalide.';
    }

    // Validation du nom d'utilisateur (5-15 caractères)
    if (!preg_match('/^[a-zA-Z0-9]{5,15}$/', $username)) {
        $errors[] = 'Nom d\'utilisateur invalide. Il doit contenir entre 5 et 15 caractères alphanumériques.';
    }

    // Validation de la date (YYYY-MM-DD)
    $dateFormat = 'Y-m-d';
    $d = DateTime::createFromFormat($dateFormat, $date);
    if ($d === false || $d->format($dateFormat) !== $date) {
        $errors[] = 'Date invalide. Format attendu : YYYY-MM-DD.';
    }
}
?>








<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Validation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 15px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .error {
            color: #d9534f;
            font-size: 14px;
            margin-bottom: 15px;
        }
        .success {
            color: #5bc0de;
            font-size: 16px;
            margin-bottom: 15px;
        }
        .checkbox-group label,
        .radio-group label,
        .select-group label {
            display: inline-block;
            margin-right: 10px;
        }
        .radio-group,
        .select-group {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Formulaire de Validation</h1>
    <form action="" method="post">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>">

        <label for="url">URL:</label>
        <input type="text" id="url" name="url" value="<?php echo isset($url) ? htmlspecialchars($url) : ''; ?>">

        <label for="integer">Nombre entier:</label>
        <input type="text" id="integer" name="integer" value="<?php echo isset($integer) ? htmlspecialchars($integer) : ''; ?>">

        <label for="float">Nombre flottant:</label>
        <input type="text" id="float" name="float" value="<?php echo isset($float) ? htmlspecialchars($float) : ''; ?>">

        <label for="boolean">Booléen (true/false):</label>
        <input type="text" id="boolean" name="boolean" value="<?php echo isset($boolean) ? htmlspecialchars($boolean) : ''; ?>">

        <label for="username">Nom d'utilisateur (5-15 caractères):</label>
        <input type="text" id="username" name="username" value="<?php echo isset($username) ? htmlspecialchars($username) : ''; ?>">

        <label for="date">Date (YYYY-MM-DD):</label>
        <input type="text" id="date" name="date" value="<?php echo isset($date) ? htmlspecialchars($date) : ''; ?>">

        <!-- Cases à cocher multiples -->
        <fieldset class="checkbox-group">
            <legend>Choisissez vos intérêts :</legend>
            <label><input type="checkbox" name="interests[]" value="sports" <?php if (isset($_POST['interests']) && in_array('sports', $_POST['interests'])) echo 'checked'; ?>> Sports</label>
            <label><input type="checkbox" name="interests[]" value="music" <?php if (isset($_POST['interests']) && in_array('music', $_POST['interests'])) echo 'checked'; ?>> Musique</label>
            <label><input type="checkbox" name="interests[]" value="travel" <?php if (isset($_POST['interests']) && in_array('travel', $_POST['interests'])) echo 'checked'; ?>> Voyage</label>
            <label><input type="checkbox" name="interests[]" value="reading" <?php if (isset($_POST['interests']) && in_array('reading', $_POST['interests'])) echo 'checked'; ?>> Lecture</label>
        </fieldset>

        <!-- Boutons radio -->
        <fieldset class="radio-group">
            <legend>Choisissez une option :</legend>
            <label><input type="radio" name="option" value="option1" <?php if (isset($_POST['option']) && $_POST['option'] === 'option1') echo 'checked'; ?>> Option 1</label>
            <label><input type="radio" name="option" value="option2" <?php if (isset($_POST['option']) && $_POST['option'] === 'option2') echo 'checked'; ?>> Option 2</label>
            <label><input type="radio" name="option" value="option3" <?php if (isset($_POST['option']) && $_POST['option'] === 'option3') echo 'checked'; ?>> Option 3</label>
        </fieldset>

        <!-- Boîte de sélection multiple -->
        <fieldset class="select-group">
            <legend>Choisissez plusieurs options :</legend>
            <label for="multiple-select">Options :</label>
            <select id="multiple-select" name="multiple_select[]" multiple>
                <option value="optionA" <?php if (isset($_POST['multiple_select']) && in_array('optionA', $_POST['multiple_select'])) echo 'selected'; ?>>Option A</option>
                <option value="optionB" <?php if (isset($_POST['multiple_select']) && in_array('optionB', $_POST['multiple_select'])) echo 'selected'; ?>>Option B</option>
                <option value="optionC" <?php if (isset($_POST['multiple_select']) && in_array('optionC', $_POST['multiple_select'])) echo 'selected'; ?>>Option C</option>
                <option value="optionD" <?php if (isset($_POST['multiple_select']) && in_array('optionD', $_POST['multiple_select'])) echo 'selected'; ?>>Option D</option>
            </select>
        </fieldset>

        <input type="submit" value="Envoyer">

        <?php            
            // Afficher les erreurs ou un message de succès
            if (empty($errors)) {
                echo '<div class="success">Tous les champs sont valides !</div>';
            } else {
                foreach ($errors as $error) {
                    echo '<div class="error">' . htmlspecialchars($error) . '</div>';
                }
            }
        ?>
    </form>
</div>
</body>
</html>
