<?php
if (isset($_POST['upload'])) {
    $currentDirectory = getcwd();
    $uploadDirectory = "/uploads/";
    $fullUploadPath = $currentDirectory . $uploadDirectory;

    $errors = []; // Store errors here
    $message = [];

    // Check if the upload directory exists; if not, create it
    if (!is_dir($fullUploadPath)) {
        if (!mkdir($fullUploadPath, 0755, true)) {
            $errors[] = "Failed to create directory for file uploads.";
        }
    }

    // Proceed only if directory creation was successful or if it already exists
    if (empty($errors)) {
        // Loop through each file in the 'files' array
        foreach ($_FILES['files']['name'] as $key => $fileName) {
            // Get file details
            $fileName = $_FILES['files']['name'][$key];
            $fileTmpName = $_FILES['files']['tmp_name'][$key];
            $fileSize = $_FILES['files']['size'][$key];
            $fileError = $_FILES['files']['error'][$key];
            $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            // Allowed file types
            $allowedTypes = ['jpg', 'jpeg', 'png', 'pdf', 'docx'];

            if (in_array($fileExt, $allowedTypes)) {
                if ($fileError === 0) {
                    if ($fileSize < 5 * 1024 * 1024) { // Limit to 5 MB
                        $fileDestination = $fullUploadPath . basename($fileName);

                        if (move_uploaded_file($fileTmpName, $fileDestination)) {
                            $message[] = "File '$fileName' uploaded successfully.";
                        } else {
                            $errors[] = "There was an error moving the file '$fileName'.";
                        }
                    } else {
                        $errors[] = "File '$fileName' is too large. Maximum allowed size is 5 MB.";
                    }
                } else {
                    $errors[] = "An error occurred during upload of file '$fileName'. Error code: $fileError";
                }
            } else {
                $errors[] = "File type not allowed for file '$fileName'. Allowed types: " . implode(", ", $allowedTypes);
            }
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
        }
        
        h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 1rem;
            text-align: center;
        }
        
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        
        label {
            font-weight: bold;
            margin-bottom: 8px;
        }
        
        input[type="file"] {
            margin-bottom: 1rem;
        }
        
        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div>
        <h2>Upload a File</h2>
        <form action="upload_multiple_files.php" method="POST" enctype="multipart/form-data">
            <label for="file">Choose a file:</label>
            <input type="file" name="files[]" id="file" multiple required>
            <button type="submit" name="upload">Upload</button>
            <?php
                if(empty($errors)){
                    foreach ($message as $msg) {
                        echo "<p style='color: green;'>$msg</p>";
                    }
                }else{
                    foreach ($errors as $error) {
                        echo "<p style='color: red;'>$error</p>";
                    }
                }
            ?>
        </form>
    </div>
</body>
</html>