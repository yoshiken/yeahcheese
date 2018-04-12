$(function() {
  $('#form_creat_photographer').submit(function() {
    if ($("#password")[0].value != $("#password_confirm")[0].value) {
      alert('パスワードが違っています');
      return false;
    }
  })
});
