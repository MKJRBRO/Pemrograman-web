<?php
$page_title = "Member List";
include __DIR__ . '/../includes/header.php';
$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
$daftar = $_SESSION['anggota'] ?? [];
?>
    <section>
      <h2>Member List</h2>
      <?php if ($flash): ?>
      <p class="flash flash-<?php echo e($flash['type']); ?>"><?php echo e($flash['pesan']); ?></p>
      <?php endif; ?>
      <div class="search-box">
        <label for="search-input">Search Member Name</label>
        <input type="text" id="search-input" data-col="1" placeholder="Type a member name...">
      </div>
      <div class="table-responsive">
        <table>
          <thead>
            <tr><th>Member No.</th><th>Name</th><th>Address</th><th>Phone No.</th><th>Actions</th></tr>
          </thead>
          <tbody>
            <?php if (empty($daftar)): ?>
            <tr><td colspan="5">No member data yet. Please add one via the "Add Member" menu.</td></tr>
            <?php else: ?>
            <?php foreach ($daftar as $item): ?>
            <tr>
              <td><?php echo e($item['no_anggota']); ?></td>
              <td><?php echo e($item['nama']); ?></td>
              <td><?php echo e($item['alamat']); ?></td>
              <td><?php echo e($item['no_hp']); ?></td>
              <td>
                <button type="button">Edit</button>
                <button type="button" class="btn-hapus">Delete</button>
              </td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </section>
<?php include __DIR__ . '/../includes/footer.php'; ?>