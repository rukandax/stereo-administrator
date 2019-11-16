$(document).ready(() => {
  $('#user-division').change(() => {
    $.get(`${saGlobal.base_url}departement/json/${$('#user-division').val()}`, (data) => {
      const departements = JSON.parse(data);
      let options = '';

      departements.forEach(departement => {
        options += `<option value="${departement.departement_id}">${departement.departement_name}</option>\n`;
      });

      $('#user-departement').html(`
        <option selected disabled>Choose Division Name</option>\n
        ${options}
      `)
    });
  });
});
