 <div class="form-group row">
                     <label for="" class="col-sm-3 col-form-label text-right">Thumbnail Image</label>
                     <div class="col-md-4">
                       @if ($data->image != null)
                         <div class="col-md-4">
                           <div class="img-upload-preview">
                             <button type="button" class="btn btn-danger close-btn remove-files" id="remove_file"><i class="fa fa-times remove-files"></i></button>
                             <img src="{{asset('public/uploads/product/'.$data->image)}}" alt="" class="img-responsive" height="200px">
                             	<input type="hidden" name="previous_thumbnail_img" value="{{ $data->image }}">
                           </div>
                         </div>
                       @endif
                       <br>
                     </div>


                     <div class="col-md-5">
                       <div id="thumbnail_img" class="">

                        </div>
                     </div>


                   </div>


                    <div class="form-group row">
                     <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Image Gallary:</label>
                     <div class="col-sm-6">
                       <div id="photos" class="row">

                         @if(is_array(json_decode($data->gallary_image)))
    											@foreach (json_decode($data->gallary_image) as $key => $photo)
    												<div class="col-md-4">
    													<button type="button" class="btn btn-danger close-btn remove-files"><i class="fa fa-times"></i></button>
    													<div class="img-upload-preview">
    														<img src="{{url('storage/app/public/'.$photo) }}" alt="" height="150px" width="170px;">
    														<input type="hidden" name="previous_photos[]" value="{{ $photo }}">
    													</div>
    												</div>
    											@endforeach
    										@endif

                      </div>
                     </div>
                   </div>
                   
                   
                   
                   
                   

				<script>


				$(document).ready(function(){
					$('.remove-files').on('click', function(){
						//alert('ok');
					$(this).parents(".col-md-4").remove();
			});
});
				</script>


				<script>
						$(document).ready(function() {
						$('#container').removeClass('mainnav-lg').addClass('mainnav-sm');
						$("#thumbnail_img").spartanMultiImagePicker({
								fieldName: 'thumbnail_img',
								maxCount: 1,
								rowHeight: '200px',
								groupClassName: 'col-lg-3 col-md-4 col-sm-4 col-xs-6',
								maxFileSize: '',
								dropFileLabel: "Drop Here",
								onExtensionErr: function(index, file) {
										console.log(index, file, 'extension err');
										alert('Please only input png or jpg type file')
								},
								onSizeErr: function(index, file) {
										console.log(index, file, 'file size too big');
										alert('File size too big');
								}
						});
				});
				</script>
