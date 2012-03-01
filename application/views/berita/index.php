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
            <h3></h3>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th colspan="2">Your device info</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Operating System</td>
                    <td><?php echo $this->agent->platform();?></td>
                </tr>
                <tr>
                    <td>Browser</td>
                    <td><?php echo $this->agent->browser();?></td>
                </tr>
                <tr>
                    <td>Browser Version</td>
                    <td><?php echo $this->agent->version();?></td>
                </tr>
                <tr>
                    <td>Agent string</td>
                    <td><?php echo $this->agent->agent_string();?></td>
                </tr>
                <tr>
                    <td>Your IP Address</td>
                    <td><?php echo $this->input->ip_address();?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="span4">
        <div class="page-header">
            <h3>Prakiran cuaca hari ini</h3>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Kota</th>
                    <th>Cuaca</th>
                    <th>Suhu &deg;C</th>
                    <th>Kelembaban % </th>
                </tr>
            </thead>
            <?php echo $this->cuaca->get();?>
        </table>
        
        <p><small>Sumber : <a href="http://meteo.bmkg.go.id/prakiraan/indonesia">BMKG</a></small></p>
        
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
    <div class="span8">
        
        <?php foreach($berita as $b):?>
        <section>
            <h3><?php echo anchor($module.'/read/'.$b->id,$b->judul);?></h3>
            <p><small><i class="icon-time"></i> <?php echo $b->tgl_post;?> &nbsp;&nbsp;<i class="icon-tag"></i> <?php echo ucwords($b->kategori);?></small></p>
            <p><?php echo word_limiter(strip_html_tags($b->isi));?></p>
            <p><?php echo anchor($module.'/read/'.$b->id,'Continue reading &rarr;');?></p>
        </section>
        <?php endforeach;?>
    </div>
</div>
