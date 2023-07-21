<?php

include_once "app/models/Admin.php";


function StoreAdminRequest(mixed $data = [])
{
    $tendn = $data['tendn'];
    $password = $data['password'];
    $admin = new Admin();
    // Return
    if ($tendn == "" || $tendn == null || $admin->IdExits($tendn)) {
        return false;
    }
    if ($password === "" || !isset($password) || isAllWhitespace($password)) {
        return false;
    }
    return true;
}
