
//validasi pendaftaran
function cekRegister(){
  var nama = document.getElementById("namalengkap").value;
  var username = document.getElementById("username").value;
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;
  var repassword = document.getElementById("repassword").value;
  var notelp = document.getElementById("notelp").value;

  if (nama == "" && username == "" && email == "" && password == "" && repassword == "" && notelp == "") {
    alert("Data Tidak Boleh Kosong !");
    return false;
  }
  if (repassword != password) {
    alert("Password Tidak Sama !");
    return false
  }
}


//validasi Login
function cekLogin(){
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;

  if (email == "" && password == "") {
    alert("Masukkan Email dan Password !");
    return false;
  }
  if (email == "") {
    alert("Masukkan Email !");
    return false;
  }
  if (password == "") {
    alert("Masukkan Password !");
    return false;
  }
}


// Total Harga - detail
function totalHarga(){
  var jml = parseInt(document.getElementById("jml").value);
  var harga = parseInt(document.getElementById("harga").innerHTML);
  var total = jml * harga;

  document.getElementById("totHarga").innerHTML = total;
  document.getElementById("totHargaHidden").value = total;
}

// pembayaran
function bayar(){
  var isibank = document.getElementById("pilihBank").value;
  var alamat = document.getElementById("alamat").value;
  var kodepos = document.getElementById("kodepos").value;

  if (isibank == "pilihbank") {
    alert("Silahakan Pilih Bank !");
    return false;
  }
  if (alamat == "") {
    alert("Alamat harus diisi !");
    return false;
  }
  if (kodepos == "") {
    alert("Kode pos harus diisi !");
    return false;
  }

}

// Piih bank
function pBank(){
  var isibank = document.getElementById("pilihBank").value;

  if (isibank == "pilihbank") {
    document.getElementById("norek").innerHTML = "Silahkan Pilih Bank";
  }
  if (isibank == "BRI") {
    console.log(isibank);
    document.getElementById("norek").innerHTML = "No. Rek - 1234567890";
  }
  if (isibank == "BNI") {
    document.getElementById("norek").innerHTML = "No. Rek - 4567890123";
  }
  if (isibank == "Mandiri") {
    document.getElementById("norek").innerHTML = "No. Rek - 6789012345";
  }
}
