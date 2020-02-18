 public function socialloginupdate(Request $request){

      foreach ($request->types as $key => $type) {
                $this->overWriteEnvFile($type, $request[$type]);
        }
        return back();
    }

    public function overWriteEnvFile($type, $val)
    {
        $path = base_path('.env');
        if (file_exists($path)) {
            $val = '"'.trim($val).'"';
            if(strpos(file_get_contents($path), $type) >= 0){
                file_put_contents($path, str_replace(
                    $type.'="'.env($type).'"', $type.'='.$val, file_get_contents($path)
                ));
            }
            else{
                file_put_contents($path, file_get_contents($path).$type.'='.$val);
            }
      }

    }
    
    
    
    
    //In html//

	<section class="page_area">
	     <div class="row">
        		<div class="col-lg-6">
        		     <div class="panel">
              			<div class="panel_header">
              			     <div class="panel_title"><span class="text-center">Stripe Gatwway</span></div>
              			</div>
            			    <div class="panel_body">
                        <form class="form-horizontal" action="{{ url('admin/sociallogin/update') }}" method="POST">
                         @csrf
                            <div class="form-group row">
                                <input type="hidden" name="types[]" value="STRIPE_KEY">
                                <div class="col-md-1"></div>
                                <div class="col-lg-2">
                                    <label class="control-label">STRIPE Key</label>
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="STRIPE_KEY" value="{{ env('STRIPE_KEY') }}" placeholder="Stripe Key" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <input type="hidden" name="types[]" value="STRIPE_SECRET">
                                <div class="col-md-1"></div>
                                <div class="col-lg-2">
                                    <label class="control-label">STRIPE Secret</label>
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="STRIPE_SECRET" value="{{ env('STRIPE_SECRET') }}" placeholder="STRIPE Secret" required>
                                </div>
                			    </div>
                          <div class="form-group row">
                              <div class="col-lg-12 text-center">
                                  <button class="btn btn-success" type="submit">Update</button>
                              </div>
                          </div>
                    </form>
        		       </div>
        	    	</div>
              </div>
        	    
	</section>

@endsection
