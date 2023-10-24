<?php
    $mail = [
        'title' => 'Biker Shop',
        'email' => 'example@gmail.com',
        'password' => 'password',
    ];

    $domain = 'http://localhost/xedap_shop/';

    $host="localhost";
    $username= "root";
    $password="";
    $database="biker_shop";

    $conn=mysqli_connect($host, $username, $password, $database);
    mysqli_set_charset($conn,'utf8');
    //check database
    if(!$conn)
    {
        die("Connection Faild ". mysqli_connect_errno());
        echo "Something Wrong";
    }
?>