 @php
                                    $data = array();
                                    foreach($itemIssues as $row){
                                        
                                        array_push($data,$row->room_id);
                                    }
                                    
                                @endphp

                                <label for="inputPassword" class="col-sm-1 col-form-label"><b>Room No:</b></label>
                                <div class="col-sm-4">
                                    <select class="form-control form-control-sm" required id="select_room_no" name="room_id[]" multiple="multiple">
                                        @foreach($rooms as $row)
                                        <option {{in_array($row->id,$data)?'selected':''}} value="{{$row->id}}">{{$row->room_no}}</option>
                                        @endforeach
                                    </select>
                                    <small class="text-danger room_no"></small>
                                </div>
