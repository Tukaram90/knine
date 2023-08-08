<?php $this->load->view('useradmin/comman/userheader'); ?>  
<div class="content-wrapper">
    <section class="content-header">
      <h1>
      Add New Expense      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Expense</li>
      </ol>
    </section>  
    <section class="content">
        <div class="box box-primary">           
            <div class="box-body">
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Dog</label>
                                <select name="dog_id" id="dog_id" class="form-control" autofocus onchange="get_dog_pedgree()">
                                    <option value="">Select Dog</option>
                                    <?php foreach($dogList as $dog){ ?>
                                        <option value="<?= $dog['dog_id'] ?>" <?php if(!empty($DoseInfo) && isset($DoseInfo)){ if($dog['dog_id']==$DoseInfo['dog_id']){echo"selected";} } ?> ><?= $dog['dog_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        
                    </div>
                    <div id="appendDiv"></div>  
                </div>
            </div>                       
        </div> 
       
        <!-- <div class="box box-primary">            
            <div class="row">     
                <ul id="org" style="display:none">
                    <li>
                        Food
                        <ul>
                            <li id="beer">Beer</li>
                            <li>Vegetables
                            <a href="http://wesnolte.com" target="_blank">Click me</a>
                            <ul>
                                <li>Pumpkin</li>
                                <li>
                                    <a href="http://tquila.com" target="_blank">Aubergine</a>
                                    <p>A link and paragraph is all we need.</p>
                                </li>
                            </ul>
                            </li>
                            <li class="fruit">Fruit
                            <ul>
                                <li>Apple
                                <ul>
                                    <li>Granny Smith</li>
                                </ul>
                                </li>
                                <li>Berries
                                <ul>
                                    <li>Blueberry</li>
                                    <li><img src="<?php echo base_url(); ?>assets/dist/treeasset/images/raspberry.jpg" alt="Raspberry"/></li>
                                    <li>Cucumber</li>
                                </ul>
                                </li>
                            </ul>
                            </li>
                            <li>Bread</li>
                            <li class="collapsed">Chocolate
                            <ul>
                                <li>Topdeck</li>
                                <li>Reese's Cups</li>
                            </ul>
                            </li>
                        </ul>
                    </li>
                </ul>      
        
             <div id="chart" class="orgChart"></div>
			</div>
        </div> -->
        
        <div style="width:100%; height:600px;" id="tree">
    </section>       
</div>  
<?php $this->load->view('useradmin/comman/userfooter'); ?>
<div class="control-sidebar-bg"></div>
<?php $this->load->view('useradmin/comman/userjs'); ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"/> -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/treeasset/css/jquery.jOrgChart.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/treeasset/css/custom.css"/>
    <link href="<?php echo base_url(); ?>assets/dist/treeasset/css/prettify.css" type="text/css" rel="stylesheet" />

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/treeasset/prettify.js"></script>
    
    <!-- jQuery includes -->
    <!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
    
    <!-- <script src="<?php echo base_url(); ?>assets/dist/treeasset/jquery.jOrgChart.js"></script> -->
    <script src="<?php echo base_url(); ?>assets/dist/treeasset/OrgChart.js"></script>
    <script>
    // jQuery(document).ready(function() {
    //     $("#org").jOrgChart({
    //         chartElement : '#chart',
    //         dragAndDrop  : true
    //     });
    // });
    </script>
<script>
    // jQuery(document).ready(function() {
        
    //     /* Custom jQuery for the example */
    //     $("#show-list").click(function(e){
    //         e.preventDefault();
            
    //         $('#list-html').toggle('fast', function(){
    //             if($(this).is(':visible')){
    //                 $('#show-list').text('Hide underlying list.');
    //                 $(".topbar").fadeTo('fast',0.9);
    //             }else{
    //                 $('#show-list').text('Show underlying list.');
    //                 $(".topbar").fadeTo('fast',1);                  
    //             }
    //         });
    //     });
        
    //     $('#list-html').text($('#org').html());
        
    //     $("#org").bind("DOMSubtreeModified", function() {
    //         $('#list-html').text('');
            
    //         $('#list-html').text($('#org').html());
            
    //         prettyPrint();                
    //     });
    // });
</script>
<script>
     OrgChart.templates.ana.img_0 = 
        '<image preserveAspectRatio="xMidYMid slice" xlink:href="{val}" x="20" y="" width="80" height="80"></image>';
     OrgChart.templates.ana.img_1 = 
        '<image preserveAspectRatio="xMidYMid slice" xlink:href="{val}" x="150" y="-15" width="80" height="80"></image>';
    // var chart = new OrgChart(document.getElementById("tree"), {
    //     menu: {
    //         pdf: { text: "Export PDF" },
    //         png: { text: "Export PNG" },
    //         svg: { text: "Export SVG" },
    //         csv: { text: "Export CSV" },
    //         json: { text: "Export JSON" }
    //     },
    //     nodeMenu: {
    //         pdf: { text: "Export PDF" },
    //         png: { text: "Export PNG" },
    //         svg: { text: "Export SVG" }
    //     },
        
    //     nodeBinding: {
    //         field_0: "name",
    //         field_1: "gender",
    //         img_0: "photo1",
    //     },
    //     nodes: [
    //         { id: 1, name: "Moti",gender:"Male",photo1:"https://placebear.com/640/360" },
    //         { id: 2, pid: 1, name: "Ava Field",gender:"Male",photo1:"https://placekitten.com/640/360" },
    //         { id: 3, pid: 1, name: "Peter Stevens",gender:"Female" },
    //         { id: 4, pid: 2, name: "Peter",gender:"Male" },
    //         { id: 5, pid: 2, name: "Deve", gender:"Female" },
    //         { id: 6, pid: 3, name: "Devi", gender:"Male" },
    //         { id: 7, pid: 3, name: "Homi", gender:"Female" }   
    //     ]
    // });

    function get_dog_pedgree(){
        var dog_id = $('#dog_id').val();
        if(dog_id){
            $.ajax({
                url: '<?= base_url() ?>customer/kennel/get_dog_pedgree',                    
                type: 'POST',
                dataType: 'json',
                data: {dog_id:dog_id},
            
                success: function(data) {
                    console.log(data)
                    var chart = new OrgChart(document.getElementById("tree"), {
        menu: {
            pdf: { text: "Export PDF" },
            png: { text: "Export PNG" },
            svg: { text: "Export SVG" },
            csv: { text: "Export CSV" },
            json: { text: "Export JSON" }
        },
        nodeMenu: {
            pdf: { text: "Export PDF" },
            png: { text: "Export PNG" },
            svg: { text: "Export SVG" }
        },
        
        nodeBinding: {
            field_0: "name",
            field_1: "gender",
            img_0: "photo1",
        },
        nodes: [
            { id: 1, name: "Moti",gender:"Male",photo1:"https://placebear.com/640/360" },
            { id: 2, pid: 1, name: "Ava Field",gender:"Male",photo1:"https://placekitten.com/640/360" },
            { id: 3, pid: 1, name: "Peter Stevens",gender:"Female" },
            { id: 4, pid: 2, name: "Peter",gender:"Male" },
            { id: 5, pid: 2, name: "Deve", gender:"Female" },
            { id: 6, pid: 3, name: "Devi", gender:"Male" },
            { id: 7, pid: 3, name: "Homi", gender:"Female" }   
        ]
    });

                }
            });
        }
    }
</script> 