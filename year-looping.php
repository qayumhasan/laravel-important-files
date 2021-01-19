
                                    @php
                        $firstYear = (int)date('Y')-20;
                        $lastYear = $firstYear + 20;

                        @endphp
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option selected disabled>Select a room type</option>
                                        @for($i=$firstYear;$i<=$lastYear;$i++)
                                            <option {{(int)date('Y') == $i ?'selected':''}}  value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
