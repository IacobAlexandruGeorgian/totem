<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="<?= esc($contact->name) ?>">
</div>

<div class="form-group">
    <label for="gender">Gender</label>
    <select name="gender" id="gender" class="form-control">
        <option value="default" selected disabled>Select gender</option>
        <option value="male" <?= $contact->gender === 'male' ? 'selected' : '' ?>>Male</option>
        <option value="female" <?= $contact->gender === 'female' ? 'selected' : '' ?>>Female</option>
    </select>
</div>

<div class="form-group">
    <label for="CNP">CNP</label>
    <input type="text" name="CNP" id="CNP" class="form-control" value="<?= esc($contact->CNP) ?>">
</div>

<div class="form-group">
    <label for="birth_date">Birth Date</label>
    <input type="date" name="birth_date" id="birth_date" class="form-control" value="<?= esc($contact->birth_date) ?>">
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input type="text" name="email" id="email" class="form-control" value="<?= esc($contact->email) ?>">
</div>

<div class="form-group">
    <label for="phones">Phones</label>
    <select name="phones[]" id="phones" class="form-control select2" multiple="multiple" placeholder="Add phone numbers">
        <?php if (!empty($contact->getPhones())) : ?>
            <?php foreach ($contact->getPhones() as $phone) : ?>
                <option value="<?= esc($phone->phone_number) ?>" selected><?= esc($phone->phone_number) ?></option>
            <?php endforeach; ?>
        <?php endif; ?>
    </select>
</div>

<div class="d-flex justify-content-between mt-4">
    <a href="javascript:history.back()" class="btn btn-secondary">Cancel</a>
    <button type="submit" class="btn btn-success">Save</button>
</div>