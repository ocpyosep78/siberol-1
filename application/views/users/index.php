<div class="page-header">
    <div class="pull-right"><?php echo anchor('users/insert','Tambah users','class="btn btn-primary"');?></div>
    <h2>Manage Users <small>Daftar nama user siberol</small></h2>
</div>

<table class="table">
    <thead>
        <tr>
            <th width="10">#</th>
            <th>Nama Asli</th>
            <th>Username</th>
            <th>User Tipe</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($u as $u):?>
        <tr>
            <td></td>
            <td><?php echo $u->nama_lengkap;?></td>
            <td><?php echo $u->username;?></td>
            <td><?php echo $u->tipe;?></td>
            <td><?php echo anchor($module.'/update/'.$u->id,'Update');?></td>
            <td><?php echo anchor($module.'/delete/'.$u->id,'Delete');?></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>