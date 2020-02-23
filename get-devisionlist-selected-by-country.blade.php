<script>
    $(document).ready(function() {
        $('#user_country').click(function(params) {
			var country_id = $(this).val();
			
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'GET',
                url: "{{ url('/user/division/name') }}/" +country_id,
				dataType:"json",
                success: function(data) {
                    $('#user_division').empty();
                    $('#user_division').append(' <option value="0">--Please Select Your Division--</option>');
                    $.each(data,function(index,divisionobj){
                        $('#user_division').append('<option value="' + divisionobj.id + '">'+divisionobj.name+'</option>');
                    });
                }
            });
		 });
		});
     
</script>
