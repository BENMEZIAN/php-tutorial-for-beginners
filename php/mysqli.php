<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "example";



// Connect to the database
$mysqli = new mysqli($servername, $username, $password,$dbname);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli->set_charset("utf8mb4");

// Prepare the SQL statement
$sql = "SELECT * FROM user WHERE user_id = ?";
$stmt = $mysqli->prepare($sql);

// Bind parameters (e.g., integer `i`, string `s` including (date), double `d`, blob `b`, "d" for double (float) )
$id = 1;
$stmt->bind_param("i", $id); // Change `s` depending on the parameter type

// Execute the statement
$stmt->execute();

// Fetch results
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    echo $row["user_id"]. "<br>";
    echo $row["username"]. "<br>";
    echo $row["email"]. "<br>";
    // echo "Column1: " . $row["column1"] . " - Column2: " . $row["column2"] . "<br>";
}

// Close the statement and connection
$stmt->close();
$mysqli->close();

/*

// Prepare an INSERT statement
$sql = "INSERT INTO table_name (column1, column2) VALUES (?, ?)";
$stmt = $mysqli->prepare($sql);

// Bind parameters and specify types
$column1_value = "value1";
$column2_value = "value2";
$stmt->bind_param("ss", $column1_value, $column2_value);

// Execute the statement
if ($stmt->execute()) {
    echo "New record created successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$mysqli->close();

*/

/*

// Prepare an UPDATE statement
$sql = "UPDATE table_name SET column1 = ? WHERE column2 = ?";
$stmt = $mysqli->prepare($sql);

// Bind parameters
$new_value = "newValue";
$condition_value = "someCondition";
$stmt->bind_param("ss", $new_value, $condition_value);

// Execute the statement
if ($stmt->execute()) {
    echo "Record updated successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$mysqli->close();

*/

/*

// Prepare a DELETE statement
$sql = "DELETE FROM table_name WHERE column = ?";
$stmt = $mysqli->prepare($sql);

// Bind parameters
$delete_value = "value";
$stmt->bind_param("s", $delete_value);

// Execute the statement
if ($stmt->execute()) {
    echo "Record deleted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$mysqli->close();
*/

/*
CREATE TABLE files (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255),
    file_data BLOB
);

PHP Code to Insert a BLOB (Binary Data)
---------------------------------------
// Database connection
$mysqli = new mysqli("hostname", "username", "password", "database");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Path to the file you want to upload (for example, an image)
$file_path = "path_to_image.jpg";
$file_data = file_get_contents($file_path);  // Read the file content into a variable

// Prepare the SQL query
$sql = "INSERT INTO files (filename, file_data) VALUES (?, ?)";
$stmt = $mysqli->prepare($sql);

// Bind parameters (s for string and b for blob)
$filename = basename($file_path);  // Get the name of the file
$stmt->bind_param("sb", $filename, $file_data); // s = string (filename), b = blob (file data)

// Execute the query
if ($stmt->execute()) {
    echo "File uploaded successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$mysqli->close();

*/