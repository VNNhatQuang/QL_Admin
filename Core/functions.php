<?php


/**
 * Dump and Die
 *
 * @param mixed $value
 * @return void
 */
function dd($value) {
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}


/**
 * Hàm kiểm tra biến là toàn ký tự trắng
 *
 * @param string $input
 * @return boolean
 */
function isAllWhitespace($input) {
    // Loại bỏ các khoảng trắng ở đầu và cuối chuỗi
    $trimmedInput = trim($input);
    // Kiểm tra chuỗi còn lại có rỗng hay không
    return empty($trimmedInput);
}
