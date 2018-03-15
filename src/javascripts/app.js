$(function () {
  var sent = $('#sent');
  var form = $('form').submit(function () {
    $.post('/sendmail.php', $(this).serialize(), function (data) {
      if (data.sent) {
        sent.height(form.height());
        form.fadeOut(function () {
          sent.fadeIn();
        });
      } else {
        $('#error').slideDown();
      }
    });
    return false;
  });
});
