<?php 

$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$nama = isset($_POST['namaKlien']) ? trim($_POST['namaKlien']) : '';
$tgl = isset($_POST['tanggal']) ? trim($_POST['tanggal']) : '';
$tempat = isset($_POST['tempat']) ? trim($_POST['tempat']) : '';

$stmt = $conn->prepare("update skrining set nama_klien = ? , tanggal = ? , tempat = ? where id_skrining = ?");
$stmt->bind_param('sssi', $nama, $tgl, $tempat, $id);
if($stmt->execute()) {
    $_SESSION['alert'] = [
        'type' => 'success',
        'message' => 'Data berhasil diubah'
    ];
} else {
    $_SESSION['alert'] = [
        'type' => 'error',
        'message' => 'Data gagal diubah : ' .$stmt->error
    ];
}
header('Location: ?page=data-assist');
exit();
?>