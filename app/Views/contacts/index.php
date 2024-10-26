<?= $this->extend("layouts/app") ?>

<?= $this->section("title") ?>Contacts<?= $this->endSection() ?>

<?= $this->section("content") ?>

<div class="d-flex justify-content-between mb-3">

    <a href="<?= url_to('contact.create') ?>" class="btn btn-success">Create Contact</a>

    <?= form_open('', ['method' => 'get', 'class' => 'form-inline']) ?>
    <input type="text" name="filter" value="<?= esc($filter) ?>" placeholder="Search" class="form-control mr-2" />
    <button type="submit" class="btn btn-success">Search</button>
    </form>
</div>

<div class="table-responsive">
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">
                    <a href="<?= site_url('') ?>?sort=name&order=<?= $sort === 'name' && $order === 'asc' ? 'desc' : 'asc' ?>&filter=<?= esc($filter) ?>">
                        Name <?= $sort === 'name' ? ($order === 'asc' ? '▲' : '▼') : '' ?>
                    </a>
                </th>
                <th scope="col">
                    <a href="<?= site_url('') ?>?sort=CNP&order=<?= $sort === 'CNP' && $order === 'asc' ? 'desc' : 'asc' ?>&filter=<?= esc($filter) ?>">
                        CNP <?= $sort === 'CNP' ? ($order === 'asc' ? '▲' : '▼') : '' ?>
                    </a>
                </th>
                <th scope="col">
                    <a href="<?= site_url('') ?>?sort=birth_date&order=<?= $sort === 'birth_date' && $order === 'asc' ? 'desc' : 'asc' ?>&filter=<?= esc($filter) ?>">
                        Birth Date <?= $sort === 'birth_date' ? ($order === 'asc' ? '▲' : '▼') : '' ?>
                    </a>
                </th>
                <th scope="col">
                    <a href="<?= site_url('') ?>?sort=email&order=<?= $sort === 'email' && $order === 'asc' ? 'desc' : 'asc' ?>&filter=<?= esc($filter) ?>">
                        Email <?= $sort === 'email' ? ($order === 'asc' ? '▲' : '▼') : '' ?>
                    </a>
                </th>
                <th scope="col">Phone</th>
                <th scope="col">
                    <a href="<?= site_url('') ?>?sort=created_at&order=<?= $sort === 'created_at' && $order === 'asc' ? 'desc' : 'asc' ?>&filter=<?= esc($filter) ?>">
                        Created at <?= $sort === 'created_at' ? ($order === 'asc' ? '▲' : '▼') : '' ?>
                    </a>
                </th>
                <th scope="col">
                    <a href="<?= site_url('') ?>?sort=updated_at&order=<?= $sort === 'updated_at' && $order === 'asc' ? 'desc' : 'asc' ?>&filter=<?= esc($filter) ?>">
                        Updated at <?= $sort === 'updated_at' ? ($order === 'asc' ? '▲' : '▼') : '' ?>
                    </a>
                </th>
                <th scope="col">
                    <a href="<?= site_url('') ?>?sort=deleted_at&order=<?= $sort === 'deleted_at' && $order === 'asc' ? 'desc' : 'asc' ?>&filter=<?= esc($filter) ?>">
                        Deleted at <?= $sort === 'deleted_at' ? ($order === 'asc' ? '▲' : '▼') : '' ?>
                    </a>
                </th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contacts as $contact): ?>
                <tr id="contactRow_<?= esc($contact->id) ?>">
                    <td><?= esc($contact->name) ?></td>
                    <td><?= esc($contact->CNP) ?></td>
                    <td><?= esc($contact->birth_date) ?></td>
                    <td><?= esc($contact->email) ?></td>
                    <td><?= view('components/phoneModal', ['contact' => $contact]) ?></td>
                    <td><?= esc($contact->created_at) ?></td>
                    <td><?= esc($contact->updated_at) ?></td>
                    <td><?= esc($contact->deleted_at) ?></td>
                    <td>
                        <a href="<?= url_to('contact.edit', esc($contact->id)) ?>" class="btn btn-sm btn-primary">Edit</a>
                        <?= view('components/deleteModal', ['contact' => $contact]) ?>
                    </td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-center">
    <?= $pager->links('default', 'bootstrap_pagination') ?>
</div>
<?= $this->endSection() ?>