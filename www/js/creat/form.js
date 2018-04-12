$(function() {
  $('#form_creat_photographer').submit(function() {
    if ($('input[name="password"]').val() != $('input[name="password_confirm"]').val()) {
      alert('パスワードが違っています');
      return false;
    }
  })
});
