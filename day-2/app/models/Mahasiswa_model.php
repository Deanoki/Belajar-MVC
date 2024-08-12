<?php

class Mahasiswa_model{
    // database handler
    private $table = 'daftar_mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMahasiswa()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getMahasiswaById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        
        $this->db->bind('id', $id);

        return $this->db->single();
    }

    public function tambahDataMahasiswa($data)
    {
        $query = "INSERT INTO daftar_mahasiswa
                    Values
                  ('', :nama, :nim, :email, :jurusan, :profile)
                 ";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('profile', $data['profile']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataMahasiswa($id)
    {
        $query = "DELETE FROM daftar_mahasiswa WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataMahasiswa($data)
    {
        $query = "UPDATE daftar_mahasiswa SET
                    nama = :nama,
                    nim = :nim,
                    email = :email,
                    jurusan = :jurusan,
                    profile = :profile
                  WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('profile', $data['profile']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariDataMahasiswa()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM daftar_mahasiswa WHERE nama LIKE :keyword";

        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        
        return $this->db->resultSet();
    }
}


// private $mhs = [
    //     [
    //         "nama" => "Dean Muhammad Rifqy",
    //         "nim" => "2018240096",
    //         "email" => "deanoki2808@gmail.com",
    //         "jurusan" => "Sistem Informasi"
    //     ],
    //     [
    //         "nama" => "Dony Setiawan",
    //         "nim" => "2018240097",
    //         "email" => "Dony@gmail.com",
    //         "jurusan" => "Teknik Informasi"
    //     ],
    //     [
    //         "nama" => "Doddy Fabio",
    //         "nim" => "2018240098",
    //         "email" => "Doddy@gmail.com",
    //         "jurusan" => "Teknik Listrik"
    //     ],
    //     [
    //         "nama" => "Fabregas",
    //         "nim" => "2018240099",
    //         "email" => "Fabregas@gmail.com",
    //         "jurusan" => "Teknik Industri"
    //     ],
    // ];