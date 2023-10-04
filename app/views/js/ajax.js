$(document).ready(function() {

    function Search() {
        var searchValue = $("input[name='search']").val();      // Lấy value ở ô input
        $.ajax({
            type: 'GET',    // phương thức GET
            url: $("#formSearch").prop("action"),   // Lấy đường dẫn submit của form
            data: {         // Truyền vào chuỗi json với key là name ở ô input
                'search': searchValue,  
            },
            success: function(data) {
                $("#table-result").html(data);
            },
            error: function() {
                alert("Your request is no valid!");
            }
        });
    }

    $('#formSearch').submit(function(e) {
        e.preventDefault();     // Dừng hành động submit của form
        Search();
    });

    $("input.form-control.mr-sm-2").keyup(function () {
        Search();
    });
})