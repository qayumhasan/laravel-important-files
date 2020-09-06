## in controller area ##

public function login(Request $request)
     {
         
        $data = request()->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
           
            $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
            if(Auth::guard('admin')->attempt(array($fieldType => $request['username'], 'password' => $request['password'])))
            {
                return redirect()->intended(route('admin.home'));
            }else{
                return redirect()->route('login')
                    ->with('error','Email-Address And Password Are Wrong.');
            }
     }
     
 ## In Blade File ##
 
 <form action="{{route('admin.login')}}" method="post" class="d-block">
								@csrf
								<div class="form-group icon_parent">
									<input type="text" placeholder="E-mail" value="{{old('username')}}" name="username" id="email" class="form-control bg-transparent border-0 pl-5">
									<span class="icon_soon_bottom_left"><i class="fas fa-envelope"></i></span>
								</div>

								<span class="d-block p-0" role="alert">
									@error('username')
										<strong class="text-danger">{{$message}}</strong>
									@enderror
                        		</span>
								<div class="form-group icon_parent">
									<input type="password" name="password" id="password" class="form-control bg-transparent border-0 pl-5" placeholder="Password">
									<span class="icon_soon_bottom_left"><i class="fas fa-unlock"></i></span>
								</div>
								<span class="d-block p-0" role="alert">
									@error('password')
										<strong class="text-danger">{{$message}}</strong>
									@enderror
                        		</span>
								<div class="row">
									<div class="col-6 form-group">
										<label class="chech_container fs-14">Remember me
											<input type="checkbox" >
											<span class="checkmark bg-transparent"></span>
										</label>
									</div>
									<div class="col-6 form-group">
										<a href="forget.html" class="text-white fs-14 float-right">Forget Password</a>
									</div>
								</div>
								

								<div class="form-group">
									<button type="submit" class="btn btn-blue btn-block border-0">Login</button>
								</div>
		</form>
