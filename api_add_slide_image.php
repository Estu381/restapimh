<?php
header('Content-Type: application/json');
require_once 'koneksi.php';

// Aksi tambah gambar slideshow
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] === 'add_slide_image') {
    $newSlideImage = $_POST['new_slide_image'];

    $query = "INSERT INTO slideshow_images (tmbh_gmbr) VALUES ('$newSlideImage')";

    if ($koneksi->query($query)) {
        echo json_encode(['success' => true, 'message' => 'Slideshow image added successfully']);
    } else {
        $errorMessage = 'Failed to add slideshow image: ' . $koneksi->error;
        echo json_encode(['success' => false, 'message' => $errorMessage]);

        // Tambahkan ini untuk melihat pesan error di log server
        error_log($errorMessage);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
?>
