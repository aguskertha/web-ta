window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    const hasiltable = document.getElementById('hasiltable');
    if (hasiltable) {
        new simpleDatatables.DataTable(hasiltable);
    }
});
