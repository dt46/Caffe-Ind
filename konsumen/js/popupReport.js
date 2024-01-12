// Popup Topik Start
function showReportPopupTopik() {
    document.getElementById('reportPopupTopik').style.display = 'block';
}

function closeReportPopupTopik() {
    document.getElementById('reportPopupTopik').style.display = 'none';
}

// Popup Balasan Start
function showReportPopupBalasan(id_balasan) {
    document.getElementById('id_balasan').value = id_balasan;
    document.getElementById('reportPopupBalasan').style.display = 'block';
}

function closeReportPopupBalasan() {
    document.getElementById('reportPopupBalasan').style.display = 'none';
}

// Close the popup if the user clicks outside of it
window.onclick = function (event) {
    var reportPopupTopik = document.getElementById('reportPopupTopik');
    var reportPopupBalasan = document.getElementById('reportPopupBalasan');

    if (event.target === reportPopupTopik) {
        closeReportPopupTopik();
    } else if (event.target === reportPopupBalasan) {
        closeReportPopupBalasan();
    }
};
// Popup Balasan End
