$(document).ready(function() {
  $.get(`${saGlobal.base_url}division/json/${$('#user-division').data('value')}/departement`, function(data) {
    const departements = JSON.parse(data);
    let options = '';

    departements.forEach(function(departement) {
      options += `<option value="${departement.departement_id}">${departement.departement_name}</option>\n`;
    });

    $('#user-departement').html(`
      <option selected disabled>Choose Departement Name</option>\n
      ${options}
    `)

    $('#user-departement').val($('#user-departement').data('value'));
  });

  $('.custom-select').each(function() {
    $(this).val($(this).data('value'));
  });
});
