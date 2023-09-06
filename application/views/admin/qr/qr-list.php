<?php $this->load->view('admin/comman/header'); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<div class="content-wrapper">
    <section class="content-header">
      <h1> QR List</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>       
        <li class="active">QR List</li>
      </ol>
    </section>
    <section class="content" style="min-height: 50px;">
     <a href="<?php echo base_url(); ?>QrController" class="btn bg-maroon margin btn-sm" style="float:right"> <i class="fa  fa-plus"></i> Add New</a>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        <?php
	        if($this->session->flashdata('error')) {
	            ?>
              <div class="callout callout-danger">
                <p><?php echo $this->session->flashdata('error'); ?></p>
              </div>
	            <?php
	        }
	        if($this->session->flashdata('success')) {
	            ?>
              <div class="alert alert-success alert-dismissible">
                <p><?php echo $this->session->flashdata('success'); ?></p>
              </div>
	            <?php
	        }
	        ?>          
          <div class="box">
                   
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped" style="overflow: scroll;">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Type Text</th>
                  <!-- <th>Changed Text (0-20)</th> -->
                  <th>Qr Code </th>
                  <th>Action</th>              
                </tr>
                </thead>
                <tbody>
                  <?php
                  if(isset($qrList) && !empty($qrList)){
                    $i=0;							
                    foreach ($qrList as $row) {
                       $shareLink = 'https://api.whatsapp.com/send?text=' . urlencode('Check out this image: ' . base_url('uploads/qrimages/' . $row['changed_typed_text']));
                        $qrcode_path =  base_url('uploads/qrimages/'.$row['changed_typed_text']);
                      $i++;
                      ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['user_typed_text']; ?></td>
                        <!-- <td><?php echo $row['changed_typed_text']; ?></td> -->
                        <td>
                            <img src="<?php echo base_url(); ?>uploads/qrimages/<?php echo $row['changed_typed_text']; ?>" alt="QR Code">
                        </td>
                        <td>
                         <!--<button class="btn btn-success shareImg btn-sm" data-url="<?=  $qrcode_path ?>"><i class="fa fa-whatsapp"></i></button>-->
                         <a class="btn btn-success btn-xs" href="<?=  $shareLink ?>" target="_blank"><i class="fa fa-whatsapp"></i></a>
                         <a class="btn btn-info btn-xs" href="mailto:?subject=QR Code&body=<?php echo urlencode($qrcode_path); ?>"> <i class="fa fa-envelope"></i></a>

                        <!-- Social media sharing --> 
                        <a class="btn btn-default btn-xs" href="https://www.facebook.com/sharer.php?u=<?php echo urlencode($qrcode_path); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a class="btn-primary btn-xs" href="https://twitter.com/intent/tweet?url=<?php echo urlencode($qrcode_path); ?>&text=Check out this QR Code" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a href="<?php echo base_url()?>QrController/delete_qr/<?php echo $row['id']; ?>" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure?');"><i class="fa fa-trash"></i></a> 
                        </td>
                      </tr>
                      <?php
                    } 
                  }
                  ?>							
						    </tbody>               
              </table>
            </div>           
          </div>         
        </div>       
      </div>     
    </section>
</div>  
<?php $this->load->view('admin/comman/footer'); ?>
<div class="control-sidebar-bg"></div>
<?php $this->load->view('admin/comman/js'); ?>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
  
  $(".shareImg").click(function(){
    var imgUrl = $(this).attr("data-url");
    var caption = 'Check out this image!';
    // var link = document.createElement('a');
    // link.href = 'https://api.whatsapp.com/send?text='encodeURIComponent(imgUrl);
    // link.click();

    // var encodedUrl = encodeURIComponent(imgUrl);
    // var encodedCaption = encodeURIComponent(caption);
    // var whatsappLink = `https://wa.me/?text=${encodedCaption}%0A${encodedUrl}`;
    // window.open(whatsappLink, '_blank');

   /* var reader = new FileReader();
    reader.onload = function(event) {
    // Convert the image to a data URL
    var imageDataUrl = event.target.imgUrl;
    
    // Create a temporary <a> element
    var link = document.createElement('a');
    link.href = 'whatsapp://send?text=' + encodeURIComponent(caption);
    link.setAttribute('data-action', 'share/whatsapp/share');
    
    // Create an <img> element with the data URL as the source
    var img = document.createElement('img');
    img.src = imageDataUrl;
    link.appendChild(img);
    
    // Append the <a> element to the document body and click it programmatically
    document.body.appendChild(link);
    link.click();
    
    // Remove the temporary <a> element from the document body
    document.body.removeChild(link);
  }*/
  
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
         var message = encodeURIComponent(caption) + " - " + encodeURIComponent(imgUrl);
          var whatsapp_url = "whatsapp://send?text=" + message;
          window.location.href = whatsapp_url;
    }else {
      alert("Please use an Mobile Device to Share this Article");
    }
 

  });
</script>