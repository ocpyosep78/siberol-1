<div class="page-header">
    <h2>Profile</h2>
</div>
<?php echo form_open_multipart();?>
    <?php echo view_errors();?>
    <?php echo form_text('Username','username',@$u->username);?>
    <?php echo form_text('Nama Lengkap','nama_lengkap',@$u->nama_lengkap,'class="span6"');?>
    <?php echo form_pass('Password','password');?>
    
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Save changes</button>
        <button type="reset" class="btn">Reset</button>
    </div>
<?php echo form_close();?>