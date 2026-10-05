<?php
$page_title = "Add Book";
include __DIR__ . '/../includes/header.php';
$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
?>
    <section>
      <h2>Add Book</h2>
      <?php if ($flash): ?>
      <p class="flash flash-<?php echo e($flash['type']); ?>"><?php echo e($flash['pesan']); ?></p>
      <?php endif; ?>
      <form id="form-tambah" method="post" action="proses_tambah.php" novalidate>
        <div class="field"><label for="judul">Title</label><input type="text" id="judul" name="judul"></div>
        <div class="field"><label for="pengarang">Author</label><input type="text" id="pengarang" name="pengarang"></div>
        <div class="field"><label for="tahun">Year</label><input type="number" id="tahun" name="tahun"></div>
        <div class="field"><label for="stok">Stock</label><input type="number" id="stok" name="stok"></div>
        <div class="field"><label for="isbn">ISBN (optional)</label><input type="text" id="isbn" name="isbn"></div>
        <div class="field"><label for="kategori">Category (optional)</label><input type="text" id="kategori" name="kategori"></div>
        <button type="submit">Save</button>
      </form>
    </section>
<?php include __DIR__ . '/../includes/footer.php'; ?>