<?php $this->load->view('useradmin/comman/userheader'); ?>  
<?php
$template_arr = ['olivia','diva','mila','polina','mery','belinda','ula','ana','isla','deborah','Default'];
?>
<div class="content-wrapper">
    <section class="content-header">
      <h1>Pedigree  </h1>
    </section>  
    <section class="content">
        <div class="box box-primary">           
            <div class="box-body">
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-md-6">
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
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Template</label>
                                <select name="template_id" id="template_id" class="form-control"  onchange="set_emplate()">
                                    <option value="">Select Template</option>
                                    <?php foreach($template_arr as $template){ ?>
                                        <option value="<?= $template ?>" ><?= $template ?></option>
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
        set_dog_tree_structure(dog_id)
    }

    function set_emplate(){
        var dog_id = $('#dog_id').val();
        var template = $('#template_id').val();
        if(template=='Default'){
            template = "rony";
        }
        set_dog_tree_structure(dog_id,template) 
    }
    
    let dogVisitedMap = new Map();
    function set_dog_tree_structure(dogID, templateDefault = "rony"){
        if(dogID){
            $.ajax({
                url: '<?= base_url() ?>customer/kennel/get_dog_pedgree',                    
                type: 'POST',
                dataType: 'json',
               
                data: {dog_id:dogID},
            
                success: function(data) {
                    console.log(data)
                    console.table(data)
                    dogVisitedMap.clear();
                    let response_arr = [];
                    let id=1;
                    for(let i = 0; i < data.length; i++) {
                      
                       let  parentID = getPID(data,data[i].dog_id);
                       if(parentID == -1){
                        parentID = 0;
                       }else{
                        parentID = parentID + 1;
                       }
                       console.log(dogVisitedMap)
                       var dataObject = {
                            'id':id,
                            'pid': parentID,
                            'dog_id':data[i].dog_id,
                            'parent_id':data[i].parent_id,
                            'mother_id':data[i].mother_id,
                            'name':data[i].name,
                            'gender':data[i].gender,
                            'breeder':data[i].breeder,
                            'photo1':data[i].photo1,
                        };
                        response_arr.push(dataObject);
                       id++;
                    }
                    var chart = new OrgChart(document.getElementById("tree"), {
                        enableSearch: false, // search field hide 
                        template: templateDefault,
                       // edit form key
                        editForm: {
                            // titleBinding: "name",
                             photoBinding: "photo1",
                            readOnly: true, // edit button hide 
                            // show particular fields on edit form
                            generateElementsFromFields: false,
                            elements: [
                                { type: 'textbox', label: 'Name', binding: 'name'},
                                { type: 'textbox', label: 'Gender', binding: 'gender'},
                                { type: 'textbox', label: 'Microchip Number', binding: 'Microchip Number'},
                                { type: 'textbox', label: 'Register Number', binding: 'Register Number'},
                                { type: 'textbox', label: 'Birth Date', binding: 'Birth Date'},
                                { type: 'textbox', label: 'Breeder', binding: 'breeder'},
                               
                                     
                            ]
                            // end particular fields on edit form 
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
                       
                        nodes:response_arr 
                        
                    });
                    chart.load(response_arr);

                }
            });
        }
    }
    
    function getPID(allDogs,dogID){ 
        //debugger;
        dogID = parseInt(dogID);
        console.log('getPID: '+dogID)
        var arr = [];
        for(i= 0; i < allDogs.length;i++){
            //console.log('getPID: '+ JSON.stringify(allDogs[i]))
            const fatherID = parseInt(allDogs[i].parent_id);
            const motherID = parseInt(allDogs[i].mother_id);
           
            if( dogID === fatherID || dogID ===  motherID  ){
                console.log('getPID: parent matched '+ i)
                let val = dogVisitedMap.get(dogID)
                if(val == null){
                    console.log('getiPID : no enty found' )
                    arr.push(i)
                    dogVisitedMap.set(dogID,arr);
                    return i;
                }else{
                    console.log('getiPID :  enty found at:',i )
                    let found = val.find((element)=>element === i);
                    if(found){
                        continue;
                    }else{
                        arr.push(i);
                        //dogVisitedMap.set(dogID,arr);
                        return i;
                    }
                }
            }
        }
        console.log('getPID dog not found at all')
        return -1;      
    }
</script>       if(dogID){
            $.ajax({
                url: '<?= base_url() ?>customer/kennel/get_dog_pedgree',                    
                type: 'POST',
                dataType: 'json',
               
                data: {dog_id:dogID},
            
                success: function(data) {
                    
                    dogVisitedMap.clear();
                    let response_arr = [];
                    let id=1;
                    for(let i = 0; i < data.length; i++) {
                      
                       let  parentID = getPID(data,data[i].dog_id);
                       if(parentID == -1){
                        parentID = 0;
                       }else{
                        parentID = parentID + 1;
                       }
                       console.log(dogVisitedMap)
                       var dataObject = {
                            'id':id,
                            'pid': parentID,
                            'dog_id':data[i].dog_id,
                            'parent_id':data[i].parent_id,
                            'mother_id':data[i].mother_id,
                            'name':data[i].name,
                            'gender':data[i].gender,
                            'breeder':data[i].breeder,
                            'photo1':data[i].photo1,
                        };
                        response_arr.push(dataObject);
                       id++;
                    }
                    console.log("------------------------------")
                    console.log(response_arr)
                    var chart = new OrgChart(document.getElementById("tree"), {
                    // mode: 'dark',
                    // state: {
                    //     name: 'StateForMyTree',
                    //     readFromLocalStorage: true,
                    //     writeToLocalStorage: true,
                    // },
                        enableSearch: false, // search field hide 
                        template: templateDefault,
                       // edit form key
                        editForm: {
                            // titleBinding: "name",
                             photoBinding: "photo1",
                            readOnly: true, // edit button hide 
                            // show particular fields on edit form
                            generateElementsFromFields: false,
                            elements: [
                                { type: 'textbox', label: 'Name', binding: 'name'},
                                { type: 'textbox', label: 'Gender', binding: 'gender'},
                                { type: 'textbox', label: 'Microchip Number', binding: 'Microchip Number'},
                                { type: 'textbox', label: 'Register Number', binding: 'Register Number'},
                                { type: 'textbox', label: 'Birth Date', binding: 'Birth Date'},
                                { type: 'textbox', label: 'Breeder', binding: 'breeder'},
                               
                                     
                            ]
                            // end particular fields on edit form 
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
                       
                        nodes:response_arr 
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
                    chart.load(response_arr);
                   

                }
            });
        }
    }

    function getPID(allDogs,dogID){ 
        //debugger;
        dogID = parseInt(dogID);
        //console.log('getPID: '+dogID)
        var arr = [];
        for(i= 0; i < allDogs.length;i++){
            //console.log('getPID: '+ JSON.stringify(allDogs[i]))
            const fatherID = parseInt(allDogs[i].parent_id);
            const motherID = parseInt(allDogs[i].mother_id);
           
            if( dogID === fatherID || dogID ===  motherID  ){
                console.log('getPID: parent matched '+ i)
                let val = dogVisitedMap.get(dogID)
                if(val == null){
                    console.log('getiPID : no enty found' )
                    arr.push(i)
                    dogVisitedMap.set(dogID,arr);
                    return i;
                }else{
                    console.log('getiPID :  enty found at:',i )
                    let found = val.find((element)=>element === i);
                    if(found){
                        continue;
                    }else{
                        arr.push(i);
                        //dogVisitedMap.set(dogID,arr);
                        return i;
                    }
                }
            }
        }
        //console.log('getPID dog not found at all')
        return -1;      
    }
</script> 
<style>
    .node {
    position: relative;
}

.icon {
    position: absolute;
    top: 50%;
    left: -20px; /* Adjust the positioning as needed */
    transform: translateY(-50%);
}

</style>