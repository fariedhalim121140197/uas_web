document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('inForm');
    const dataTable = document.getElementById('dataTable');
    const del = document.getElementById('delbtn');

    form.addEventListener('submit', function (event) {
        event.preventDefault();
        handleFormSubmit();
    });

    del.addEventListener('click', function (event) {
        delInput(event.target);
    });

    function handleFormSubmit() {
        const nama = document.getElementById('nama').value;
        const tmpLahir = document.getElementById('tmpLahir').value;
        const tglLahir = document.getElementById('tglLahir').value;
        const jk = document.querySelector('input[name="jk"]:checked');
        const goldar = document.getElementById('goldar').value;
        const alamat = document.getElementById('alamat').value;
        const agama = document.getElementById('agama').value;

        if (nama && tmpLahir && tglLahir && jk && goldar && alamat && agama) {
            // Kirim data ke server (dalam contoh ini, hanya menambahkannya ke tabel)
            addToDataTable(nama, tmpLahir, tglLahir, jk.value, goldar, alamat, agama);
            form.reset();
        } else {
            alert('Masih Ada Atribut Form Yang Kosong!');
        }
    }

    function delInput(){
        var table = document.getElementById("dataTable");
        var rowCount = table.rows.length;
        for (var i = 1; i < rowCount; i++) {
            var row = table.rows[i];
            var cellCount = row.cells.length;

            for (var j = 0; j < cellCount; j++) {
              var cell = row.cells[j];
              cell.innerHTML = "";
            }
            table.deleteRow(i);
          }
    }

    function addToDataTable(nama, tmpLahir, tglLahir, jk, goldar, alamat, agama) {
        const newRow = dataTable.insertRow(-1);
        const cell1 = newRow.insertCell(0);
        const cell2 = newRow.insertCell(1);
        const cell3 = newRow.insertCell(2);
        const cell4 = newRow.insertCell(3);
        const cell5 = newRow.insertCell(4);
        const cell6 = newRow.insertCell(5);
        const cell7 = newRow.insertCell(6);

        cell1.textContent = nama;
        cell2.textContent = tmpLahir;
        cell3.textContent = tglLahir;
        cell4.textContent = jk;
        cell5.textContent = goldar;
        cell6.textContent = alamat;
        cell7.textContent = agama;
    }
});