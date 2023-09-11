<!-- Modal -->
<div class="modal fade" id="modalFormPlanes" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo Plan Prepago</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="tile">
            <div class="tile-body">
              <form id="formPlanes" name="formPlanes">
                <input type="hidden" id="idPlanes" name="idPlanes" value="">
                <div class="form-group">
                  <label class="control-label">Descripción</label>
                  <textarea class="form-control" id="txtNombrePlan" name="txtNombrePlan" rows="2" placeholder="Descripción del plan" required=""></textarea>
                  
                </div>
                <div class="form-group">
                  <label class="control-label">Monto</label>
                  <input class="form-control" id="txtMontoplan" name="txtMontoplan" type="text" placeholder="Monto" required="">
                </div>
                <div class="form-group">
                  <label class="control-label">Duración</label>
                  <input class="form-control" id="txtDuracion" name="txtDuracion" type="number"  required="">
                </div>
                <div class="tile-footer">
                  <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#" data-dismiss="modal" ><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
                </div>
              </form>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
