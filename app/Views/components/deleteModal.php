<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#contactDeleteModal_<?= esc($contact->id) ?>" <?= $contact->deleted_at ? 'disabled' : '' ?>>Delete</button>

<div class="modal fade" id="contactDeleteModal_<?= esc($contact->id) ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel"><?= esc($contact->name) ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <input type="hidden" id="deleteUrl_<?= esc($contact->id) ?>" value="<?= url_to("contact.delete", $contact->id)  ?>">

                Are you sure you want to delete this contact?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" id="confirmDeleteButton_<?= esc($contact->id) ?>" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>