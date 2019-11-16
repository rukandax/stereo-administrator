$(document).ready(function() {
  $('#dataTable').DataTable();

  $("#import-field").change(function() {
    $("#import-form").submit();
  });
});
