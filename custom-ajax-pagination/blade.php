 <ul id="imagemanager">
        @foreach($images as $image)
        <li><input type="checkbox" class="myCheckbox" onclick="uploadimg(this)" id="cb{{$image->id}}" value="{{$image->image}}" />
            <label for="cb{{$image->id}}"><img src="{{asset('public/uploads/imagemanager/')}}/{{$image->image}}" /></label>
        </li>
        @endforeach

    </ul>
    @php
        $total_row = count($paginate);
        $total_page = ceil($total_row / 28)+1; //here 28 is per page post//
    @endphp
    <div class="img_fotter m-auto">
    <div class="pagination">
        
        <a href="{{route('admin.media.manager.pagination',1)}}" class="pagination-item ">First</a>
        @for($i = 1; $i < $total_page; $i++)
            <a href="{{route('admin.media.manager.pagination',$i)}}" class="pagination-item active">{{$i}}</a>
        @endfor
        
       
        <a href="{{route('admin.media.manager.pagination',$total_page -1)}}" class="pagination-item ">Last</a>
    </div>
    </div>
    
    
    
<!-- pagination area start -->

<script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('click', '.pagination-item', function(e){
                e.preventDefault();
                
                var url = $(this).attr('href');
                
                console.log(url);
                $.ajax({
                    url:url,
                    type:"get",
                    success:function(data){
                        //log(data);
                        $('#showImage').html(data);
                        $('#imageuploadbtn').modal('hide');
                        
                        
                    },
                  
                });
            });
        });
    </script> 
