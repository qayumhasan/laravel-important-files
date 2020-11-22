##in blade file
<button data-toggle="modal" data-target="#exampleModal1" data-whatever="{{$row}}"></button> | 
*** Just add "data-whatever={{$row}}" in button ***
## in script file

<script>
    $(document).ready(function() {
        $(".editmodal").click(function() {
            var modal = $(this)
            var data = modal.data('whatever');
            document.getElementById('update_id').value = data.id;
            document.getElementById('update_apply_date').value = data.apply_date;
            document.getElementById('update_leave_form').value = data.leave_form;
            document.getElementById('update_leave_to').value = data.leave_to;
            document.getElementById('update_reason').value = data.reason;
            
        });
    });
</script>
