<?php

class About extends Controller{
    // menggambil parameter dari url dan jika param kosong buat value default
    public function index($nama = 'Dean', $job = 'freelance'){

        $data['judul'] = 'About';
        $data['nama'] = $nama;
        $data['job'] = $job;
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }
    public function page(){
        $data['judul'] = 'Page';
        $this->view('templates/header', $data);
        $this->view('about/page');
        $this->view('templates/footer');
    }
}