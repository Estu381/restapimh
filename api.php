<?php
header('Content-Type: application/json');
require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case 'add_slide_image':
            addSlideImage();
            break;

        // Tambahkan kasus lain jika diperlukan

        default:
            echo json_encode(['message' => 'Invalid action.']);
            break;
    }
} else {
    echo json_encode(['message' => 'Invalid request.']);
}

function addSlideImage() {
    global $conn;

    if (isset($_POST['new_slide_image'])) {
        $newSlideImage = $_POST['new_slide_image'];

        $query = "INSERT INTO slideshow_images (tmbh_gmbr, created_at) VALUES ('$newSlideImage', NOW())";

        if ($conn->query($query)) {
            echo json_encode(['success' => true, 'message' => 'Slideshow image added.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to add slideshow image.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Missing required parameters.']);
    }
}
?>
