<?php
if(!$this->session->userdata('is_user_logged_in')) {
  redirect(base_url().'user');
}
?>
<?php $this->load->view("web/header"); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<style>
    .userliinkactive{
        color:black !important;
    }
</style>
<section id="blog" class="pages">
    <div class="jumbotron" data-stellar-background-ratio="0.5">            
        <div class="jumbo-heading" data-stellar-background-ratio="1.2">
            <h1>Dog Info</h1>
        </div>
    </div>
        
    <div class="container"> 
        <?php
            if($this->session->flashdata('error')) { 
                ?>
                <script>                                          
                    setTimeout(function(){ 
                        toastr.error('<?php echo $this->session->flashdata('error'); ?>');
                    }, 1000);                        
                </script>
                <?php
            }
            if($this->session->flashdata('success')) {
                ?>
                <script>
                    setTimeout(function(){ 
                        toastr.success('<?php echo $this->session->flashdata('success'); ?>');
                    }, 1000);
                </script>
                <?php
            }
        ?>     
        <div class="sidebar col-md-3">
            <?php $this->load->view("web/usersidebar"); ?>  
        </div>
        <div id="" class="col-md-9 sidebar">
            
            <h4>Dog's List</h4>
            <div class="well">    
            <a href="<?php echo base_url(); ?>add-dog" class="label default pull-right">Add Dog</a> <br>            
            <table class="table table-bordered table-striped table-hover">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>Dog Name</th>
                              <th>Type</th>
                              <th>Weigth</th>
                              <th>Color</th>
                              <th>Weigth</th>
                              <th>Img</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($doginfo) && !empty($doginfo)){ ?>
                           <tr>
                              <td>1</td>
                              <td>Mark</td>
                              <td>Otto</td>
                              <td>@mdo</td>
                              <td>1</td>
                              <td>Mark</td>
                              <td>Otto</td>
                              <td>@mdo</td>
                           </tr>
                           <?php }else{ ?>
                            <tr>
                            <h3 class="sub-header">Dog information not added yet.</h3>  
                            </tr>
                           <?php } ?>
                        </tbody>
                     </table>
            </div>   
        </div>   
    </div>        
</section>
<?php $this->load->view("web/footer"); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>