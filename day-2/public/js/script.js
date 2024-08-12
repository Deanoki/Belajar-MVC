$(function () {
  $(".btnTambahData").on("click", function () {
    $("#formModalLabel").html("Tambah Data Mahasiswa");
    $(".modal-footer button[type=submit]").html("Save Data");
  });

  $(".tampilModalUbah").on("click", function () {
    $("#formModalLabel").html("Update Data Mahasiswa");

    $(".modal-footer button[type=submit]").html("Update Data");
    $(".modal-body form").attr(
      "action",
      "http://localhost/phpdays/belajar-php-mvc/day-2/public/mahasiswa/ubah/"
    );

    const id = $(this).data("id");
    $.ajax({
      url: "http://localhost/phpdays/belajar-php-mvc/day-2/public/mahasiswa/getubah/",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#profile").val(data.profile);
        $("#nama").val(data.nama);
        $("#nim").val(data.nim);
        $("#email").val(data.email);
        $("#jurusan").val(data.jurusan);
        $("#id").val(data.id);
      },
    });

    $(".tombolTambahData").on("click", function () {
      $("#formModalLabel").html("Tambah Data Mahasiswa");
      $(".modal-footer button[type=submit]").html("Tambah Data");
      $("#nama").val("");
      $("#nrp").val("");
      $("#email").val("");
      $("#jurusan").val("");
      $("#id").val("");
    });
  });
});
