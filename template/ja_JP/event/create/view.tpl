<form action="." method="post">
  <table border="0">
    <tr>
      <td>イベント名</td>
      <td><input type="text" name="event_name" value="" disabled="disabled" required></td>
    </tr>
    <tr>
      <td>公開開始日</td>
      <td><input type="datetime" name="event_start_day" value="" disabled="disabled" required></td>
    </tr>
    <tr>
      <td>公開終了日</td>
      <td><input type="datetime" name="event_end_day" value="" disabled="disabled" required></td>
    </tr>
  </table>
  <p>
  <input type="submit" name="action_event_create" value="編集">
  <input type="submit" name="action_event_do" value="作成">
  </p>
</form>
