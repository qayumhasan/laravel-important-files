<form class="form-horizontal my-5" action="{{route('admin.ssl.commerz.setting.update')}}" method="POST"
                enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">SSLCOMMERZ_STORE_ID: *</label>
                    <div class="col-sm-6">
                        ## You need to send types as same name in .env file
                        <input type="hidden" name="types[]" value="SSLCOMMERZ_STORE_ID">
                        ## get and send value in .env file
                        <input type="text" class="form-control" name="SSLCOMMERZ_STORE_ID"  value="{{ env('SSLCOMMERZ_STORE_ID') }}" placeholder="SSLCOMMERZ_STORE_ID" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label text-right">SSLCOMMERZ_STORE_PASSWORD: *</label>
                    <div class="col-sm-6">
                        ## You need to send types as same name in .env file
                        <input type="hidden" name="types[]" value="SSLCOMMERZ_STORE_PASSWORD">
                        ## get and send value in .env file
                        <input type="text" class="form-control" required name="SSLCOMMERZ_STORE_PASSWORD" value="{{ env('SSLCOMMERZ_STORE_PASSWORD') }}" placeholder="SSLCOMMERZ_STORE_PASSWORD" required>
                    </div>
                </div>          
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-blue">Update  SSL Commerz Configuration Setting</button>
                </div>

            </form>
