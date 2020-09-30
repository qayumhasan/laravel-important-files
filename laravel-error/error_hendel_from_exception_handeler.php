
 /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {

     

        // error handler code
        if($this->isHttpException($exception)){
            if($exception->getStatusCode() == 404){
                return response()->view('frontend.errors.404');
            }
        }
       
        return parent::render($request, $exception);
    }
