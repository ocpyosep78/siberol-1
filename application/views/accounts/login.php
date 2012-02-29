<div class="row">
    <div class="span6 offset3">
        <?php echo form_open('',array('class'=>'form-horizontal'));?>
            <fieldset>
                <legend>Sign In </legend>
                <?php echo view_errors();?>
                <?php echo form_text('Username','username');?>
                <?php echo form_pass('Password','password');?>
                <?php echo form_text('Captcha','captcha');?>
            </fieldset>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Sign In</button>
                <button type="reset" class="btn">Reset</button>
            </div>
        <?php echo form_close();?>
        <p>
            <?php echo anchor(base_url(),'&larr; Back to Public Page');?>
        </p>
    </div>
</div>
