

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="heading"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="updateform" action="" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Purpose :</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(".editmodal").click(function() {
            var modal = $(this)
            var data = modal.data('whatever');
            var action = modal.data('action');
            document.updateform.action = action;
            document.getElementById('heading').innerHTML = 'UPDATE  ' + data.type.toUpperCase();
            document.getElementById('name').value =data.name;
        });
    });
</script>

<script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('submit', '#add_income_form', function(e){
                e.preventDefault();
                
                var url = $(this).attr('action');
                var type = $(this).attr('method');
                var request = $(this).serialize();
                $.ajax({
                    url:url,
                    type:type,
                    data: request,
                    success:function(data){
                        //log(data);
                    
                        $('#add_income_form')[0].reset();
                        $('#editModal').modal('hide');
                        window.location = "{{ url()->current() }}";
                    },
                    error:function(err){
                        $('.loading_button').hide();
                        $('.submit_button').show();
                        //log(err.responseJSON.errors);
                        if(err.responseJSON.errors.header_id){
                            $('.header_error').html('Income header is required');
                            
                            $('.header').addClass('is-invalid');
                        }else{
                            $('.header_error').html('');
                            $('.header').removeClass('is-invalid');
                        }
                        if(err.responseJSON.errors.amount){
                            $('.amount_error').html('');
                            $('.amount').removeClass('is-invalid');
                            $('.amount_error').html(err.responseJSON.errors.amount[0]);
                            $('.amount').addClass('is-invalid');
                        }else{
                            $('.amount_error').html('');
                            $('.amount').removeClass('is-invalid');
                        }
                    }
                });
            });
        });
    </script> 
