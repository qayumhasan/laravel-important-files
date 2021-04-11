
        $currency = cache()->remember('currency',60*60*24,function(){
            return Currency::where('is_default',1)->first(); 
        });

        view()->share('currency', $currency);
