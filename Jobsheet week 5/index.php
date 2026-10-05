<?php
$page_title = "Home";
include __DIR__ . '/includes/header.php';
$totalBuku = count($_SESSION['buku'] ?? []);
$totalAnggota = count($_SESSION['anggota'] ?? []);
?>
    <section>
      <h2>Welcome to the Mini Library System</h2>
      <p>A mini library information system: manage books and members.</p>
      <p>Books recorded this session: <?php echo $totalBuku; ?> | Members: <?php echo $totalAnggota; ?></p>
    </section>
<?php include __DIR__ . '/includes/footer.php'; ?>