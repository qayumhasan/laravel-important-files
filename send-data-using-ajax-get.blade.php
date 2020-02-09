<script>
        $(document).ready(function() {
            $('.compareproduct').on('click', function() {
                var com_id = $(this).val();
                $.ajax({
                    type: 'GET',
                    url: "{{ url('/product/compare') }}/" + com_id,
                    processData: false,
                    success: function(data) {
                        if (data.checkip) {
                            toastr.error("Already This Product Add Compare");


                        } else {
                            toastr.success("product add to compare");

                        }


                    }
                });


            });
        });
    </script>
