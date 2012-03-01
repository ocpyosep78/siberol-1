<div class="page-header">
    <?php echo $desc;?>
</div>

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Desciption</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($berita as $b):?>
        <tr>
            <td></td>
            <td>
                <h3><?php echo $b->judul;?></h3>
                <p><small><i class="icon-time"></i> <?php echo $b->tgl_post;?> &nbsp;&nbsp;<i class="icon-tag"></i> <?php echo ucwords($b->kategori);?></small></p>
                <p><?php echo word_limiter(strip_html_tags($b->isi));?></p>
            </td>
            <td><?php echo anchor($module.'/update/'.$b->id,'Update');?></td>
            <td><?php echo anchor($module.'/delete/'.$b->id,'Delete');?></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>