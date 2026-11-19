
var targetNode;

function init() {
    targetNode = document.getElementById("hasil").firstChild;
    hitungKurs("idr");
}

function hitungKurs(id) {
    var inputEl = document.getElementById(id);
    var rupiah = parseFloat(inputEl.value);
    var hasilUsd = rupiah / 18246;

    targetNode.data = hasilUsd.toFixed(2);

    var riwayat = document.getElementById("riwayat");

    var item = document.createElement("li");

    var catatan = document.createTextNode(
        "Rp" + rupiah + " = US$" + hasilUsd.toFixed(2)
    );

    item.appendChild(catatan);
    riwayat.appendChild(item);
}
