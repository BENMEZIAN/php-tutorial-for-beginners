<?php

$host = 'localhost';
$db = 'example';
$user = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=UTF8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connected to the $db database successfully!"."<br>";
    echo "-------------------------------------------------------------------"."<br>";

    // Start transaction
    echo "Starting a transaction"."<br>";
    $pdo->beginTransaction();

    // Prepare SQL statement
    // $sql = 'insert into user(username, email) values(?,?)';
    // $statement = $pdo->prepare($sql);
    // $statement->execute(['Malek', 'abdelmalek2018@gmailcom']);
    // $statement = null;
    // echo "User added successfully!"."<br>";

    // $update = 'UPDATE user SET email = ? WHERE user_id = ?';
    // $statement = $pdo->prepare($update);
    // $statement->execute(['abdelmalek2018@gmail.com', 1]);
    // $statement = null;
    // echo "User updated successfully!"."<br>";

    // $stmt = $pdo->prepare("DELETE FROM myTable WHERE id = ?");
    // $stmt->execute([$_SESSION['id']]);
    // $stmt = null;
    // echo "User deleted successfully!"."<br>";

    // $sql = "SELECT * FROM user";
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute();
    // $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // echo '<pre>'.print_r($user,true).'</pre>';
    // echo "Number of users : ".$stmt->rowCount()."<br>";
    // $stmt = null;

    // $sql = "SELECT * FROM user";
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute();
    // while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    //     echo $row['user_id'] ."<br>";
    //     echo $row['username'] ."<br>";
    //     echo $row['email'] ."<br>";
    //     echo "-------------------------------------------------------------"."<br>";
    // }
    // $stmt = null;

    // $sql = "SELECT * FROM user";
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute();
    // $user = $stmt->fetchAll(PDO::FETCH_NUM);
    // echo '<pre>'.print_r($user,true).'</pre>';
    // echo "Number of users : ".$stmt->rowCount()."<br>";
    // $stmt = null;

    // $sql = "SELECT * FROM user";
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute();
    // while($row = $stmt->fetch(PDO::FETCH_NUM)){
    //     echo $row[0] ."<br>";
    //     echo $row[1] ."<br>";
    //     echo $row[2] ."<br>";
    //     echo "-------------------------------------------------------------"."<br>";
    // }
    // $stmt = null;

    // use IN operator
    $sql = "SELECT * FROM user WHERE user_id IN (?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([1, 2]);
    $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo '<pre>'.print_r($user,true).'</pre>';
    echo "Number of users : ".$stmt->rowCount()."<br>";
    $stmt = null;

    // use LIKE operator
    // $sql = "SELECT * FROM user WHERE username LIKE ?";
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute(['%a%']);
    // $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // echo '<pre>'.print_r($user,true).'</pre>';
    // echo "Number of users : ".$stmt->rowCount()."<br>";
    // $stmt = null;


    // $published_year = 2010;
    // $sql = 'CALL get_books_published_after(published_year)'; // Calling a stored procedure with parameters
    // $statement = $pdo->prepare($sql);
    // $statement->bindParam(':published_year', $published_year, PDO::PARAM_INT);
    // $statement->execute();
    // $publishers = $statement->fetchAll(PDO::FETCH_ASSOC);
    // print_r($publishers);

    // Commit the transaction
    $pdo->commit();
    echo "Transaction completed successfully!"."<br>";


} catch (PDOException $e) {
    // Rollback if there was an error
    $pdo->rollBack();
    echo "Failed to complete transaction: " . $e->getMessage();
}

$pdo = null;

echo "-------------------------------------------------------------------"."<br>";
echo "Disconnected from the $db database successfully!"."<br>";

/*
// SQL statement for creating new tables
$statements = [
	'CREATE TABLE authors( 
        author_id   INT AUTO_INCREMENT,
        first_name  VARCHAR(100) NOT NULL, 
        middle_name VARCHAR(50) NULL, 
        last_name   VARCHAR(100) NULL,
        PRIMARY KEY(author_id)
    );',
	'CREATE TABLE book_authors (
        book_id   INT NOT NULL, 
        author_id INT NOT NULL, 
        PRIMARY KEY(book_id, author_id), 
        CONSTRAINT fk_book 
            FOREIGN KEY(book_id) 
            REFERENCES books(book_id) 
            ON DELETE CASCADE, 
            CONSTRAINT fk_author 
                FOREIGN KEY(author_id) 
                REFERENCES authors(author_id) 
                ON DELETE CASCADE
    )'];

// connect to the database
$pdo = require 'connect.php';

// execute SQL statements
foreach ($statements as $statement) {
	$pdo->exec($statement);
}

echo "Tables created successfully!";
*/