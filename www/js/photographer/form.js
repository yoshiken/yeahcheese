
$('#form_login_photographer').submit(function() {

  if ($("#email")[0].value == '') {
    var mailaddress_input = false;
  }else {
    var mailaddress_input = true;
  }
  if ($("#password")[0].value == '') {
    var password_input = false;
  }else {
    var password_input = true;
  }



  if (password_input && mailaddress_input) {
    return true;
  }else if (password_input == false && mailaddress_input == false) {
    alert("メールアドレス及びパスワードが入力されていません");
  }else if (password_input == false) {
    alert("パスワードが入力されていません");
  }else if (mailaddress_input == false) {
    alert("メールアドレスが入力されていません");
  }else{
    alert("不明なエラーです");
  }
    return false;
});
