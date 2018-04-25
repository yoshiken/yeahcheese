<form action="." method="post">
  <table border="0">
    <tr>
      <td>メールアドレス</td>
      <td><input type="email" name="mailaddress" placeholder="example@example.com"　value="{$form.mailaddress}" required>{message name="mailaddress"}</td>
    </tr>
    <tr>
      <td>パスワード</td>
      <td><input type="password" name="password" placeholder="8文字以上16文字以下"　value="" required>{message name="password"}</td>
    </tr>
    <tr>
      <td>パスワード(確認用)</td>
      <td><input type="password" name="password_confirm" placeholder="8文字以上16文字以下"　value="" required>{message name="password_confirm"}</td>
    </tr>
  </table>
  <p>
  <input type="submit" name="action_creat_photographer_do" value="送信">
  </p>
</form>
