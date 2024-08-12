<?php
    $mhs = $data['mhs'];
?>
<div class="container m-5">
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="<?= BASEURL; ?>/img/<?= $mhs['profile']; ?>" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title"><?= $mhs['nama']; ?>
            </h5>
            <p class="card-text"><?= $mhs['nim']; ?></p>
            <p class="card-text"><?= $mhs['jurusan']; ?></p>
            <a href="<?= BASEURL; ?>/mahasiswa" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>