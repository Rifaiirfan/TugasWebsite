$(document).ready(function () {
  //jika java script tidak jalan silahakan clear cache browser
  //id summary dan chart disembunyikan
  uri = window.location.href;
  e = uri.split("=");
  console.log("URI: " + uri + "e[1]:" + e[1] + "e[2] :" + e[2]);

  if (e[1] == "user" || e[1] == "user_edit&user") {
    $("#summary").hide();
    $("#chart,#user_add").hide();
    $("#tarif_add,#tarif_list,#meter_add,#meter_list,#pilih_waktu").hide();
    if (e[1] == "user") {
      $("#summary").hide();
      $("#chart,#user_add").hide();
      $("#tarif_add,#tarif_list,#tagihan_sendiri_list").hide();
    } else {
      $("#summary").hide();
      $("#chart,#user_list,#tagihan_sendiri_list").hide();
      $("#user_add").show();
      //reset value tombol user add jadi user edit
      $("#user_form button").val("user_edit");
      //mendisable primary key username
      $("#user_form input[name=user]").attr("disabled", true);
      // menambahakan elemen input dengan tipe hidden
      $("#user_form").append(
        "<input type=hidden name=user value=" + e[2] + ">",
      );
    }
    //menyisipkan tombol adduser
    $(".datatable-dropdown").append(
      "<button type=button class='btn btn-outline-secondary float-start me-2'><i class='fa-solid fa-user-plus fa-beat fa-sm style=color: rgb(245, 220, 9)'></i>  User</button>",
    );
    //membuat tombol bisa dipencet
    $(".datatable-dropdown button").click(function () {
      // console.log("halo");
      $("#user_list").hide();
      $("#user_add").show();
      $("#user_form input,#user_form textarea").val("");
    });
    // membuat konfirmasi hapus
    $("button[data-bs-toggle='modal']").click(function () {
      console.log("tombol hapus diklik keluar modal");
      user = $(this).attr("data-user");
      $("#myModal .modal-body").text(
        "Yakin hapus data username: " + user + "?",
      );
      $(".modal-footer form").append(
        "<input type=hidden name=user value=" + user + ">",
      );
    });
  } else if (e[1] == "tarif" || e[1] == "tarif_edit&kd_tarif") {
    $(
      "#summary,#chart,#user_add,#user_list,#meter_add,#meter_list,#tagihan_sendiri_list,#pilih_waktu",
    ).hide();
    if (e[1] == "tarif") {
      $("#tarif_add").hide();
      $("#tarif_list").show();
    } else {
      $("#summary").hide();
      $("#chart,#tarif_list").hide();
      $("#tarif_add").show();
      //mendisable primary key username
      $("#tarif_form input[name=kd_tarif]").attr("disabled", true);
      //reset value tombol user add jadi user edit
      $("#tarif_form button").val("tarif_edit");
      // menambahakan elemen input dengan tipe hidden
      $("#tarif_form").append(
        "<input type=hidden name=kd_tarif value=" + e[2] + "> ",
      );
    }
    const datatablesSimple = document.getElementById("tarif_table");
    if (datatablesSimple) {
      new simpleDatatables.DataTable(datatablesSimple);
    }
    //menyisipkan tombol adduser
    $(".datatable-dropdown").append(
      "<button type=button class='btn btn-outline-success float-start me-2'><i class='fa-solid fa-file-invoice-dollar fa-beat-fade' style='color: rgb(19, 141, 104);'></i>  Tarif</button>",
    );
    //membuat tombol bisa dipencet
    $(".datatable-dropdown button").click(function () {
      // console.log("halo");
      $("#tarif_list").hide();
      $("#tarif_add").show();
      $("tarif_form button").val("tarif_add");
      // $("#tarif_form input").val("");
      $("#tarif_form input [name='kd_tarif']").attr("disabled", true);
    });
    // membuat konfirmasi hapus
    $("button[data-bs-toggle='modal']").click(function () {
      console.log("tombol hapus diklik keluar ");
      kd_tarif = $(this).attr("data-kd_tarif");
      $("#trModal .modal-body").text(
        "Yakin hapus data ID Tarif: " + kd_tarif + "?",
      );
      $(".modal-footer form").append(
        "<input type=hidden name=kd_hapus value=" + kd_tarif + ">",
      );
    });
  } else if (e[1] == "catat_meter" || e[1] == "meter_edit&no") {
    $(
      "#summary,#chart,#user_add,#user_list,#tarif_add,#tarif_list,#tagihan_sendiri_list,#pilih_waktu",
    ).hide();
    if (e[1] == "catat_meter") {
      $("#meter_add").hide();
      $("#meter_list").show();
    } else {
      console.log("13131313");
      $("#summary,#chart,#meter_list").hide();
      $("#meter_add").show();
      //mendisable primary key username
      $("#meter_form input[name=no]").attr("disabled", true);
      //reset value tombol user add jadi user edit
      $("#meter_form button").val("meter_edit");
      // menambahakan elemen input dengan tipe hidden
      $("#meter_form").append("<input type=hidden name=no value=" + e[2] + ">");
    }

    var alertMeter = $("#alert-meter");
    if (alertMeter.hasClass("alert-danger")) {
      $("#meter_add").show();
      $("#meter_list").hide();
    } else if (alertMeter.hasClass("alert-success")) {
      $("#meter_add").hide();
      $("#meter_list").show();
    } else {
      // $("#meter_add").hide();
      // $("#meter_list").show();
    }

    const datatablesSimple = document.getElementById("meter_table");
    if (datatablesSimple) {
      new simpleDatatables.DataTable(datatablesSimple);
    }

    //menyisipkan tombol adduser
    if (userLevel !== "bendahara") {
      $(".datatable-dropdown").append(
        "<button type=button class='btn btn-outline-info float-start me-2'><i class='fa-solid fa-faucet-drip fa-beat fa-sm' style='color: rgb(58, 134, 196);'></i>  Meter</button>",
      );
    }
    //membuat tombol bisa dipencet
    $(".datatable-dropdown button").click(function () {
      console.log("halo");
      $("#meter_list").hide();
      $("#meter_add").show();
      $("meter_form input").val("");
      // $("#tarif_form input").val("");
      $("#tarif_form input [name='no']").attr("disabled", true);
    });

    // membuat konfirmasi hapus
    $("button[data-bs-toggle='modal']").click(function () {
      console.log("tombol hapus diklik keluar ");
      no = $(this).attr("data-no");
      $("#trModal .modal-body").text("Yakin hapus data meter: " + no + "?");
      $(".modal-footer form").append(
        "<input type=hidden name=no value=" + no + ">",
      );
      $(".modal-footer button").val("meter_hapus");
    });
  } else if (e[1] == "tarif" || e[1] == "tarif_edit&kd_tarif") {
    $(
      "#summary,#chart,#user_add,#user_list,#meter_add,#meter_list,#pilih_waktu",
    ).hide();
    if (e[1] == "tarif") {
      $("#tarif_add").hide();
      $("#tarif_list").show();
    } else {
      $("#summary").hide();
      $("#chart,#tarif_list").hide();
      $("#tarif_add").show();
      //mendisable primary key username
      $("#tarif_form input[name=kd_tarif]").attr("disabled", true);
      //reset value tombol user add jadi user edit
      $("#tarif_form button").val("tarif_edit");
      // menambahakan elemen input dengan tipe hidden
      $("#tarif_form").append(
        "<input type=hidden name=kd_tarif value=" + e[2] + "> ",
      );
    }
    const datatablesSimple = document.getElementById("tarif_table");
    if (datatablesSimple) {
      new simpleDatatables.DataTable(datatablesSimple);
    }
    //menyisipkan tombol adduser
    $(".datatable-dropdown").append(
      "<button type=button class='btn btn-outline-success float-start me-2'><i class='fa-solid fa-file-invoice-dollar fa-beat-fade' style='color: rgb(19, 141, 104);'></i>  Tarif</button>",
    );
    //membuat tombol bisa dipencet
    $(".datatable-dropdown button").click(function () {
      // console.log("halo");
      $("#tarif_list").hide();
      $("#tarif_add").show();
      $("tarif_form button").val("tarif_add");
      // $("#tarif_form input").val("");
      $("#tarif_form input [name='kd_tarif']").attr("disabled", true);
    });
    // membuat konfirmasi hapus
    $("button[data-bs-toggle='modal']").click(function () {
      console.log("tombol hapus diklik keluar ");
      kd_tarif = $(this).attr("data-kd_tarif");
      $("#trModal .modal-body").text(
        "Yakin hapus data ID Tarif: " + kd_tarif + "?",
      );
      $(".modal-footer form").append(
        "<input type=hidden name=kd_hapus value=" + kd_tarif + ">",
      );
    });
  } else if (e[1] == "tagihan_sendiri" || e[1] == "tagihan_sendiri&no") {
    $(
      "#summary, #chart, #user_add, #user_list, #tarif_add, #tarif_list, #meter_add, #meter_list,#pilih_waktu",
    ).hide();
    $("#tagihan_warga_list").show();
    const datatablesSimple = document.getElementById("tagihan_sendiri_table");
    if (datatablesSimple) {
      new simpleDatatables.DataTable(datatablesSimple);
    }
  } else {
    $("#summary,#chart").show();
    $("#pilih_waktu select[name= 'pilih_waktu']").on("change", function () {
      bln = $(this).val();
      // console.log("dipilih loh ya" + bln);
      $.ajax({
        type: "post",
        url: "../assets/ajax.php",
        data: { p: "summary", t: bln, user: userLogin, level: userLevel },
        dataType: "json",
      })
        .done(function (d) {
          console.log("data :" + d[0].jml_pelanggan);
          blm_dicatat = d[0].jml_pelanggan - d[2].tercatat;
          blm_lunas = d[0].jml_pelangggan - d[4].lunas;
          if (userLevel == "admin") {
            $("#summary .bg-primary h1").text(d[0].jml_pelanggan);
            $("#summary .bg-warning h1").text(
              Number(d[1].pemakaian).toLocaleString("id-ID"),
            );
            $("#summary .bg-success h1").text(d[2].tercatat);
            $("#summary .bg-danger h1").text(blm_dicatat);
          } else if (userLevel == "bendahara") {
            $("#summary .bg-primary h1").text(d[0].jml_pelanggan);
            $("#summary .bg-warning h1").text(
              Number(d[1].pemasukan).toLocaleString("id-ID"),
            );
            $("#summary .bg-success h1").text(d[2].lunas);
            $("#summary .bg-danger h1").text(blm_lunas);
          } else if (userLevel == "petugas") {
            $("#summary .bg-primary h1").text(d[0].jml_pelanggan);
            $("#summary .bg-warning h1").text(
              Number(d[1].pemakaian).toLocaleString("id-ID"),
            );
            $("#summary .bg-success h1").text(d[2].tercatat);
            $("#summary .bg-danger h1").text(blm_dicatat);
          } else {
          }
        })
        .fail(function () {
          console.log("ada error");
        });
    });
    $(
      "#user_add,#user_list,#tarif_add,#tarif_list,#meter_add,#meter_list,#tagihan_sendiri_list",
    ).hide();
  }
});
