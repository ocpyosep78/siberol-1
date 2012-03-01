<div class="page-header">
    <h2>Warning !!!</h2>
</div>
<p>
    Anda yakin akan menghapus user ini ?
    <?php echo form_open();?>
        <?php echo view_errors();?>
        <?php echo form_hidden('id', $this->uri->segment(3));?>
        <div class="form-actions">
            <button type="submit" class="btn btn-danger">Confirm delete</button>
            <?php echo anchor($module.'/index', 'Back','class="btn"');?>
        </div>
    <?php echo form_close();?>
</p>
