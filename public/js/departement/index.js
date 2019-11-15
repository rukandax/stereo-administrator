$(document).ready(function() {
  var divisions = $('#js-external-data').data('division');

  var dataTable = $('#dataTable').DataTable({
    initComplete: function() {
      $("#dataTable_length").append(`
        <label class="ml-5">
          Filter Division
          <select id="departement-filter" class="custom-select custom-select-sm form-control form-control-sm">
            <option value="" selected></option>
          </select>
        </label>
      `);

      divisions.forEach(division => {
        document.getElementById('departement-filter').insertAdjacentHTML('beforeend', `<option>${ division.name }</option>`);
      });
    }
  });

  $('#departement-filter').change(function() {
    $.fn.dataTable.ext.search = [];
    $.fn.dataTable.ext.search.push(
      function(_, data) {
        var selectedDivision = $('#departement-filter').val();
        var division = data[2] || '';

        if (!selectedDivision || selectedDivision === '' || selectedDivision === division) {
          return true;
        }

        return false;
      }
    );

    dataTable.draw();
  });

  $("#import-field").change(() => {
    $("#import-form").submit();
  });
});
