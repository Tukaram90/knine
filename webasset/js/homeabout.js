$(document).ready(function() {
    $("#subscribe-form").on('submit', function(e){
        e.preventDefault();
        
        
        var email = $('#EMAIL').val();
     if(email == '')
     {
        return false;
     }			

        let _URL = '<?php echo base_url(); ?>home/save_subscriber';

        $.ajax({
            url: _URL,
            type: "POST",
            data: {				
                email: email,												
            },
            cache: false,
            success: function(dataResult){
                var data = JSON.parse(dataResult);
            
                if(data.status ==true){ 
                   
                    $("#mce-success-response").show();
                    
                    $('#EMAIL').val('');
                    
                    setTimeout(function(){
                        $("#mce-success-response").hide();
                    }, 5000);
                }
                else {
                    $("#mce-error-response").show();
                    //$('#fail').text(dataResult.msg);
                }
                
            }
        });


  })

  $(".dogbtnclk").click(function() {
     var elem = $(".dogbtnclk").text();
     if (elem == "Read More") {            
        $(".dogbtnclk").text("Read Less");
        $("#dogDetails").slideDown();
     } else {            
        $(".dogbtnclk").text("Read More");
        $("#dogDetails").slideUp();
     }
  });

  $(".morexpenseclk").click(function() {
     var elem = $(".morexpenseclk").text();
     if (elem == "Read More") {            
        $(".morexpenseclk").text("Read Less");
        $("#moreExpenseData").slideDown();
     } else {            
        $(".morexpenseclk").text("Read More");
        $("#moreExpenseData").slideUp();
     }
  });

  $(".vaccinationclk").click(function() {
     var elem = $(".vaccinationclk").text();
     if (elem == "Read More") {            
        $(".vaccinationclk").text("Read Less");
        $("#vaccinationData").slideDown();
     } else {            
        $(".vaccinationclk").text("Read More");
        $("#vaccinationData").slideUp();
     }
  });

  $(".advertiseclk").click(function() {
     var elem = $(".advertiseclk").text();
     if (elem == "Read More") {            
        $(".advertiseclk").text("Read Less");
        $("#advertiseData").slideDown();
     } else {            
        $(".advertiseclk").text("Read More");
        $("#advertiseData").slideUp();
     }
  });

})