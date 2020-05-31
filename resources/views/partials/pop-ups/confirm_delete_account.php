<!-- Modal -->
<div class="modal fade" id="confirmDeleteAccount" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Delete account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5 class="pb-2">We're sad to see you go...</h5>
        <label for="confirmText">Enter <strong>"Artifact Ink"</strong> to unlock Delete button</label>
        <input id="confirmText" class="form-control" type="text" placeholder="Artifact Ink" value="" autocomplete="off">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-link a_link" data-dismiss="modal">Cancel</button>
        <button id="deleteAccountButton" type="button" class="btn button" autocomplete="off" disabled>Delete</button>
      </div>
    </div>
  </div>
</div>