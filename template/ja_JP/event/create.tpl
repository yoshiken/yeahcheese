<form action="." method="post">
  <table border="0">
    <tr>
      <td>イベント名</td>
      <td><input type="text" name="event_name" value="" required></td>
    </tr>
    <tr>
      <td>公開開始日</td>
      <td><input type="datetime" name="event_start_day" value="" required></td>
    </tr>
    <tr>
      <td>公開終了日</td>
      <td><input type="datetime" name="event_end_day" value="" required></td>
    </tr>
    <tr>
      <td>写真</td>
      <td><input type="file" name="event_photo" required></td>
    </tr>
  </table>
  <p>
  <input type="submit" name="action_event_View" value="プレビュー">
  </p>
</form>
