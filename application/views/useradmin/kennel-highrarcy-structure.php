<?php $this->load->view('useradmin/comman/userheader'); ?>
<style>
    
.treeview-animated {

font-size: 16px;
font-weight: 400;

background: rgba(224, 127, 178, 0.2);
}

.treeview-animated hr {
border-color: #a2127a;
}

.treeview-animated.w-20 {
width: 20rem;
}

.treeview-animated h6 {
font-size: 1.4em;
font-weight: 500;
color: #a2127a;
}

.treeview-animated ul {
position: relative;
list-style: none;
padding-left: 0;
}

.treeview-animated-list ul {
padding-left: 1em;
margin-top: 0.1em;
background: rgba(224, 127, 178, 0.2);
}

.treeview-animated-element {
padding: 0.2em 0.2em 0.2em 1em;
cursor: pointer;
transition: all .1s linear;
border: 2px solid transparent;
border-right: 0px solid transparent;
}

.treeview-animated-element:hover {
background-color: #e07fb2;
}

.treeview-animated-element.opened {
color: #ffac47;
border: 2px solid #ffac47;
border-right: 0px solid transparent;
background-color: #a2127a;
}

.treeview-animated-element.opened:hover {
color: #ffac47;
background-color: #a2127a;
}

.treeview-animated-items-header {
display: block;
padding: 0.4em;
margin-right: 0;
border-bottom: 2px solid transparent;
}


.treeview-animated-items-header:hover {
background-color: #e07fb2
}

.treeview-animated-items-header.open {
transition: all .1s linear;
background-color: #a2127a;

border-bottom: 2px solid #ffac47;
}

.treeview-animated-items-header.open span {
color: #ffac47;
}

.treeview-animated-items-header.open:hover {

color: #ffac47;
background-color: #a2127a;
}

.treeview-animated-items-header.open div:hover {
background-color: #a2127a;
}

.treeview-animated-items-header .fa-angle-right {
transition: all .1s linear;
font-size: .8rem;
}

.treeview-animated-items-header .fas {
position: relative;
transition: all .2s linear;
transform: rotate(90deg);

color: #ffac47;
}

.treeview-animated-items-header .fa-minus-circle {
position: relative;
color: #ffac47;
transform: rotate(180deg);
}
</style>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
      Hierarchical Inheritance Dogs       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Hierarchical Inheritance Dogs</li>
      </ol>
    </section>  
    <section class="content">
        <div class="box box-primary">   
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                <div class="treeview-animated border border-secondary mx-4 my-4">
                    <h6 class="pt-3 pl-3">Childern Tree Structure</h6>
                    <hr>
                    <ul class="treeview-animated-list mb-3">
                        <?php if($dogInfo && $dogInfo['treeStructure']){ ?>
                        <li class="treeview-animated-items">
                            <a class="treeview-animated-items-header">
                                <i class="fa fa-plus-circle"></i>
                                <span>
                                    <img src="<?php if(isset($dogInfo['clicked_dogImg']) && !empty($dogInfo['clicked_dogImg'])){ echo base_url(); ?>uploads/dogs/<?= $dogInfo['clicked_dogImg'];}?>" alt="Dogs Image" style="width:50px">
                                </span>
                            </a>
                            <ul class="nested">
                                <?php foreach($dogInfo['treeStructure'] as $secondLevel){  ?>
                                    <?php if($secondLevel['nodes']){ ?>
                                    <li class="treeview-animated-items">
                                            <a class="treeview-animated-items-header">
                                                <i class="fa fa-plus-circle"></i>
                                                <span>
                                                <img src="<?php if(isset($secondLevel['dog_img']) && !empty($secondLevel['dog_img'])){ echo base_url(); ?>uploads/dogs/<?= $secondLevel['dog_img'];}?>" alt="Child Dog Image" style="width:50px">
                                                </span>
                                            </a>
                                            <ul class="nested">
                                                <?php foreach($secondLevel['nodes'] as $thirdlevel){?>
                                                <li>
                                                    <div class="treeview-animated-element"><i class="far fa-clock ic-w mr-1"></i>
                                                    <img src="<?php if(isset($thirdlevel['dog_img']) && !empty($thirdlevel['dog_img'])){ echo base_url(); ?>uploads/dogs/<?= $thirdlevel['dog_img'];}?>" alt="Child Dog Image" style="width:50px">
                                                    </div>
                                                </li> 
                                                <?php } ?>                                   
                                            </ul>
                                        </li> 
                                <?php }else{ ?>
                                        <div class="treeview-animated-element">
                                        <img src="<?php if(isset($secondLevel['dog_img']) && !empty($secondLevel['dog_img'])){ echo base_url(); ?>uploads/dogs/<?= $secondLevel['dog_img'];}?>" alt="Child Dog Image" style="width:50px">
                                    </div>
                                    <?php } ?>
                                <?php } ?>
                                
                            </ul>
                        </li>
                        <?php } else{ ?>
                        <li>
                            <div class="treeview-animated-element">
                            <img src="<?php if(isset($dogInfo['clicked_dogImg']) && !empty($dogInfo['clicked_dogImg'])){ echo base_url(); ?>uploads/dogs/<?= $dogInfo['clicked_dogImg'];}?>" alt="Dogs Image" style="width:50px">
                        </li> 
                        <?php } ?>          
                    </ul>
                </div>

                </div>
                <div class="col-md-2"></div>
                
            </div>     
        </div>
    </section>       
</div>  
<?php $this->load->view('useradmin/comman/userfooter'); ?>
<div class="control-sidebar-bg"></div>
<?php $this->load->view('useradmin/comman/userjs'); ?>
<script>
    
    (function ($) {

let $allPanels = $('.nested').hide();
let $elements = $('.treeview-animated-element');

$('.treeview-animated-items-header').click(function () {
  $this = $(this);
  $target = $this.siblings('.nested');
  $pointerPlus = $this.children('.fa-plus-circle');
  $pointerMinus = $this.children('.fa-minus-circle');

  $pointerPlus.removeClass('fa-plus-circle');
  $pointerPlus.addClass('fa-minus-circle');
  $pointerMinus.removeClass('fa-minus-circle');
  $pointerMinus.addClass('fa-plus-circle');
  $this.toggleClass('open')
  if (!$target.hasClass('active')) {
    $target.addClass('active').slideDown();
  } else {
    $target.removeClass('active').slideUp();
  }

  return false;
});
$elements.click(function () {
  $this = $(this);

  if ($this.hasClass('opened')) {

    $elements.removeClass('opened');
  } else {

    $elements.removeClass('opened');
    $this.addClass('opened');
  }
})
})(jQuery);

</script>