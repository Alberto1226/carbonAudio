<!-- Modal -->
<div class="modal fade" id="modalFormSim" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo SIM</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modalBody">
          <div class="tile">
            <div class="tile-body">
              <form id="formSim" name="formSim">
                <input type="hidden" id="idSim" name="idSim" value="">
                <div class="form-group">
                  <label class="control-label">Numero</label>
                  <input class="form-control" id="txtNumero" name="txtNumero" type="text" placeholder="Numero" required="">
                </div>
                <div class="form-group">
                <label class="control-label">Operador</label>
                <select class="form-control" id="txtOperador" name="txtOperador" required="">
                    <option value="">Selecciona un operador</option>
                    <option value="Telcel">Telcel</option>
                    <option value="Movistar">Movistar</option>
                    <option value="Bait">Bait</option>
                    <option value="AT&T">AT&T</option>
                    <option value="Unefon">Unefon</option>
                    <option value="Virgin Mobile">Virgin Mobile</option>
                    <option value="Maztiempo">Maztiempo</option>
                    <option value="Cierto">Cierto</option>
                    <option value="Weex">Weex</option>
                </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Fecha y Hora</label>
                    <input class="form-control" id="txtFechaHora" name="txtFechaHora" type="datetime-local" required="">
                </div>
                <div class="form-group">
                <label class="control-label">Status</label>
                <select class="form-control" id="txtSelelct" name="txtSelelct" required="">
                    
                    <option value="1">Activo</option>
                    <option value="0">Desactivo</option>
                   
                </select>
                </div>
                
                <div id="labelstatus"></div>
                <div id="selectactivo"></div>
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