//multiple delete
<form action="{{route('inventory.item.multidelete')}}" id="multiple_delete" method="post">
<td>
     <label class="chech_container mb-4">
         <input type="checkbox" name="deleteId[]" class="checkbox" value="{{$item->id}}">
         <span class="checkmark"></span>
     </label>
 </td>
</form>
//single delete
<a id="delete" href="{{route('inventory.item.delete',$item->id)}}" class="btn btn-danger btn-sm text-white" title="Delete"><i class="far fa-trash-alt"></i></a>


<script>
        $(document).on("click", "#delete", function (e) {
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
                title: "Are you sure to delete?",
                text: "Once Delete, This will be Permanently Delete!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = link;
                    } else {
                        swal("Safe Data!");
                    }
                });
        });
    </script>
    <script>
        $(document).on("submit", "#multiple_delete", function (e) {
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
                title: "Are you sure to delete all?",
                text: "Once Delete, This will be Permanently Delete!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        document.getElementById('multiple_delete').submit();
                    } else {
                        swal("Safe Data!");
                    }
                });
        });
    </script>
