<div class="modal fade bd-example-modal-lg" id="myModal1">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">Add Income</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="add_income_form" class="form-horizontal" action="{{ route('admin.income.store') }}" method="POST">
                    @csrf

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label><b>Invoice No :</b></label>
                            <input type="text" class="form-control" value="SI{{$invoiceId}}" name="invoice_no" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label><b>Date :</b></label>
                            <input readonly type="text" class="form-control readonly_field date_picker" value="{{ date('d-m-Y') }}" name="date">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label><b>Header :</b></label>
                            <select name="header_id" class="form-control header">
                                <option value="">Select Header</option>
                                @foreach ($headers as $header)
                                    <option value="{{ $header->id }}"> {{ $header->name }} </option>
                                @endforeach
                            </select>
                            <div class="text-danger errro header_error"></div>
                        </div>
                        
                    </div>

                    <div class="form-group row">                        
                        <div class="col-sm-12">
                            <label><b>Amount :</b></label>
                            <input type="number"  class="form-control amount" placeholder="Amount" name="amount">
                            <span class="text-danger  errro amount_error"></span>
                        </div>
                        
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label><b>Note (Opt) :</b></label>
                            <textarea name="note" id="" cols="10" placeholder="Note" rows="3" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal" aria-label=""> Close</button>
                        <button type="button" class="btn btn-sm loading_button btn-blue">Loading...</button>
                        @if (json_decode($userPermits->income_module, true)['income']['add'] == 1)
                            <button type="submit" class="btn btn-sm submit_button btn-blue">Submit</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('submit', '#add_income_form', function(e){
                e.preventDefault();
                $('.loading_button').show();
                $('.submit_button').hide();
                var url = $(this).attr('action');
                var type = $(this).attr('method');
                var request = $(this).serialize();
                $.ajax({
                    url:url,
                    type:type,
                    data: request,
                    success:function(data){
                        //log(data);
                        toastr.success(data.successMsg);
                        $('.loading_button').hide();
                        $('.submit_button').show();
                        $('.error').html('');
                        $('#add_income_form')[0].reset();
                        $('#myModal1').modal('hide');
                         setInterval(function() {
                        window.location = "{{ url()->current() }}";
                    }, 700);
                        
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
