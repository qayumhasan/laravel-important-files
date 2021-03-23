$guestname = $request->guest_name;
        $bookinghistory = Checkout::whereHas('checkin',function($query) use ($guestname){
            $query->where('guest_name', 'like', '%'.$guestname.'%');

        })
        ->with(['checkin'=>function($query) use ($guestname){
            $query->where('guest_name', 'like', '%'.$guestname.'%');
        }])->get();
