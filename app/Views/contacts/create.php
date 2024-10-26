<?= $this->extend("layouts/app") ?>

<?= $this->section("title") ?>Create Contact<?= $this->endSection() ?>

<?= $this->section("content") ?>

<div class="container">
    <h2 class="my-4">Create Contact</h2>
    <?= form_open("contacts/store", ['method' => 'post', 'id' => 'contactForm']) ?>

    <?= $this->include("contacts/form") ?>

    </form>
</div>

<?= $this->endSection() ?>