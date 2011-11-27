<?php defined ('SISPATH') or die ('Acces Denied');?>
<!DOCTYPE html>
<html>
<head>
        <title>Berita Terhangat | Siberol</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/common.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="span8">
                <?php if ( get_post('method') == 'read'):?>
                
                    <?php $item = $DB->get ('SELECT * FROM berita where status="1" AND id="'.get_post('id').'"','one');?>
                    <?php if ($item):?>
                        <article  class="post-<?php echo $item->id?> post type-post status-publish format-standard hentry">
                            <h4 class="entry-title">
                                <a href="<?php echo base_url().'index.php/news?method=read&id='.$item->id?>" title="<?php echo $item->judul?>"><?php echo $item->judul?></a>
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
                            <a class="post-more left" href="<?php echo base_url().'index.php/news?method=read&id='.($item->id - 1 );?>">&larr; Artikel Sebelumnya </a>
                            <a class="post-more right" href="<?php echo base_url().'index.php/news?method=read&id='.($item->id + 1 );?>">Artikel Selanjutnya &rarr;</a>
                        </article>
                    <?php endif?>
                    
                <?php else:?>
                
                    <?php $data = $DB->get('SELECT * FROM berita where status="1"','all');?>
                    <?php if ($data):?>
                    <?php foreach ($data as $item):?>
                    
                    <article  class="post-<?php echo $item->id?> post type-post status-publish format-standard hentry">
                        <h4 class="entry-title">
                            <a href="<?php echo base_url().'index.php/news?method=read&id='.$item->id?>" title="<?php echo $item->judul?>"><?php echo $item->judul?></a>
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
                        <a class="post-more" href="<?php echo base_url().'index.php/news?method=read&id='.$item->id?>">Continue Reading &rarr;</a>
                    </article>
                    
                    <?php endforeach?>
                    <?php endif?>
                    
                <?php endif?>
            </div>
            <div class="span4">
                Eed
            </div>
        </div>
    </div>
</body>

</html> 