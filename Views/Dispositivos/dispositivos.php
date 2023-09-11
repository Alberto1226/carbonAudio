<?php 
    headerAdmin($data); 
    getModal('modalProductos',$data);
    getModal('modalDispositivosMasiva',$data);
    
?>
    <main class="app-content">
      <div class="app-title">
        <div>
            <h1><i class="fas fa-box"></i> <?= $data['page_title'] ?>
              <?php if($_SESSION['permisosMod']['w']){ ?>
                <button class="btn btn-primary" type="button" onclick="openModal();" ><i class="fas fa-plus-circle"></i> Nuevo</button>
                <button class="btn btn-primary" type="button" onclick="openModal2();" ><i class="fas fa-plus-circle"></i> Carga Masiva</button>
              <?php } ?> 
            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>/Dispositivos"><?= $data['page_title'] ?></a></li>
        </ul>
      </div>
        <div class="row">
            <div class="col-md-12">
              <div class="tile">
                <div class="tile-body">
                  <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="tableDispositivos">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>IMEI GPS</th>
                          <th>Modelo GPS</th>
                          <th>Fecha de Adquisición</th>
                          <th>Status GPS</th>
                          <th>Numero SIM</th>
                          <th>Operador</th>
                          <th>Fecha de Contratación SIM</th>
                          <th>Status SIM</th>
                          <th>Cliente</th>
                          <th>Apellidos</th>
                          <th>Status Plan</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </main>
<?php footerAdmin($data); ?>
    