<?php

include_once __DIR__ . "/../config.php";

$long_opts = [
    "add",
    "delete",
    "update",
    "user:",
    "email::",
    "password::"
];

$opts = getopt("", $long_opts);

if (isset($opts['add'])) {
    echo "Add user\n";
    $user = [
        "username" => $opts['user'],
        "email" => $opts['email'],
        "password" => $opts['password']
    ];
    \core\mc\user::register($user);
    echo "User added\n";
    exit();
}

if (isset($opts['delete'])) {
    echo "Delete user\n";
    echo "Not implemented\n";
    exit();
}

if (isset($opts['update'])) {
    echo "Update user\n";
    echo "Not implemented\n";
    exit();
}

echo "User management\n";
echo "Usage: php users.php [--add] [--delete] [--update] " .
    "[--user=<username>] [--email=<email>] [--password=<password>]\n";
