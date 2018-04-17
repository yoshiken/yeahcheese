
<form action="." method="post">
  <table border="0">
    <tr>
      <td>メールアドレス</td>
      <td><input type="email" name="mailaddress" value="{$form.mailaddress}" required>{message name="mailaddress"}</td>
    </tr>
    <tr>
      <td>パスワード</td>
      <td><input type="password" name="password" value="" required>{message name="password"}</td>
    </tr>
    <tr>
      <td>パスワード(確認用)</td>
      <td><input type="password" name="password_confirm" value="" required>{message name="password_confirm"}</td>
    </tr>
  </table>
  <p>
  <input type="submit" name="action_creat_photographer_do" value="送信">
  </p>
</form>
