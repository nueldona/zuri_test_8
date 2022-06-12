<?php
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    loginUser($email, $password);
}

function loginUser($email, $password)
{
    $user_auth = false;

    $file = "../storage/users.csv";
    $handle = fopen($file, 'r');
    $userdata = fgetcsv($handle);

    if (!empty($userdata)) {
        for ($i = 0; $i < count($userdata); $i++) {
            if ($userdata[1] == $email && $userdata[2] == $password) {
                $user_auth = true;
                session_start();
                $_SESSION['username'] = $userdata[0];
                break;
            } else {
                $user_auth = false;
                break;
            }
        }
        fclose($handle);

        if ($user_auth) {
            header('Location: /dashboard.php');
        } else {
            echo 'User Auth Error!!! user does not exist';
        }
    } else {
        echo 'User Auth Error!!! Please register your account';
    }
}

echo "HANDLE THIS PAGE";
