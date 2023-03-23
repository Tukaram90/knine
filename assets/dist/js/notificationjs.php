<script>
$(document).ready(function(){
   //var  _url = '<?php echo base_url(); ?>customer/kennel/set_notification';
   var _url = "<?php echo base_url(); ?>customer/kennel/set_notification";
   $.ajax({
			url: _url,
			type: "POST",
			processData:false,
			success: function(data){
        var resp = JSON.parse(data)
        console.log(data)
				$("#countNotify").html(resp.count);					
				$("#notification-latest").show();
        $("#notification-latest").html(resp.list);
			},
			error: function(){}           
		});
   
});
</script>
