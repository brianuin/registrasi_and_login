document.addEventListener('DOMContentLoaded', (event) => {
    let formBio = document.getElementById('form_biodata');
    

    formBio.addEventListener('submit', (e)=>{
        let no_peserta      = document.getElementById('no_peserta').value;
        let nama_lengkap    = document.getElementById('nama_lengkap').value;
        let ttl             = document.getElementById('tempat_tanggal_lahir').value;
        let jurusan         = document.getElementById('jurusan').value;
        let alamat          = document.getElementById('alamat').value;
        ajax_crud(no_peserta, nama_lengkap, ttl, jurusan, alamat);
        e.preventDefault();
    });

    function ajax_crud(no_peserta, nama_lengkap, ttl, jurusan, alamat){
        var xmlhttp = new XMLHttpRequest();
        var vars = "firstname=test";
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            
            // document.getElementById("txtHint").innerHTML = this.responseText;
        }
        };
        xmlhttp.open("POST", "php/core.php", true);
        xmlhttp.send('fname=Henry&lname=Ford');
    }
});