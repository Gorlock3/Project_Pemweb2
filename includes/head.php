<?php
/**
 * includes/head.php
 * Dipanggil di setiap halaman admin.
 * Variabel yang harus diset sebelum include:
 *   $page_title  (string) — judul halaman
 *   $body_class  (string) — class body, default 'page-admin'
 */
$body_class = isset($body_class) ? $body_class : 'page-admin';
$page_title = isset($page_title) ? $page_title : 'Grand Indonesia';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grand Indonesia — <?= htmlspecialchars($page_title) ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body class="<?= htmlspecialchars($body_class) ?>">
