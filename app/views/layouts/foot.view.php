<br>
    <br>

    <?php include "footer.view.php" ?>

    <script>
        var destroyForm = document.querySelectorAll("#destroy");
        destroyForm.forEach(form => {
            form.addEventListener("submit", function(event) {
                if(confirm("Xác nhận xóa") == false)
                    event.preventDefault();
            });
        });
    </script>


    <script src="app/views/js/ajax.js"></script>

</body>

</html>