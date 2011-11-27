<!DOCTYPE html>
<html>
<head>
        <title>Berita Terhangat | Siberol</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="span8">
                <?php $data = $DB->get_all('SELECT * FROM berita where status="1"');?>
                <?php if ($data):?>
                <?php foreach ($data as $item):?>
                
                <article  class="post-363 post type-post status-publish format-standard hentry category-codeigniter category-getsparks tag-codeigniter tag-sparks">
                    <h4 class="entry-title">
                        <a href="<?php echo base_url().'index.php/news?id='.$item->id?>" title="<?php echo $item->judul?>"><?php echo $item->judul?></a>
                    </h4>
                    <p class="post-meta">
                        <span class="post-author">By <?php echo $item->nm_war?></span>
                        <span class="sep">|</span>
                        <span class="post-categories"><?php echo $item->kategori?></span>
                    </p>		
		    <p>
                        <?php echo word_limit($item->isi, 50)?>
                    </p>
                    <a class="post-more" href="<?php echo base_url().'index.php/news?id='.$item->id?>">Continue Reading &rarr;</a>
                </article>
                
                <?php endforeach?>
                <?php endif?>
                
            </div>
            <div class="span4">
                Eed
            </div>
        </div>
    </div>
</body>

</html> 