<?php
$page_title = "Book List";
include __DIR__ . '/../includes/header.php';
$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
$daftar = $_SESSION['buku'] ?? [];
?>
    <section>
      <h2>Book List</h2>
      <?php if ($flash): ?>
      <p class="flash flash-<?php echo e($flash['type']); ?>"><?php echo e($flash['pesan']); ?></p>
      <?php endif; ?>
      <div class="search-box">
        <label for="search-input">Search Book Title</label>
        <input type="text" id="search-input" data-col="0" placeholder="Type a book title...">
      </div>
      <div class="table-responsive">
        <table>
          <thead>
            <tr><th>Title</th><th>Author</th><th>Year</th><th>Stock</th><th>Actions</th></tr>
          </thead>
          <tbody>
            <?php if (empty($daftar)): ?>
            <tr><td colspan="5">No book data yet. Please add one via the "Add Book" menu.</td></tr>
            <?php else: ?>
            <?php foreach ($daftar as $item): ?>
            <tr>
              <td><?php echo e($item['judul']); ?></td>
              <td><?php echo e($item['pengarang']); ?></td>
              <td><?php echo e($item['tahun']); ?></td>
              <td><?php echo e($item['stok']); ?></td>
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