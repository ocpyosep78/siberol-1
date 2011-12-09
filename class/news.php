<?php defined ('SISPATH') or die ('Acces Denied');?>
<!DOCTYPE html>
<html>
<head>
        <title>Berita Terhangat | Siberol - Situs Berita dan Informasi Online</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/common.css">
</head>

<body>
<!-- Navbar
	================================================== -->
	<div class="navbar navbar-fixed" data-scrollspy="scrollspy">
		<div class="navbar-inner">
			<div class="container">
				<a class="brand" href="<?php echo base_url()?>">Siberol</a>
				<ul class="nav">
                                        <li><a href="<?php echo base_url()?>">News</a></li>
					<li><a href="<?php echo base_url()?>news?category=internet">Internet</a></li>
					<li><a href="<?php echo base_url()?>news?category=olahraga">Olahraga</a></li>
					<li><a href="<?php echo base_url()?>news?category=politik">Politik</a></li>
					<li><a href="<?php echo base_url()?>news?category=hiburan">Hiburan</a></li>
				</ul>
			</div>
		</div>
	</div>
        
    <div class="container">
        <div class="page-header">
                <h1>Siberol<small> Sistem Informasi Berita Online.</small></h1>
        </div>
        <div class="row">
            <div class="span8">
                <?php if ( get_post('method') === 'read'):?>
                
                    <?php $item = $DB->get ('SELECT * FROM berita where status="1" AND id="'.get_post('id').'"','one');?>
                    <?php if ($item):?>
                        <article  class="post-<?php echo $item->id?> post type-post status-publish format-standard hentry">
                            <h4 class="entry-title">
                                <a href="<?php echo base_url().'news?method=read&id='.$item->id?>" title="<?php echo $item->judul?>"><?php echo $item->judul?></a>
                            </h4>
                            <p class="post-meta">
                                <span class="post-date"><?php echo $item->tgl_tayang?></span>
                                <span class="post-author">By <?php echo $item->nm_war?></span>
                                <span class="sep">|</span>
                                <span class="post-categories"><?php echo $item->kategori?></span>
                            </p>		
                            <p>
                                <?php if ($item->gambar):?>
                                <img src="<?php echo base_url().$item->gambar?>">
                                <?php endif;?>
                                <?php echo $item->isi?>
                            </p>
                            
                        </article>
                    <?php else:?>
                        <div class="alert-message block-message error">
                            <p><strong>Ohh no!</strong> The page you are looking is not found<p>
                        </div>
                    <?php endif?>
                    
                <?php else:?>
                    <?php if (get_post('category')):?>
                        <?php $data = $DB->get('SELECT * FROM berita where status="1" AND kategori="'.get_post('category').'" ORDER BY tgl_tayang DESC, id ASC','all');?>
                    <?php else:?>
                        <?php $data = $DB->get('SELECT * FROM berita where status="1" ORDER BY tgl_tayang DESC, id ASC','all');?>
                    <?php endif;?>
                    <?php if ($data):?>
                    <?php foreach ($data as $item):?>
                    
                    <article  class="post-<?php echo $item->id?> post type-post status-publish format-standard hentry">
                        <h4 class="entry-title">
                            <a href="<?php echo base_url().'news?method=read&id='.$item->id?>" title="<?php echo $item->judul?>"><?php echo $item->judul?></a>
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
                        <a class="post-more" href="<?php echo base_url().'news?method=read&id='.$item->id?>">Continue Reading &rarr;</a>
                    </article>
                    
                    <?php endforeach?>
                    <?php else:?>
                        <h4>Article Not Found</h4>
                    <?php endif?>
                    
                <?php endif?>
            </div>
            <div class="span4">
                <h4>Berita Lainya</h4>
                <?php $lain = $DB->get('SELECT * FROM berita
                                       where status="1" AND id != "'.@$_GET['id'].'"  ORDER BY tgl_tayang DESC
                                       LIMIT 0 , 5','all');?>
                <ul>
                    <?php foreach ($lain as $lain):?>
                    <li> <a class="post-more" href="<?php echo base_url().'news?method=read&id='.$lain->id?>"><?php echo $lain->judul?></a></li>
                    <?php endforeach;?>
                </ul>
                <?php if (empty($_SESSION['nama_lengkap'])):?>
                <form action="<?php echo base_url()?>login" class="vertical-form" method="post">
                        <legend>Form Login</legend>
                        <fieldset class="control-group">
                                <label class="control-label">Username:</label>
                                <div class="controls">
                                    <input type="text" value="" name="username" placeholder="Type username">
                                </div>
                        </fieldset>
                        <fieldset class="control-group">
                                <label class="control-label">Password:</label>
                                <div class="controls">
                                    <input type="text" value="" name="password" placeholder="Type password">
                                </div>
                        </fieldset>
                        
                        <fieldset class="form-actions">
                                <input type="submit" name="submit" value="Login" class="btn primary">
                                <input type="reset" name="reset" value="Reset" class="btn">
                                
                        </fieldset>
                        
                </form>
                <?php endif;?>
            </div>
        </div>
    </div>
</body>

</html> 