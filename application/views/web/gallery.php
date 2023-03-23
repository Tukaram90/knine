<?php $this->load->view("web/header"); ?>
    <section id="gallery" class="pages">
        <div class="jumbotron" data-stellar-background-ratio="0.5">
        <!-- Heading -->
        <div class="jumbo-heading" data-stellar-background-ratio="1.2">
            <h1>Gallery</h1>
        </div>
        </div>
        <div class="container">
        <div class="nav-gallery col-md-12">
            <!-- Gallery Navigation -->
            <div class="text-center col-md-12">
                <ul class="nav nav-pills category text-center" role="tablist" id="gallerytab">
                    <li class="active"><a href="#" data-toggle="tab" data-filter="*">All</a>
                    <?php if(isset($galleryList) && !empty($galleryList)){ ?>
                        <?php foreach($galleryList as $key => $categry){ ?>
                    <li><a href="#" data-toggle="tab" data-filter=".<?='_'.$key; ?>"><?php echo $categry['category_name']; ?></a></li>
                    <?php } } ?>
                </ul>
            </div>
        </div>
        <!-- /nav-gallery -->
        <!-- Gallery Starts-->
        <div class="row">
            <div class="col-md-12 margin1">
                <div id="lightbox">
                    <?php foreach($galleryList as $key => $categry){ ?>
                    <?php foreach($categry['photos'] as $photo){ ?>
                    <div class="col-sm-6 col-md-6 col-lg-4 <?='_'.$key; ?>">
                    <div class="portfolio-item">
                        <div class="gallery-thumb">
                            <img class="img-responsive" src="<?php echo base_url(); ?>uploads/gallery/<?= $photo['photo_name'];?>" alt="">
                            <span class="overlay-mask"></span>
                            <a href="<?php echo base_url(); ?>uploads/gallery/<?= $photo['photo_name'];?>" data-gal="prettyPhoto[gallery]" class="link centered" title="You can add caption to pictures.">
                            <i class="fa fa-expand"></i></a>
                        </div>
                    </div>
                    </div>
                    <?php } ?> 
                    <?php } ?>
                    
                </div>
                
            </div>
            
        </div>       
        </div>       
    </section>
<?php $this->load->view("web/footer"); ?>
