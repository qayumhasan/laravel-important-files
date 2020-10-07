  @if(isset($secure_id))
    <script src="{{asset('public/frontend')}}/plugins/jquery.min.js"></script>
    <script>
        $( document ).ready(function() {

            
            var countDownDate = 5;

            // Update the count down every 1 second
            var x = setInterval(function() {




            
            document.getElementById("second").innerHTML = countDownDate +" ";
            countDownDate--;    
                
           
            }, 1000);


            

            
            $('.bd-example-modal-lg').modal('toggle');
            
                setTimeout(function(){ $('.bd-example-modal-lg').modal('hide'); clearInterval(x)}, 6000);
        })
        

        
    </script>
    @endif
