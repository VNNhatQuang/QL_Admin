<?php

function renderView($viewName, $data = []) {
    // Trích xuất dữ liệu vào biến phụ thuộc vào key trong mảng $data
    extract($data);
    // Hiển thị view
    include "app/views/$viewName.view.php";
}