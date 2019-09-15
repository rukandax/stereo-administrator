$(document).ready(function() {
  $('.custom-select').each(function() {
    $(this).val($(this).data('value'));
  });
});
