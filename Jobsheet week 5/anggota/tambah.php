<?php
$page_title = "Add Member";
include __DIR__ . '/../includes/header.php';
$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
?>
    <section>
      <h2>Add Member</h2>
      <?php if ($flash): ?>
      <p class="flash flash-<?php echo e($flash['type']); ?>"><?php echo e($flash['pesan']); ?></p>
      <?php endif; ?>
      <form id="form-tambah" method="post" action="proses_tambah.php" novalidate>
        <div class="field"><label for="nama">Name</label><input type="text" id="nama" name="nama"></div>
        <div class="field"><label for="no_anggota">Member No.</label><input type="text" id="no_anggota" name="no_anggota"></div>
        <div class="field"><label for="alamat">Address</label><input type="text" id="alamat" name="alamat"></div>
        <div class="field"><label for="no_hp">Phone No.</label><input type="text" id="no_hp" name="no_hp"></div>
        <button type="submit">Save</button>
      </form>
    </section>
<?php include __DIR__ . '/../includes/footer.php'; ?>