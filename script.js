document.addEventListener('DOMContentLoaded', function () {
    //deklarasi dari file html/php
    const form = document.getElementById('inForm');
    const table = document.getElementById('table');
    const del = document.getElementById('delbtn');

    //fungsi event tombol submit
    form.addEventListener('submit', function (event) {
        event.preventDefault();
        validasi();
    });

    //fungsi event tombol hapus
    del.addEventListener('click', function (event) {
        delInput(event.target);
    });

    //fungsi validasi input user
    function validasi() {
        const nama = document.getElementById('nama').value;
        const tmpLahir = document.getElementById('tmpLahir').value;
        const tglLahir = document.getElementById('tglLahir').value;
        const jk = document.querySelector('input[name="jk"]:checked');
        const goldar = document.getElementById('goldar').value;
        const alamat = document.getElementById('alamat').value;
        const agama = document.getElementById('agama').value;

        if (nama && tmpLahir && tglLahir && jk && goldar && alamat && agama) {
            // Kirim input user ke server
            tambahIsi(nama, tmpLahir, tglLahir, jk.value, goldar, alamat, agama);
            form.reset();
        } else {
            alert('Masih Ada Atribut Form Yang Kosong!');
        }
    }

    //fungsi tambah isi tabel
    function tambahIsi(nama, tmpLahir, tglLahir, jk, goldar, alamat, agama) {
        document.cookie="input_nama="+nama;
        document.cookie="input_tmpLahir="+tmpLahir;
        document.cookie="input_tglLahir="+tglLahir;
        document.cookie="input_jk="+jk;
        document.cookie="input_goldar="+goldar;
        document.cookie="input_alamat="+alamat;
        document.cookie="input_agama="+agama;

        const barisBaru = table.insertRow(-1);
        const sel1 = barisBaru.insertCell(0);
        const sel2 = barisBaru.insertCell(1);
        const sel3 = barisBaru.insertCell(2);
        const sel4 = barisBaru.insertCell(3);
        const sel5 = barisBaru.insertCell(4);
        const sel6 = barisBaru.insertCell(5);
        const sel7 = barisBaru.insertCell(6);

        sel1.textContent = nama;
        sel2.textContent = tmpLahir;
        sel3.textContent = tglLahir;
        sel4.textContent = jk;
        sel5.textContent = goldar;
        sel6.textContent = alamat;
        sel7.textContent = agama;


    }

    //fungsi hapus isi tabel
    function delInput() {
        var table = document.getElementById("table");
        var jumlahBaris = table.rows.length;
        for (var i = jumlahBaris - 1; i > 0; i--) {
            table.deleteRow(i);
        }
    }
});