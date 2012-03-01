<div class="row">
    <div class="span8">
        <section>
            <h3><?php echo anchor($module.'/read/'.$b->id,$b->judul);?></h3>
            <p><small><i class="icon-time"></i> <?php echo $b->tgl_post;?> &nbsp;&nbsp;<i class="icon-tag"></i> <?php echo ucwords($b->kategori);?></small></p>
            <p>
                <?php echo $b->gambar ? '<img src="'.base_url().'_assets/_writable/upload/'.$b->gambar.'" alt="gambar" style="float:left; margin: 10px">' : '';?>
                <?php echo $b->isi;?>
            </p>
        </section>
    </div>
    <div class="span4">
        <?php foreach($other as $o):?>
        <section style="padding-bottom: 3px;">
            <h4><?php echo anchor($module.'/read/'.$o->id,$o->judul);?></h4>
            <p><small><i class="icon-time"></i> <?php echo $o->tgl_post;?> &nbsp;&nbsp;<i class="icon-tag"></i> <?php echo ucwords($o->kategori);?></small></p>
        </section>
        <?php endforeach;?>
    </div>
</div>