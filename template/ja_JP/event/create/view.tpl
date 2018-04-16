<h2>event_create_view</h2>
<form action="." method="post">
  <table border="0">
    <tr>
      <td>イベント名</td>
      <td><input type="text" name="event_name" value="{$form.event_name}" readonly required></td>
    </tr>
    <tr>
      <td>公開開始日</td>
      <td><input type="date" name="event_start_day" value="{$form.event_start_day}" readonly required></td>
    </tr>
    <tr>
      <td>公開終了日</td>
      <td><input type="date" name="event_end_day" value="{$form.event_end_day}" readonly required></td>
    </tr>
    <tr>
      <td>写真</td>
      <td>{$app.photo_name}</td>
    </tr>
  </table>
  <p>
  <input type="submit" name="action_event_create" value="編集">
  <input type="submit" name="action_event_do" value="作成">
  </p>
</form>
