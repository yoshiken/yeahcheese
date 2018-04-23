<form action="." method="post" enctype="multipart/form-data">
  <table border="0">
    <input type="hidden" name="MAX_FILE_SIZE" value="50000KB" />
    <tr>
      <td>イベントID<br>(編集不可)</td>
      <td>{$form.event_id}</td>
      <td><input type="hidden" name="event_id" value="{$form.event_id}" readonly required>{message name="event_id"}</td>
    </tr>
    <tr>
      <td>認証キー<br>(編集不可)</td>
      <td>{$form.event_key}</td>
      <td><input type="hidden" name="event_key" value="{$form.event_key}" readonly required>{message name="event_key"}</td>
    </tr>
    <tr>
      <td>イベント名</td>
      <td><input type="text" name="event_name" value="{$form.event_name}" required>{message name="event_name"}</td>
    </tr>
    <tr>
      <td>公開開始日</td>
      <td><input type="date" name="event_start_day" value="{$form.event_start_day}" required>{message name="event_start_day"}</td>
    </tr>
    <tr>
      <td>公開終了日</td>
      <td><input type="date" name="event_end_day" value="{$form.event_end_day}" required>{message name="event_end_day"}</td>
    </tr>
    <tr>
        <td>イベント写真</td>
              <td><input type="file" name="event_photo[]" value="{$form.event_photo}" multiple>{message name="event_photo"}</td>
    <tr>
        {foreach from=$app.event_photo item=photo_url}
        <td><img src={$photo_url} width="128" height="128"></td>
        <td><input type="checkbox" name="delphoto_url[]" value="{$photo_url}"></td>
        <td><input type="hidden" name="event_photo_url[]" value="{$photo_url}" readonly required></td>
    </tr>
        {/foreach}
  </table>
  <p>
  <input class="button-primary" type="submit" name="action_event_edit_photo_delete" value="選択した画像を削除">
  <input class="button-primary" type="submit" name="action_event_edit_do" value="Update">
  </p>
</form>
