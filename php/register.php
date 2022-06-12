<?php
if (isset($_POST['submit'])) {
    $username = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    registerUser($username, $email, $password);
}

function registerUser($username, $email, $password)
{
    //save data into the file
    $user_information = array(
        'username' => $username,
        'email' => $email,
        'password' => $password
    );
    $file = "../storage/users.csv";
    $userdata = fopen($file, 'a');
    fputcsv($userdata, $user_information);
    fclose($userdata);

    // start session
    session_start();
    $_SESSION['username'] = $username;
    header('Location: /dashboard.php');
}
echo "HANDLE THIS PAGE";
