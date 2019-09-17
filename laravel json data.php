<li><button class="dropdown-item" value="{{$amenitie->id}}" type="button" >Edit</button></li>

<script >
$(document).ready(function(){
	$('.modalbtn').click(function(params) {
	var amenities_id = $(this).val();
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

$.ajax({
	type:'POST',
	url:'/get/amenities',
	data: {amenities_id: amenities_id},
	success: function (data) {

		var amenitiedata=JSON.parse(data);

		var amenitie_id =amenitiedata.id;
		document.getElementById('amenities_id').value=amenitie_id;
		}
	});
	});
});
</script>