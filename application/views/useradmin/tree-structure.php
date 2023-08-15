<?php $this->load->view('useradmin/comman/userheader'); ?>  
<div class="content-wrapper">
    <section class="content-header">
      <h1>Pedigree  </h1>
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
        <div style="width:100%; height:600px;" id="tree">
    </section>       
</div>  
        <?php $this->load->view('useradmin/comman/userfooter'); ?>
        <div class="control-sidebar-bg"></div>
        <?php $this->load->view('useradmin/comman/userjs'); ?>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
       
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/treeasset/css/jquery.jOrgChart.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/treeasset/css/custom.css"/>
    <link href="<?php echo base_url(); ?>assets/dist/treeasset/css/prettify.css" type="text/css" rel="stylesheet" />

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/treeasset/prettify.js"></script>
    
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
    
   
    <script src="<?php echo base_url(); ?>assets/dist/treeasset/orgchart.js"></script>
<script>
   
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
                         enableSearch: false,
                         template: "ula",
                       // edit form key
                        editForm: {
                            titleBinding: "name",
                             photoBinding: "photo1",
                            readOnly: true
                        },
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
                        nodes:data 
                        //  [
                        //     { id: 1, name: "Moti",gender:"Male",photo1:"https://placebear.com/640/360" },
                        //     { id: 2, pid: 1, name: "Ava Field",gender:"Male",photo1:"https://placekitten.com/640/360" },
                        //     { id: 3, pid: 1, name: "Peter Stevens",gender:"Female" },
                        //     { id: 4, pid: 2, name: "Peter",gender:"Male" },
                        //     { id: 5, pid: 2, name: "Deve", gender:"Female" },
                        //     { id: 6, pid: 3, name: "Devi", gender:"Male" },
                        //     { id: 7, pid: 3, name: "Homi", gender:"Female" }   
                        // ]
                        
                    });
                     chart.load(data);

                }
            });
        }
    }
</script> 