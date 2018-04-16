<h2>event_create<h2>

<form action="." method="post" enctype="multipart/form-data">
  <table border="0">
    <tr>
      <input type="hidden" name="MAX_FILE_SIZE" value="50000KB" />
      <td>イベント名</td>
      <td><input type="text" name="event_name" value="{$form.event_name}" required></td>
    </tr>
    <tr>
      <td>公開開始日</td>
      <td><input type="date" name="event_start_day" value="{$form.event_start_day}" required></td>
    </tr>
    <tr>
      <td>公開終了日</td>
      <td><input type="date" name="event_end_day" value="{$form.event_end_day}" required></td>
    </tr>
    <tr>
      <td>写真</td>
      <td><input type="file" name="event_photo" value="{$form.event_end_day}"required></td>
    </tr>
  </table>
  <p>
  <input type="submit" name="action_event_create_view" value="プレビュー">
  </p>
</form>
