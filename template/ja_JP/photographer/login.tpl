<form action="." method="post">
  <table border="0">
    <tr>
      <td>メールアドレス</td>
      <td><input type="email" name="mailaddress" value="{$form.mailaddress}"　placeholder="example@example.com" required></td>
    </tr>
    <tr>
      <td>パスワード</td>
      <td><input type="password" name="password" value="" placeholder="8文字以上16文字以下" required></td>
    </tr>
  </table>
  <p>
  <input class="button-primary" type="submit" name="action_photographer_login_do" value="ログイン">
  {message name="login_error"}
  </p>
</form>
