<?php

// starting Sesstions
session_start();

// Gettin Requests Data.
$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];


//array of Argumans.
$info = ["name" => $name, "username" => $username, "password" => $password];

// Validation
if (isset($_POST['submit'])) {
    if (isset($_POST['username']) && isset($_POST['password'])) {
    // Calling the Function
    register($info);
    
}
else{
    header('location:../views/view-register.php');
    $_SESSION['danger'] = "Please Fill out All fields.";
    return false;
}
}
else{
    header('location:../views/view-register.php');
    $_SESSION['danger'] = "Please Fill out All fields.";
    return false;
}


// registering user.
function register(array $info): bool
{
    // open the file.
    $file = file_get_contents("../data/data.json");
    // convert JSON to the Array.
    $fetch = json_decode($file, true);
    $newUserId = count($fetch['users']) + 1;
    // Creating New user.
    $newUser = $fetch['users'][$newUserId] = [
        "user_id" => $newUserId,
        "name" => $info['name'],
        "username" => $info['username'],
        "password" => $info['password'],
    ];
    // Convert Array to JSON
    $arr_to_json = json_encode($fetch, JSON_PRETTY_PRINT);
    $main = file_put_contents("../data/data.json", $arr_to_json);
    // Sending boolean Response.
    if ($main) {
        $_SESSION['response'] = "You are Registered.";
        return 1;
    } else {
        $_SESSION['response'] = "Connection ERROR 402 Forriben.";
        return 0;
    }
}

