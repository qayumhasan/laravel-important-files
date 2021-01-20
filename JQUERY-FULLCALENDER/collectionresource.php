 public function toArray($request)
    {
        return [
            'data' => $this->collection->map(function($data) {
                $startdate = strtotime(str_replace('/', '-', $data->checkindate));

                $enddate = strtotime(str_replace('/', '-', $data->checkoutdate));

                return [
                    'title' => $data->room->room_no?$data->room->room_no:'',
                    'start' => date('Y-m-d', $startdate),
                    'end' =>date('Y-m-d', $enddate),
                    'url'=> route('admin.advance.booking.room',$data->id),
                ];
            })
        ];
    }
