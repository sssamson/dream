<!-- Regular Modal -->
<div class="modal fade modal-primary" id="modal" aria-hidden="true" aria-labelledby="modalPrimary" role="dialog" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-status-container">
        <div class="progress-bar blue stripes status-loading" style="display:none">
          <span style="width: 100%"><div class="text">Loading...</div></span>
        </div>
        <div class="progress-bar stripes-plain status-fail" style="display:none">
          <span style="width: 100%"><div class="text">Status: Failed to Load</div></span>
        </div>
        <div class="progress-bar stripes-plain status-pass" style="display:none">
          <span style="width: 100%"><div class="text">Status: Success</div></span>
        </div>
      </div>
      <div class="modal-body"></div>
    </div>
  </div>
</div>
<!-- Large Modal -->
<div class="modal fade modal-primary modal_large" id="modal_large" aria-hidden="true" aria-labelledby="modalLarge" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-status-container">
        <div class="progress-bar blue stripes status-loading" style="display:none">
          <span style="width: 100%"><div class="text">Loading...</div></span>
        </div>
        <div class="progress-bar stripes-plain status-fail" style="display:none">
          <span style="width: 100%"><div class="text">Status: Failed to Load</div></span>
        </div>
        <div class="progress-bar stripes-plain status-pass" style="display:none">
          <span style="width: 100%"><div class="text">Status: Success</div></span>
        </div>
      </div>
      <div class="modal-body"></div>
    </div>
  </div>
</div>
<!-- Delete Modal -->
<div class="modal fade modal-danger" id="modal_warning" aria-hidden="true" aria-labelledby="modalDelete" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-center">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h5 class="modal-title modal_warning-title"></h5>
      </div>
      <div class="modal-body modal_warning-body">
        <p></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button id="delete_confirm" data-id="" data-type="" type="button" class="btn btn-danger delete_confirm">Delete</button>
      </div>
    </div>
  </div>
</div>
<!-- Reboot modal  -->
<div class="modal fade modal-danger" id="modal_reboot" aria-hidden="true" aria-labelledby="modalReboot" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-center">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h5 class="modal-title modal_warning-title"></h5>
      </div>
      <div class="modal-body modal_warning-body">
        <p></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger reboot_confirm">Reboot</button>
        <input type="hidden" id="reboot_serial_number">
      </div>
    </div>
  </div>
</div>
