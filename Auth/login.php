<?php

// Getting Data
$username =  $_POST['username'];
$password = $_POST['password'];

// Publising to Array.
$info = ["username"=>$username,"password"=>$password];
// Validation.
if (isset($_POST['submit'])) {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // calling function .
        login($info);
    }
}

// showing the result.
if (login($info)) {
    echo "ورود موفقیت‌آمیز بود.";
} else {
    echo "نام کاربری یا رمز عبور نادرست است.";
}

// function login.
function login(array $info): bool {
// getting file.
$file = file_get_contents("../data/data.json");

// checking exits file.
if ($file === false) {
    echo "خطا در خواندن فایل JSON.";
    return false;
}

// convert JSON to Array.
$fetches = json_decode($file, true);

// Checking exits users.
if (!isset($fetches['users'])) {
    echo "کاربران موجود نیستند.";
    return false;
}

// Fetching Users.
foreach ($fetches['users'] as $fetch) {
    // checking user exits.
    if ($fetch['username'] === $info['username'] && $fetch['password'] === $info['password']) {
        return true;
    }
}

return false; 
}
