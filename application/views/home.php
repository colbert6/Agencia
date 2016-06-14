<style>
    .title-h1{display: inline-block;
    border: 10px solid #3c8dbc;
    margin: 1em 0em 2em;
    position: relative;
    width:100%;
    }
    .aba{margin-bottom:100px;}
    .empresa{width:60%;background:#3c8dbc;color:#fff;text-transform:uppercase;margin:auto;margin-top: -25px;}
    .empresa>h5{text-align:center;padding:10px 0;}
    .title-h1>h2{text-transform:uppercase;text-align:center;}
</style>
<div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-4">
    <div class="title-h1">
            <div class="empresa">
                <h5>Empresa <?= $this->session->userdata('empresa') ?></h5>
            </div>
            <h2>Bienvenido <?= $this->session->userdata('user'); ?></h2>
        </div>
  </div>
  <div class="col-md-4"></div>
    
</div>
<div class="row">
  <div class="col-md-8">
    <div class="aba">
      
    </div>
    <img src="<?= base_url().'img/'.$this->session->userdata('img_empresa');?>" alt="Imagen Logo" width="100%"/>
  </div>
  <div class="col-md-4">
    <img src="<?= base_url().'img/'.$this->session->userdata('persona');?>" alt="Imagen Logo" width="75%" height="350" />
  </div>
</div>
