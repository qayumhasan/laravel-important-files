 <script>
        $(document).on("click", "#delete", function (e) {
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
                title: "Are you sure to delete?",
                text: "Once Delete, This will be Permanently Delete!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = link;
                    } else {
                        swal("Safe Data!");
                    }
                });
        });
    </script>
    <script>
        $(document).on("submit", "#multiple_delete", function (e) {
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
                title: "Are you sure to delete all?",
                text: "Once Delete, This will be Permanently Delete!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        document.getElementById('multiple_delete').submit();
                    } else {
                        swal("Safe Data!");
                    }
                });
        });
    </script>
