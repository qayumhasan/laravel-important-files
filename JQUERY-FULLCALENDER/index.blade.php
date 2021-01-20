@extends('hotelbooking.master')
@section('title', 'All Room | '.$seo->meta_title)
@section('content')

@php
date_default_timezone_set("Asia/Dhaka");
$current =date("Y-m-d");
@endphp

<style>
    .search_area {
        width: 100%;

    }

    #datatable_filter {
        visibility: hidden;
    }
</style>

<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Searching Room By Room Type</h4>
                        </div>
                        <!-- <span class="float-right mr-2">
                            <a href="#" class="btn btn-sm bg-primary">
                                <i class="ri-add-fill"><span class="pl-1">Add Room</span></i>
                            </a>
                        </span> -->
                    </div>
                    <div class="card-body">

                        @php
                        $firstYear = (int)date('Y')-20;
                        $lastYear = $firstYear + 20;

                        @endphp
                        <form id="search_calender">

                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-1 col-form-label">Room Type</label>
                                <div class="col-sm-4">
                                    <select class="form-control" id="exampleFormControlSelect1" name="room_type">
                                        <option selected disabled>--Room Type---</option>
                                        @foreach($roomtypes as $row)
                                            <option value="{{$row->id}}">{{$row->room_type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label for="inputPassword" class="col-sm-1 col-form-label">Year</label>
                                <div class="col-sm-4">
                                    <select class="form-control" id="exampleFormControlSelect2" name="year">
                                        
                                        @for($i=$firstYear;$i<=$lastYear;$i++) <option {{(int)date('Y') == $i ?'selected':''}} value="{{$i}}">{{$i}}</option>
                                     @endfor
                                    </select>
                                </div>
                                <button type="button" id="searchbtn" class=" col-sm-2 btn btn-primary">Search</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Advance Booking Calender</h4>
                        </div>
                        <!-- <span class="float-right mr-2">
                            <a href="#" class="btn btn-sm bg-primary">
                                <i class="ri-add-fill"><span class="pl-1">Add Room</span></i>
                            </a>
                        </span> -->
                    </div>
                    <div class="card-body">
                        <div id='top'>

                            Locales:
                            <select id='locale-selector'></select>

                        </div>

                        <div id='calendar'></div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var searchbtn = document.querySelector('#searchbtn');
    searchbtn.addEventListener('click', function() {
     
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'get',
            url: "{{ url('/admin/advance/report/get') }}",
            data:$('#search_calender').serializeArray(),

            success: function(data) {
                console.log(data);


                var initialLocaleCode = 'en';
                var localeSelectorEl = document.getElementById('locale-selector');
                var calendarEl = document.getElementById('calendar');

                var calendar = new FullCalendar.Calendar(calendarEl, {
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                    },
                    initialDate: '{{$current}}',
                    locale: initialLocaleCode,
                    buttonIcons: false, // show the prev/next text
                    weekNumbers: true,
                    navLinks: true, // can click day/week names to navigate views
                    editable: true,
                    dayMaxEvents: true, // allow "more" link when too many events
                    events:data.data,
                    
                    // events: [
                        
                    //     {
                    //         title: 'All Day Event',
                    //         start: '2021-01-01'
                    //     },
                    //     {
                    //         title: 'Long Event',
                    //         start: '2021-01-07',
                    //         end: '2021-01-10'
                    //     },
                    //     {
                    //         groupId: 999,
                    //         title: 'Repeating Event',
                    //         start: '2021-01-09T16:00:00'
                    //     },
                    //     {
                    //         groupId: 999,
                    //         title: 'Repeating Event',
                    //         start: '2021-01-16T16:00:00'
                    //     },
                    //     {
                    //         title: 'Conference',
                    //         start: '2021-01-11',
                    //         end: '2021-01-13'
                    //     },
                    //     {
                    //         title: 'Meeting',
                    //         start: '2021-01-12T10:30:00',
                    //         end: '2021-01-12T12:30:00'
                    //     },
                    //     {
                    //         title: 'Lunch',
                    //         start: '2020-09-12T12:00:00'
                    //     },
                    //     {
                    //         title: 'Meeting',
                    //         start: '2020-09-12T14:30:00'
                    //     },
                    //     {
                    //         title: 'Happy Hour',
                    //         start: '2020-09-12T17:30:00'
                    //     },
                    //     {
                    //         title: 'Dinner',
                    //         start: '2020-09-12T20:00:00'
                    //     },
                    //     {
                    //         title: 'Birthday Party',
                    //         start: '2020-09-13T07:00:00'
                    //     },
                    //     {
                    //         title: 'Click for Google',
                    //         url: 'http://google.com/',
                    //         start: '2020-09-28'
                    //     }
                    // ]
                });

                calendar.render();

                // build the locale selector's options
                calendar.getAvailableLocaleCodes().forEach(function(localeCode) {
                    var optionEl = document.createElement('option');
                    optionEl.value = localeCode;
                    optionEl.selected = localeCode == initialLocaleCode;
                    optionEl.innerText = localeCode;
                    localeSelectorEl.appendChild(optionEl);
                });

                // when the selected option changes, dynamically change the calendar option
                localeSelectorEl.addEventListener('change', function() {
                    if (this.value) {
                        calendar.setOption('locale', this.value);
                    }
                });

            }
        });


    });


</script>



@endsection
