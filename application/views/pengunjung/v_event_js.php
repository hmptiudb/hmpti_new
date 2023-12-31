<script>
    
    function get_detail(id_event) {
        var loader = `<div class="col-12" style="
                  background-image: url('<?php echo base_url() ?>assets/img/loader.gif');
                  background-repeat: no-repeat;
                  background-position: center;
                  min-height: 50px;
                ">`;

        $("#detail_event").html(loader);
        setTimeout(function() {
          $.ajax({  
            type: "GET",
            url: "<?php echo base_url() ?>p/ajax_detail_event/"+id_event,
            success: function (data) {
              $("#detail_event").html(data);
            //   console.log(data);
              $("#detail_event_wrapper").slideDown(600); // actually shows the data of details
              $(".text-muted.btn").remove();
            },
          });
        }, 500);
      }
      
    // preview image before upload
    function readURL(input, display) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function(e) {
          $(display).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]); // convert to base64 string
      }
    }
    
    function do_countdown() {
	$(".countdown_wrapper").each(function() {
			var countdown = $(this).find(".countdown").data("time");
			// console.log(countdown.html())
			// Set the date we're counting down to 
			var countDownDate = new Date(countdown).getTime();

			// Get today's date and time
			var now = new Date().getTime();
			  
			// Find the distance between now and the count down date
			var distance = countDownDate - now;

			if (distance > 0) {
			  	// Time calculations for days, hours, minutes and seconds
			  	var days = Math.floor(distance / (1000 * 60 * 60 * 24));
			  	var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			  	var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
			  	var seconds = Math.floor((distance % (1000 * 60)) / 1000);
			  	  
			  	// Output the result in an element with id="demo"
			  	$(this).find(".countdown").html( days + "hari " + hours + "jam " + minutes + "menit " );
			  	  
			}else{
				$(this).html("Pendaftaran telah ditutup");
			}
		});
    }
    
    $("#pembayaran").change(function() {
      $("#indikator_pembayaran").val(1);
      readURL(this, "#preview_pembayaran");
    });
    
    $(document).ready(function() {
        do_countdown(); // <-- at first on load
		setInterval(function() {
			do_countdown();
		},20000); //<-- run at every 20 secs
    });
</script>