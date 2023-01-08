$(function () {
  bsCustomFileInput.init();
});

$("#table").DataTable(),
$("#table_search").DataTable({
responsive: false,
lengthChange: false,
autoWidth: false,
});
