var btnRecord = document.getElementById("toggle-record");
var wrapRecord = document.getElementById("record-wrapper");

btnRecord.addEventListener("click", function () {
    wrapRecord.classList.toggle("active");
});