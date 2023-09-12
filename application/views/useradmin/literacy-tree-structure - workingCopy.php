<?php $this->load->view('useradmin/comman/userheader'); ?>
<?php
$template_arr = ['olivia','diva','mila','polina','mery','belinda','ula','ana','isla','deborah','Default'];
$default= 'rony'
?>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Literacy Tree Structure 
      </h1>
     
    </section>  
    <section class="content">
        <div class="box box-primary">           
            <div class="box-body">
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Male Dog</label>
                                <select name="male_dog" id="male_dog" class="form-control" autofocus>
                                    <option value="">Select Dog</option>
                                    <?php foreach($dogList as $dog){ ?>
                                        <option value="<?= $dog['dog_id'] ?>" <?php if(!empty($DoseInfo) && isset($DoseInfo)){ if($dog['dog_id']==$DoseInfo['dog_id']){echo"selected";} } ?> ><?= $dog['dog_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Spause Dog</label>
                                <select name="female_dog" id="female_dog" class="form-control">
                                    <option value="">Spause Dog</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Template</label>
                                <select name="template_id" id="template_id" class="form-control"  onchange="set_emplate()">
                                    <?php foreach($template_arr as $template){ ?>
                                        <option value="<?= $template ?>" <?= ($template=='rony')?'selected':'' ?>><?= $template ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div><br>
                        <div class="col-md-2">
                            <button  class="btn btn-primary" id="SearchLiteracyBtn" name="SearchLiteracyBtn">Submit</button>
                        </div>
                    </div>                    
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

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>

<!-- <script src="<?php echo base_url(); ?>assets/dist/treeasset/jquery.jOrgChart.js"></script> -->
<script src="<?php echo base_url(); ?>assets/dist/treeasset/orgchart.js"></script>
<script>
    $(document).ready(function() {

        $('#male_dog').on('change', function() {
            var maleDogID = $(this).val();
            if (maleDogID !== '') {
                $.ajax({
                    url: "<?php echo site_url('customer/kennel/get_spause_dog'); ?>",
                    method: "POST",
                    data: {maleDogID: maleDogID},
                    dataType: "json",
                    success: function(data) {
                        $('#female_dog').html(data);
                    }
                });
            } else {
                $('#city').html('<option value="">Select City</option>');
            }
        });

        $('#SearchLiteracyBtn').on('click', function(){
            var male_dogId = $('#male_dog').val();
            var female_dog = $('#female_dog').val();
            var selectedTemplate = $('#template_id').val();
            if(male_dogId){

                $.ajax({
                url: '<?= base_url() ?>customer/kennel/get_dog_literacy_pedgree',                    
                type: 'POST',
                dataType: 'json',               
                data: {maleDog:male_dogId, femaleDog:female_dog},
            
                success: function(data) {  
                    console.log(data)
                   if(data){                    
                        OrgChart.templates.group.link = '<path stroke-linejoin="round" stroke="#aeaeae" stroke-width="1px" fill="none" d="M{xa},{ya} {xb},{yb} {xc},{yc} L{xd},{yd}" />';
                        OrgChart.templates.group.nodeMenuButton = '';
                        OrgChart.templates.group.min = Object.assign({}, OrgChart.templates.group);
                        OrgChart.templates.group.min.imgs = "{val}";
                        OrgChart.templates.group.min.img_0 = "";
                        OrgChart.templates.group.min.description = '<text data-width="230" data-text-overflow="multiline" style="font-size: 14px;" fill="#aeaeae" x="125" y="100" text-anchor="middle">{val}</text>';                    
                        
                        var chart = new OrgChart(document.getElementById("tree"), {
                            template: selectedTemplate,
                            enableDragDrop: true,
                            enableSearch: false,
                            nodeMouseClick: OrgChart.action.edit,
                            editForm: {
                                readOnly: true, 
                            },
                            menu: {
                                pdf: { text: "Export PDF" },
                                png: { text: "Export PNG" },
                                svg: { text: "Export SVG" },
                                csv: { text: "Export CSV" },
                                json: { text: "Export JSON" }
                            },
                            nodeMenu: {
                                details: { text: "Details" },
                                // edit: { text: "Edit" },
                                // add: { text: "Add" },
                                // remove: { text: "Remove" }
                            },                            
                            nodeBinding: {
                                imgs: "img",
                                field_0: "name",
                                field_1: "title",
                                field_2: "birth Date",
                                field_3: "owner",                              
                                img_0: "img",

                            },
                            tags: {
                                "group": {
                                    template: "group",
                                },
                                
                            }
                        });

                        chart.on('drop', function (sender, draggedNodeId, droppedNodeId) {
                            var draggedNode = sender.getNode(draggedNodeId);
                            var droppedNode = sender.getNode(droppedNodeId);

                            if (droppedNode.tags.indexOf("group") != -1 && draggedNode.tags.indexOf("group") == -1) {
                                var draggedNodeData = sender.get(draggedNode.id);
                                draggedNodeData.pid = null;
                                draggedNodeData.stpid = droppedNode.id;
                                sender.updateNode(draggedNodeData);
                                return false;
                            }
                        });

                        chart.on('field', function (sender, args) {
                            if (args.node.min) {
                                if (args.name == "img") {
                                    var count = args.node.stChildrenIds.length > 5 ? 5 : args.node.stChildrenIds.length;
                                    var x = args.node.w / 2 - (count * 32) / 2;
                                    for (var i = 0; i < count; i++) {
                                        var data = sender.get(args.node.stChildrenIds[i]);
                                        args.value += '<image xlink:href="' + data.img + '" x="' + (x + i * 32) + '" y="45" width="32" height="32" ></image>';
                                    }
                                }
                            }
                        });


                        chart.on('click', function (sender, args) {
                            if (args.node.tags.indexOf("group") != -1) {
                                if (args.node.min) {
                                    sender.maximize(args.node.id);
                                }
                                else {
                                    sender.minimize(args.node.id);
                                }
                            }
                            return false;
                        });

                        chart.load(data)
                   }

                }
            });

            }else{
                toastr.error('Please select at least male dog');
            }
        })
    });
</script>
   