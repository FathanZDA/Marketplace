<h1>Halaman Produk</h1>

<h3>Tambah Produk</h3>
<form method="POST" action="index.php?url=products">
    <input name="name" placeholder="Nama produk"><br><br>
    <input name="price" placeholder="Harga"><br><br>
    <button type="submit">Tambah</button>
</form>

<hr>

<h3>Daftar Produk</h3>

<?php foreach ($data as $item): ?>
    <div style="margin-bottom:10px;">
        <b><?= $item['name'] ?></b> - Rp<?= $item['price'] ?>

        <!-- DELETE -->
        <form method="POST" action="index.php?url=products/delete" style="display:inline;">
            <input type="hidden" name="id" value="<?= $item['id'] ?>">
            <button type="submit">Hapus</button>
        </form>

        <!-- EDIT -->
        <form method="POST" action="index.php?url=products/update" style="display:inline;">
            <input type="hidden" name="id" value="<?= $item['id'] ?>">
            <input name="name" placeholder="Nama baru">
            <input name="price" placeholder="Harga baru">
            <button type="submit">Edit</button>
        </form>
    </div>
<?php endforeach; ?>