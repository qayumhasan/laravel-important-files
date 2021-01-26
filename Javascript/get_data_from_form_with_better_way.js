


<script>
    $(document).ready(function() {
        var adbooking = document.querySelectorAll('.advance_booking');
        adbooking.forEach(function(e) {
            e.style.display = 'none';
        });
        document.querySelector('#avilableroom').style.display = 'none';
        console.log(document.querySelector('#avilableroom'));
    });


    var UIController = (function() {


        function getElement() {
            return {
                is_advance: document.querySelector('#is_advance'),
                adbooking: document.querySelectorAll('.advance_booking'),
                group_booking: document.querySelector('#group_booking'),
                rooms: document.querySelector('#rooms'),
                individual: document.querySelector('#individual'),
                roomhtml: document.querySelectorAll('.roomhtml'),
                room_data: document.querySelectorAll('.room_data'),
                avilableroom: document.querySelector('#avilableroom'),
                addroomdata: document.querySelectorAll('.addroomdata'),
            }
        }
        return {
            element: getElement(),
        }
    })();


    var controller = (function(ctrui) {
        var eventhandeler = ctrui.element.is_advance.addEventListener('click', function(event) {
            ctrui.element.adbooking.forEach(function(e) {
                if (event.target.checked == true) {
                    e.style.display = 'inline';
                    e.style.transition = '.5s';
                } else if (event.target.checked == false) {
                    e.style.display = 'none';
                }

            })

        });

        var rooms = [];

        var getRooms = function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'get',
                url: "{{ route('admin.get.hotel') }}",

                success: function(data) {

                    rooms.push(data);

                }
            });
        }




        var groupBookingEvent = ctrui.element.group_booking.addEventListener('click', function(e) {

            if (e.target.checked == true) {
                // e.target.disabled = true;

                ctrui.element.avilableroom.style.display = 'block';
                rooms.forEach(function(e) {
                    e.forEach(function(element, i) {

                        var roomsdata = '<div class="form-check pb-2 bt-2 roomhtml"><input class="form-check-input room_data" type="checkbox" onclick="chooseRoom(this)" value="%i%"><label class="form-check-label" for="advance">%room_no% ( %room_type% - %price%)</label></div>';

                        var newroomsdata = roomsdata.replace('%room_type%', element.roomtype.room_type);
                        var newroomsdata = newroomsdata.replace('%room_no%', element.room_no);
                        var newroomsdata = newroomsdata.replace('%price%', element.tariff);
                        var newroomsdata = newroomsdata.replace('%i%', i);

                        ctrui.element.rooms.insertAdjacentHTML('beforeend', newroomsdata);
                    })
                })
            }

        });




        var individual = ctrui.element.individual.addEventListener('click', function() {
            ctrui.element.group_booking.disabled = false;

            ctrui.element.avilableroom.style.display = 'none';
            document.querySelectorAll('.addroomdata').forEach(function(e) {
                e.remove();
            });

            document.querySelectorAll('.roomhtml').forEach(function(el) {
                el.remove();
            });

        });





        return {
            init: function() {
                return getRooms();
            },
            data: rooms,
        }

    })(UIController);


    function chooseRoom(el) {
        var chooserooms = [];
        if (el.checked == true) {
            var data = controller.data[0][el.value];
            chooserooms.push(data);
            addchoosroom(chooserooms, el.value);
        } else if (el.checked == false) {

            chooserooms.splice(el.value, 1);
            deleteRoom(el.value);


        }
    }

    function addchoosroom(rooms, value) {
        rooms.forEach(function(room) {
            var html = '<tr id="%id%" class="addroomdata"><th>%room_no%</th><td>%room_type% </td><td><input type="number" class="controll-from" name="add_room_price[]" value="%price%"></td><td><input type="text" class="controll-from" required name="add_room_guest[]" ><input type="hidden" class="controll-from" name="add_room_id[]" value="%room_id%"></td></tr>';

            var newhtml = html.replace('%room_no%', room.room_no);
            var newhtml = newhtml.replace('%id%', 'addchoosroom' + value);
            var newhtml = newhtml.replace('%room_type%', room.roomtype.room_type);
            var newhtml = newhtml.replace('%price%', room.tariff);
            var newhtml = newhtml.replace('%room_id%', room.id);

            document.querySelector('#addroomchoosearea').insertAdjacentHTML('beforeend', newhtml);

        });
    }

    function deleteRoom(value) {

        document.querySelector('#addchoosroom' + value).remove();
    }


    controller.init();
</script>
