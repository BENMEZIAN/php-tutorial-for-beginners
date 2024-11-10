<?php

$pattern = '{\d+}';
$message = 'PHP 8 was released on November 26, 2020';

if (preg_match_all($pattern, $message,$matches)) {
    echo '<pre>'.print_r($matches,true).'</pre>';
} else {
    echo "There is no match";
}

echo preg_replace($pattern, '%d', $message)."<br>";
echo "-------------------------------------------------------------"."<br>";

$emailPattern = '/[A-Za-z0-9-_.+]+@[A-Za-z.-]{2,}/';
$emails = ['abdelmalekbenmeziane2018@gmail.com','Abdelmalekbenmeziane2018@gmail.com','abdelmalek.benmeziane2018@gmail.com',
'john.doe@example.com','jane-doe@subdomain.example.co.uk','user123@domain.org','user.name+label@domain.com','firstname.lastname@company.biz',
'first_last@domain.name','someone@domain.museum','user@domain.travel','user@domain.com','user@domain-with-dash.com'];

foreach ($emails as $email) {
    if (preg_match($emailPattern, $email)) {
        echo "$email is a valid email address."."<br>";
    } else {
        echo "$email is not a valid email address."."<br>";
    }
}
echo "-------------------------------------------------------------"."<br>";

$PhoneNumberPattern = '/\((\+\d+)\)\d{10}/';
$phoneNumbers = ['(+213)0676500028','(+213)0541726630', '(+213)0779453527','(+216)55555555','(+216)5555555555','(+216)555555555555','(+216)55555555555555'];

foreach ($phoneNumbers as $phoneNumber) {
    if (preg_match($PhoneNumberPattern, $phoneNumber)) {
        echo "$phoneNumber is a valid phone number."."<br>";
    } else {
        echo "$phoneNumber is not a valid phone number."."<br>";
    }
}
echo "-------------------------------------------------------------"."<br>";

$URLpattern = '/https?:\/\/(www\.)?[A-Za-z0-9.-]+\.[A-Za-z]{2,}(\/\S*)?/';
$URLs = ['https://regexr.com/882jn','https://www.phptutorial.net/php-tutorial/php-regular-expressions/','https://chatgpt.com/c/672f6071-ba20-8009-be69-a3ff0605f906'];

foreach ($URLs as $URL) {
    if (preg_match($URLpattern, $URL)) {
        echo "$URL is a valid URL."."<br>";
    } else {
        echo "$URL is not a valid URL."."<br>";
    }
}
echo "-------------------------------------------------------------"."<br>";

$DatePattern = '/(0[1-9]|[12][0-9]|3[01])-(0[1-9]|1[0-2])-\d{4}/';
$Dates = ['01-01-2022','01-02-2022','01-03-2022','01-04-2022','01-05-2022','01-06-2022','01-07-2022'];

foreach ($Dates as $Date) {
    if (preg_match($DatePattern, $Date)) {
        echo "$Date is a valid date."."<br>";
    } else {
        echo "$Date is not a valid date."."<br>";
    }
}
echo "-------------------------------------------------------------"."<br>";

$IPpattern = '/(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)/';
$IPs = ['237.84.2.178','89.207.132.170','237.84.2.178','237.84.2.178'];

foreach ($IPs as $IP) {
    if (preg_match($IPpattern, $IP)) {
        echo "$IP is a valid IP address."."<br>";
    } else {
        echo "$IP is not a valid IP address."."<br>";
    }
}
echo "-------------------------------------------------------------"."<br>";

$HexadecimalColorPattern = '/#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})/';
$HexadecimalColors = ['#FF0000','#00FF00','#0000FF'];

foreach ($HexadecimalColors as $HexadecimalColor) {
    if (preg_match($HexadecimalColorPattern, $HexadecimalColor)) {
        echo "$HexadecimalColor is a valid hexadecimal color."."<br>";
    } else {
        echo "$HexadecimalColor is not a valid hexadecimal color."."<br>";
    }
}
echo "-------------------------------------------------------------"."<br>";

$UsernamePattern = '/[a-zA-Z0-9_.]{3,20}/';
$Usernames = ['user123','user123456','user_123','user123456789','user.1234567890'];

foreach ($Usernames as $Username) {
    if (preg_match($UsernamePattern, $Username)) {
        echo "$Username is a valid username."."<br>";
    } else {
        echo "$Username is not a valid username."."<br>";
    }
}
echo "-------------------------------------------------------------"."<br>";

$PasswordPattern = '/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{10,}/';
$Passwords = ['Password123','password123','Password123!','Password123@','Password123#','Password123$','Password123%','Password123^','Password123&','Password123*'];

foreach ($Passwords as $Password) {
    if (preg_match($PasswordPattern, $Password)) {
        echo "$Password is a valid password."."<br>";
    } else {
        echo "$Password is not a valid password."."<br>";
    }
}
echo "-------------------------------------------------------------"."<br>";

$PostalCodePattern = '/\d{5}/';
$codes = ['16027','16000','16019'];

foreach ($codes as $code) {
    if (preg_match($PostalCodePattern, $code)) {
        echo "$code is a valid postal code."."<br>";
    } else {
        echo "$code is not a valid postal code."."<br>";
    }
}
echo "-------------------------------------------------------------"."<br>";
