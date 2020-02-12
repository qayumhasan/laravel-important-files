<script>
    $(document).ready(function() {
        $('.modalbtn').click(function(params) {
            var hostel_id = $(this).data('id');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: "{{ url('/admin/hostel/edit/') }}",
                data: {
                    hostel_id: hostel_id
                },
                success: function(data) {
                    var hostelsdata = JSON.parse(data);
                    var hostel_id = hostelsdata.id;
                    var hostel_name = hostelsdata.hostel_name;
                   

                    document.getElementById('hostel_id').value = hostel_id;
                
                    

                    if(hostel_status){
                        $( "#hostel_status" ).prop( "checked", true );
                    }else{
                        $( "#hostel_status" ).prop( "checked", false );
                    }

                }
            });
        });
    });
</script>
@endsection
