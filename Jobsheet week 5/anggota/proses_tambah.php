<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: tambah.php');
    exit;
}

$nama       = trim($_POST['nama'] ?? '');
$no_anggota = trim($_POST['no_anggota'] ?? '');
$alamat     = trim($_POST['alamat'] ?? '');
$no_hp      = trim($_POST['no_hp'] ?? '');

$errors = [];
if ($nama === '') {
    $errors[] = "Name is required.";
} elseif (!preg_match("/^[\p{L} .'-]+$/u", $nama)) {
    $errors[] = "Name may only contain letters, spaces, and . ' -";
}

if ($no_anggota === '') {
    $errors[] = "Member No. is required.";
} elseif (!preg_match('/^[A-Za-z][0-9]{3}$/', $no_anggota)) {
    $errors[] = "Member No. must be one letter followed by 3 digits (example: A001).";
} else {
    foreach ($_SESSION['anggota'] ?? [] as $a) {
        if (strcasecmp($a['no_anggota'], $no_anggota) === 0) {
            $errors[] = "Member No. is already used.";
            break;
        }
    }
}

if ($alamat === '') {
    $errors[] = "Address is required.";
}

if ($no_hp === '') {
    $errors[] = "Phone No. is required.";
} elseif (!preg_match('/^[0-9]{8,15}$/', $no_hp)) {
    $errors[] = "Phone No. must be 8 to 15 digits.";
}

if (!empty($errors)) {
    $_SESSION['flash'] = ['type' => 'error', 'pesan' => implode(' ', $errors)];
    header('Location: tambah.php');
    exit;
}

if (!isset($_SESSION['anggota'])) {
    $_SESSION['anggota'] = [];
}
$_SESSION['anggota'][] = [
    'no_anggota' => strtoupper($no_anggota),
    'nama'       => $nama,
    'alamat'     => $alamat,
    'no_hp'      => $no_hp,
];
$_SESSION['flash'] = ['type' => 'success', 'pesan' => 'Member added successfully.'];
header('Location: list.php');
exit;