$(document).ready(function() {
  $('#dataTable').DataTable();

  $("#import-field").change(() => {
    $("#import-form").submit();
  });
});
