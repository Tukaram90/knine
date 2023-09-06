
<div class="well">
    <h5 class="sidebar-header">User Link</h5>
    <div class="row">
        <ul class="list-unstyled">
        <li>
            <a class="<?php echo ($active=='userdashboard')?'userliinkactive':''; ?>" href="<?php echo base_url(); ?>user-dashboard">Profile</a>
        </li>
        <li>
            <!-- <a class="<?php echo ($active=='add_dog')?'userliinkactive':''; ?>" href="<?php echo base_url(); ?>add-dog">Add Dog</a> -->
            <a class="<?php echo ($active=='doglist' || $active=='add_dog' || $active =="edit_dog")?'userliinkactive':''; ?>" href="<?php echo base_url(); ?>user/doglist">Dog Info</a>
            
        </li>
        <li><a class="<?php echo ($active=='expense' || $active == 'addexpense')?'userliinkactive':''; ?>" href="<?php echo base_url(); ?>expense">Expense</a>
        </li>
        <li><a href="<?php echo base_url(); ?>user/logout">Logout</a>
        </li>
        </ul>
    </div>
</div> 