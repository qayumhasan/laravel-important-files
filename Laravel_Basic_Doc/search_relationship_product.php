return $search = SaveProduct::where('user_id', auth()->user()->id)->when(isset($search),function($q) use($search){
            $q->whereHas('product',function($q) use($search){
                $q->where('title','like','%'.$search.'%');
            })->with(['product'=>function($query) use($search){
                $query->where('title','like','%'.$search.'%');
            }]);
        })->get();
