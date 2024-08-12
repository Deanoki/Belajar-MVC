<div class="container m-3">
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::Flash(); ?>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary btnTambahData" data-toggle="modal" data-target="#formmodal">
                Tambah Data
            </button>
        </div>
    </div>

    <div class="row ">
        <div class="col-lg-6">
            <form action="<?= BASEURL; ?>/mahasiswa/cari" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search.." name="keyword" id="keyword"
                        autocomplete="off">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" id="btnCari">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <h3 class="mt-2">Daftar Mahasiswa</h3>
            <ul class=" list-group">
                <?php foreach($data['mhs'] as $mhs) : ?>
                <li class=" list-group-item ">
                    <?= $mhs['nama']; ?>
                    <a href='<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['id']; ?>'
                        class='badge badge-danger float-right ml-2 '
                        onClick=" return confirm('Yakin ingin menghapus data?')">
                        Delete
                    </a>
                    <a href='<?= BASEURL; ?>/mahasiswa/edit/<?= $mhs['id']; ?>'
                        class='badge badge-success float-right ml-2 tampilModalUbah' data-toggle="modal"
                        data-target="#formmodal" data-id="<?= $mhs['id']; ?>">
                        Edit
                    </a>
                    <a href='<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']; ?>'
                        class='badge badge-primary float-right ml-2'>
                        Details
                    </a>
                </li>
                <?php endforeach;?>
            </ul>
            <!-- <ul>
                <li><?= $mhs['nama']; ?></li>
                <li><?= $mhs['nim']; ?></li>
                <li><?= $mhs['email']; ?></li>
                <li><?= $mhs['jurusan']; ?></li>
            </ul> -->

        </div>
    </div>
</div>

<!-- Modal -->
<div class=" modal fade" id="formmodal" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= BASEURL?>/mahasiswa/tambah" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class=" form-group">
                        <label for="profile">Profile</label>
                        <input type="text" class="form-control" id="profile" id="profile" name="profile"
                            placeholder="Foto">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" id="nama" name="nama" placeholder="Nama Anda">
                    </div>

                    <div class="form-group">
                        <label for="nim">Nim</label>
                        <input type="number" class="form-control" id="nim" id="nim" name="nim" placeholder="Nim Anda">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" id="email" name="email"
                            placeholder="name@example.com">
                    </div>

                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control" id="jurusan" name="jurusan">
                            <option value="Sistem Informasi">Sistem Informasi</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Teknik Elektro">Teknik Elektro</option>
                            <option value="Teknik Industri">Teknik Industri</option>
                        </select>
                    </div>
            </div>
            <div class=" modal-footer">
                <button type="submit" class="btn btn-primary"></button>
            </div>
            </form>
        </div>
    </div>
</div>