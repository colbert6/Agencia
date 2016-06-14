<style>
    .title-h1{display: inline-block;
    border: 10px solid #3c8dbc;
    margin: 1em 0em 2em;
    position: relative;
    width:100%;
    }
    .empresa{width:60%;background:#3c8dbc;color:#fff;text-transform:uppercase;margin:auto;margin-top: -25px;}
    .empresa>h5{text-align:center;padding:10px 0;}
    .title-h1>h2{text-transform:uppercase;text-align:center;}
</style>
<div class="row">
    <div class="col-md-4">
        <div class="title-h1">
            <div class="empresa">
                <h5>Empresa <?= $this->session->userdata('empresa') ?></h5>
            </div>
            <h2>Bienvenido <?= $this->session->userdata('user'); ?></h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <img src="<?= base_url().'img/'.$this->session->userdata('persona');?>" alt="Imagen Logo" width="75%" height="350" />
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <img src="<?= base_url().'img/'.$this->session->userdata('img_empresa');?>" alt="Imagen Logo" width="100%"/>
        <div class="col-md-12">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="<?= base_url().'img/'.$this->session->userdata('img1');?>" width="100%"/>
      <div class="carousel-caption">
        <h3>Empresa <?= $this->session->userdata('empresa') ?></h3>
        <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
      </div>
    </div>

    <div class="item">
      <img src="<?= base_url().'img/'.$this->session->userdata('img2');?>" width="100%"/>
      <div class="carousel-caption">
        <h3>Empresa <?= $this->session->userdata('empresa') ?></h3>
        <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
      </div>
    </div>

    <div class="item">
      <img src="<?= base_url().'img/'.$this->session->userdata('img3');?>" width="100%"/>
      <div class="carousel-caption">
        <h3>Empresa <?= $this->session->userdata('empresa') ?></h3>
        <p>Beatiful flowers in Kolymbari, Crete.</p>
      </div>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
        </div>
    </div>
</div>
