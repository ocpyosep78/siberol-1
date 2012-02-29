<div class="row">
    <div class="span8">
        <div class="carousel slide" id="myCarousel">
            <div class="carousel-inner">
              <div class="item">
                <img alt="" src="<?php echo base_url();?>_assets/img/bootstrap-mdo-sfmoma-01.jpg"/>
                <div class="carousel-caption">
                  <h4>First Thumbnail label</h4>
                  <p>ssss</p>

                </div>
              </div>
              <div class="item">
                <img alt="" src="<?php echo base_url();?>_assets/img/bootstrap-mdo-sfmoma-02.jpg"/>
                <div class="carousel-caption">
                  <h4>Second Thumbnail label</h4>
                  <p>CSecon</p>
                </div>

              </div>
              <div class="item active">
                <img alt="" src="<?php echo base_url();?>_assets/img/bootstrap-mdo-sfmoma-03.jpg"/>
                <div class="carousel-caption">
                  <h4>Third Thumbnail label</h4>
                  <p>Thirs</p>
                </div>
              </div>

            </div>
            <a data-slide="prev" href="#myCarousel" class="left carousel-control">&lsaquo;</a>
            <a data-slide="next" href="#myCarousel" class="right carousel-control">&rsaquo;</a>
        </div>
    </div>
    <div class="span4">
        <div class="page-header">
            <h3>Popular News</h3>
        </div>
    </div>
</div>
<div class="row">
    <div class="span4">
        <div class="page-header">
            <h3>Hot News</h3>
        </div>
        <table class="table table-condensed table-striped">
            <tbody>
                <?php foreach($berita as $b):?>
                <tr>
                    <td><?php echo $b->tgl_tayang;?></td>
                    <td><?php echo character_limiter($b->judul,60);?></td>
                </tr>
                 <?php endforeach;?>
            </tbody>
        </table>
        
        
    </div>
    <div class="span4">
        <div class="page-header">
            <h3>Media Internet</h3>
        </div>
        <p>Lorep sum ipsum</p>
        
        <div class="page-header">
            <h3>Media Olahraga</h3>
        </div>
        <p>Lorep sum ipsum</p>
        
        <div class="page-header">
            <h3>Media Politik</h3>
        </div>
        <p>Lorep sum ipsum</p>
        
        <div class="page-header">
            <h3>Media Hiburan</h3>
        </div>
        
        <p>Lorep sum ipsum</p>
    </div>
    <div class="span4">
        <div class="page-header">
            <h3>Widgets</h3>
        </div>
    </div>
</div>
