<?php


function UpdateAdminRequest(mixed $data = [])
{
    $password = $data['password'];
    // Return
    if ($password === "" || !isset($password) || isAllWhitespace($password)) {
        return false;
    }
    return true;
}
