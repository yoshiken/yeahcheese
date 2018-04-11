$('#form_login_photographer').submit(function() {

  if ($("#email")[0].value == '' || $("#password")[0].value == '') {
    alert('入力がありません');
    return false;
  }
});
