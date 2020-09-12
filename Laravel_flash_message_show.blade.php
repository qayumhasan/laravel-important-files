##for show in blade file

 @if(Session::has('errorMsg'))
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>{{ Session::get('errorMsg') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
  @endif
  
  
  
##  In Controller area

session()->flash('errorMsg', 'Email ID or Password not matched!');
            return redirect()->back();

