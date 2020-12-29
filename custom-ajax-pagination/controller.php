   public function showPaginationImage($id)
    {
        $per_page = 28;
        $start_form = ($id - 1) * $per_page;
        $images = ImageManager::orderby('id','DESC')->skip($start_form)->take($per_page)->get();
        return view('backend.pages.ajax.addpost',compact('images'));   
    }
