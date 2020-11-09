
<script>
        $(function() {

            $("#coba").spartanMultiImagePicker({
                fieldName: 'fileUpload[]',
                directUpload: {
                    status: true,
                    loaderIcon: '<i class="fas fa-sync fa-spin"></i>',
                    url: '../c.php',
                    additionalParam: {
                        name: 'My Name'
                    },
                    success: function(data, textStatus, jqXHR) {},
                    error: function(jqXHR, textStatus, errorThrown) {}
                }
            });
        });

        $('#container').removeClass('mainnav-lg').addClass('mainnav-sm');

        $("#photos").spartanMultiImagePicker({
            fieldName: 'photos[]',
            maxCount: 10,
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


        var i = 0;


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

            $("#t_img").spartanMultiImagePicker({
                fieldName: 't_img',
                maxCount: 1,
                rowHeight: '200px',
                groupClassName: 'col-xl-2 col-lg-3 col-md-4 col-sm-4 col-xs-6',
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
    
    
    		<script src="{{asset('public/assets/plugins/spartan-multi-images/dist/js/spartan-multi-image-picker.js')}}"></script>
