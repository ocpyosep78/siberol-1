<?php defined ('SISPATH') or die ('Acces Denied');?>
<!DOCTYPE html>
<html>
<head>
        <title>Berita Terhangat | Siberol</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/common.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/ui-lightness/jquery-ui-1.8.16.custom.css">
        
        <script src="<?php echo base_url()?>assets/js/jquery.js"></script>
        <script src="<?php echo base_url()?>assets/js/jquery-ui.js"></script>
        <script>
            $(document).ready(function(){
                $("#tgl_expire").datepicker({
                        changeMonth: true,
                        changeYear: true,
                        dateFormat: 'yy-mm-dd ',
                        showAnim: 'fold'
                });
                $("#tgl_tayang").datepicker({
                        changeMonth: true,
                        changeYear: true,
                        dateFormat: 'yy-mm-dd ',
                        showAnim: 'fold'
                });
            });
        </script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="span8">
				
                <?php
                
                if ($_POST)
                {
                    $SQL = 'UPDATE berita SET judul="'.$_POST['judul'].'" , ';
                    $SQL .= 'tgl_tayang = "'.$_POST['tgl_tayang'].'", ';
                    $SQL .= 'tgl_expire = "'.$_POST['tgl_expire'].'", ';
                    $SQL .= 'kategori   = "'.$_POST['kategori'].'", ';
                    $SQL .= 'status		= "'.$_POST['status'].'", ';
                    $SQL .= 'isi		= "'.$_POST['isi'].'" ';
                    $SQL .= 'WHERE id = "'.$_POST['id'].'"';
                    $data = $DB->query ($SQL);
                    if ($data)
                    {
                        echo '<div class="alert-message block-message success">
                            <p><strong>Well done!</strong> Berita berhasil disimpan</p>
                            </div>';
                    }
                    else
                    {
                            echo '<div class="alert-message block-message warning">
                            <p><strong>Ohhhh nooo!</strong> Berita gagal di edit</p>
                            </div>';
                    }
                }
                
                ?>
				
				
                <?php if ( get_post('method') === 'read'):?>
                
                    <?php $item = $DB->get ('SELECT * FROM berita where id="'.get_post('id').'"','one');?>
                    <?php if ($item):?>
                        <article  class="post-<?php echo $item->id?> post type-post status-publish format-standard hentry">
                            <h4 class="entry-title">
                                <a href="<?php echo base_url().'redaktur?method=read&id='.$item->id?>" title="<?php echo $item->judul?>"><?php echo $item->judul?></a>
                            </h4>
                            <p class="post-meta">
                                <span class="post-date"><?php echo $item->tgl_tayang?></span>
                                <span class="post-author">By <?php echo $item->nm_war?></span>
                                <span class="sep">|</span>
                                <span class="post-categories"><?php echo $item->kategori?></span>
                            </p>		
                            <p>
                                <?php echo $item->isi, 50?>
                            </p>
                            <a class="post-more left" href="<?php echo base_url().'redaktur'?>">&larr; Kembali </a>
                            <a class="post-more right" href="<?php echo base_url().'redaktur?method=edit&id='.($item->id);?>">Edit &rarr;</a>
                        </article>
                    <?php else:?>
                        <div class="alert-message block-message error">
                            <p><strong>Ohh no!</strong> The page you are looking is not found<p>
                        </div>
                    <?php endif?>
                <?php elseif (get_post('method') === 'edit'):?>
                
                    <?php $item = $DB->get ('SELECT * FROM berita where id="'.get_post('id').'"','one');?>
                    <?php if ($item):?>
                        <form class="vertical-form" method="post" action="">
                    <legend>Selamat Datang Wartawan</legend>
                        <fieldset class="control-group">
                            <label class="control-label" for="judul">Judul Berita</label>
                            <div class="controls">
                                <input class="span6" name="judul" type="text" placeholder="Judul berita ..." value="<?php echo $item->judul?>">
                                <input type="hidden" name="id" value="<?php echo $item->id?>">
                            </div>
                        </fieldset>
                        <fieldset class="control-group">
                            <label class="control-label" for="tgl_tayang">Tanggal Tayang</label>
                            <div class="controls">
                                <input class="xlarge" name="tgl_tayang" type="date" id="tgl_tayang" placeholder="Tanggal Tayang Berita" value="<?php echo ($item->tgl_tayang == '0000-00-00') ? '' : $item->tgl_tayang;?>">
                            </div>
                        </fieldset>
			<fieldset class="control-group">
                            <label class="control-label" for="tgl_expire">Tanggal Berakhir</label>
                            <div class="controls">
                                <input class="xlarge" name="tgl_expire" type="date" id="tgl_expire" placeholder="Tanggal Berakhir Berita" value="<?php echo ($item->tgl_expire == '0000-00-00') ? '' : $item->tgl_expire;?>">
                            </div>
                        </fieldset>
                        <fieldset class="control-group">
                            <label class="control-label" for="kategori">Kategori</label>
                            <div class="controls">
                                <?php echo form_dropdown('kategori', array('olahraga'=>'Olahraga','politik'=>'Politik','hiburan'=>'Hiburan','internet'=>'Internet'), $item->kategori)?>
                            </div>
                        </fieldset>
                        <fieldset class="control-group">
                            <label class="control-label" for="status">Status</label>
                            <div class="controls">
				<?php echo form_dropdown('status', array('Draft','Publish'), $item->status)?>
                            </div>
                        </fieldset>
                        <fieldset class="control-group">
                            <label class="control-label" for="isi">Isi Berita</label>
                            <div class="controls">
                                <textarea class="span6" name="isi" rows="15" placeholder="Isi berita ..."><?php echo $item->isi?></textarea>
                            </div>
                        </fieldset>
                        <fieldset class="form-actions">
                            <button type="submit" class="btn primary">Save </button>
                            <button type="reset" class="btn">Cancel</button>
                        </fieldset>
                </form>
                    <?php else:?>
                        <div class="alert-message block-message error">
                            <p><strong>Ohh no!</strong> The page you are looking is not found<p>
                        </div>
                    <?php endif?>
                
                <?php else:?>
                
                    <?php $data = $DB->get('SELECT * FROM berita ORDER BY id DESC','all');?>
                    <?php if ($data):?>
                    <?php foreach ($data as $item):?>
                    
                    <article  class="post-<?php echo $item->id?> post type-post status-publish format-standard hentry">
                        <h4 class="entry-title">
                            <a href="<?php echo base_url().'redaktur?method=read&id='.$item->id?>" title="<?php echo $item->judul?>"><?php echo $item->judul?></a>
                        </h4>
                        <p class="post-meta">
                            <span class="post-date"><?php echo $item->tgl_tayang?></span>
                            <span class="post-author">By <?php echo $item->nm_war?></span>
                            <span class="sep">|</span>
                            <span class="post-categories"><?php echo $item->kategori?></span>
                        </p>		
                        <p>
                            <?php echo word_limit($item->isi, 50)?>
                        </p>
                        <a class="post-more" href="<?php echo base_url().'redaktur?method=read&id='.$item->id?>">Review &rarr;</a>
                    </article>
                    
                    <?php endforeach?>
                    <?php endif?>
                    
                <?php endif?>
            </div>
            <div class="span4">
                Right Bar
            </div>
        </div>
    </div>
</body>

</html> 