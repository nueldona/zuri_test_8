<?php
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $newpassword = $_POST['password'];

    resetPassword($email, $newpassword);
}

function resetPassword($email, $newpassword)
{
    $file = "../storage/users.csv";
    $handle = fopen($file, 'r');
    $userdata = fgetcsv($handle);

    if (!empty($userdata)) {
        for ($i = 0; $i < count($userdata); $i++) {
            if ($userdata[1] == $email) {
                changePassword($userdata[0], $email, $newpassword);
            } else {
                echo 'User does not exist';
            }
        }
        fclose($handle);
    } else {
        echo 'User Auth Error!!! Please register your account';
    }
}

function changePassword($username, $email, $newpassword)
{
    $user_new_information = array(
        'username' => $username,
        'email' => $email,
        'password' => $newpassword
    );
    $file = "../storage/users.csv";
    $handle = fopen($file, 'w');
    fputcsv($handle, $user_new_information);
    fclose($handle);
    echo 'password changed successfully';
}

echo "HANDLE THIS PAGE";
