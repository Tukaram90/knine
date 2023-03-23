<?php $this->load->view("web/header"); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <section id="elements" class="pages no-padding">
        <div class="jumbotron" data-stellar-background-ratio="0.5">        
            <div class="jumbo-heading" data-stellar-background-ratio="1.2">
                <h1>Password Changed</h1>
            </div>
        </div>
        
        <div class="container">           
            <div class="row">              
                <div class="col-md-12 text-center ">                    
                        <?php if($this->session->flashdata('success')) { ?>
                            <h5 class="sub-header"><?php echo $this->session->flashdata('success'); ?></h5>
                        <?php } ?>                    
                    <a href="<?php echo base_url(); ?>user" class="c_red"><?php echo "Go To Login Page"; ?></a>                   
                </div>                 
            </div>        
        </div>        
          <div class="row margin1"></div>     
    </section>
<?php $this->load->view("web/footer"); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>