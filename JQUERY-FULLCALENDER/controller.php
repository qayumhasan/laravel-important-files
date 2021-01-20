 public function getadvanceBookingReportDayByDay(Request $request)
    {
        $advancebooking = AdvanceBooking::where('room_type',$request->room_type)->where('year',$request->year)->get();
        return new DayByDayCalenderCollection($advancebooking);
    }
