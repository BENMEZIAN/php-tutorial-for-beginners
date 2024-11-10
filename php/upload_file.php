<?php
if (isset($_POST['upload'])) {
    $currentDirectory = getcwd();
    $uploadDirectory = "/uploads/";
    $fullUploadPath = $currentDirectory . $uploadDirectory;

    $errors = []; // Store errors here
    $success = [];

    // Check if the upload directory exists; if not, create it
    if (!is_dir($fullUploadPath)) {
        if (!mkdir($fullUploadPath, 0755, true)) { // 0755 permissions, 'true' to create nested directories if needed
            $errors[] = "Failed to create directory for file uploads.";
        }
    }

    // Proceed only if directory creation was successful or if it already exists
    if (empty($errors)) {
        // Get file details
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        // Allowed file types
        $allowedTypes = ['jpg', 'jpeg', 'png', 'pdf', 'docx'];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (in_array($fileExt, $allowedTypes)) {
            if ($fileError === 0) {
                if ($fileSize < 5 * 1024 * 1024) { // Limit to 5 MB
                    $fileDestination = $fullUploadPath . basename($fileName);

                    if (move_uploaded_file($fileTmpName, $fileDestination)) {
                        $message[] = "File uploaded successfully.";
                    } else {
                        $errors[] = "There was an error moving the uploaded file.";
                    }
                } else {
                    $errors[] = "File size is too large. Maximum allowed size is 5 MB.";
                }
            } else {
                $errors[] = "An error occurred during file upload. Error code: $fileError";
            }
        } else {
            $errors[] = "File type not allowed. Allowed types: " . implode(", ", $allowedTypes);
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
        <form action="upload_file.php" method="POST" enctype="multipart/form-data">
            <label for="file">Choose a file:</label>
            <input type="file" name="file" id="file" required>
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