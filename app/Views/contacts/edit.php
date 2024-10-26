<?= $this->extend("layouts/app") ?>

<?= $this->section("title") ?>Edit Contact<?= $this->endSection() ?>

<?= $this->section("content") ?>

<div class="container">
    <h2 class="my-4">Edit Contact</h2>
    <?= form_open("contacts/update/" . $contact->id, ['method' => 'post', 'id' => 'contactForm']) ?>
        <input type="hidden" name="_method" value="PUT">

        <?= $this->include("contacts/form") ?>
        
    </form>
</div>

<?= $this->endSection() ?>