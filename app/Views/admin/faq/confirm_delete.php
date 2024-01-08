<!-- app/Views/admin/faq/confirm_delete.php -->

<h1>Confirm Delete FAQ</h1>

<p>Are you sure you want to perform the deletion?</p>

<p><strong>Category:</strong> <?= $faq['kategori'] ?></p>
<p><strong>Question:</strong> <?= $faq['pertanyaan'] ?></p>

<form action="<?= site_url('admin/faq/perform-delete/' . $faq['id_faq']) ?>" method="post">

    <?= csrf_field() ?>

    <button type="submit">Yes, Perform Deletion</button>

    <a href="<?= site_url('admin/faq') ?>">No, Cancel</a>

</form>