<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#phoneModal_<?= esc($contact->id) ?>">Show</button>

<div class="modal fade" id="phoneModal_<?= esc($contact->id) ?>" tabindex="-1" role="dialog" aria-labelledby="phonesModalLabel_<?= esc($contact->id) ?>" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="phonesModalLabel_<?= esc($contact->id) ?>">Phone Numbers for <?= esc($contact->name) ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    <?php if (!empty($contact->getPhones())) : ?>
                        <?php foreach ($contact->getPhones() as $phone) : ?>
                            <li class="list-group-item">
                                <?= esc($phone->phone_number) ?>
                            </li>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <li class="list-group-item">No phone numbers available for this contact.</li>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>