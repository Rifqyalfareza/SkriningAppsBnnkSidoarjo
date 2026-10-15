<?php

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];

    $stmt = $conn->prepare("DELETE FROM skrining WHERE id_skrining = ?");
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        $_SESSION['alert'] = [
            'type' => 'success',
            'message' => 'Data berhasil dihapus'
        ];
    } else {
        $_SESSION['alert'] = [
            'type' => 'error',
            'message' => 'Data gagal dihapus: ' . $stmt->error
        ];
    }

    $stmt->close();
} else {
    $_SESSION['alert'] = [
        'type' => 'error',
        'message' => 'ID skrining tidak valid'
    ];
}

header('Location: ?page=data-assist');
exit();
?>