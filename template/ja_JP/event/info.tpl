<form action="." method="post">
  <table border="0">
    <tr>
      <td>イベントID</td>
      <td>{$app.eventdata.event_id}</td>
      <td><input type="hidden" name="event_id" value="{$app.eventdata.event_id}" readonly required></td>
    </tr>
    <tr>
      <td>イベント名</td>
      <td>{$app.eventdata.event_name}</td>
      <td><input type="hidden" name="event_name" value="{$app.eventdata.event_name}" readonly required></td>
    </tr>
    <tr>
      <td>イベント認証キー</td>
      <td>{$app.eventdata.event_key}</td>
      <td><input type="hidden" name="event_key" value="{$app.eventdata.event_key}" readonly required></td>
    </tr>
    <tr>
      <td>イベント公開日</td>
      <td>{$app.eventdata.event_start_day}</td>
      <td><input type="hidden" name="event_start_day" value="{$app.eventdata.event_start_day}" readonly required></td>
    </tr>
    <tr>
      <td>イベント終了日</td>
      <td>{$app.eventdata.event_end_day}</td>
      <td><input type="hidden" name="event_end_day" value="{$app.eventdata.event_end_day}" readonly required></td>
      <td><input type="submit" name="action_event_edit" value="編集"></td>
    </tr>
    <tr>
      <td><p><a href="/?action_event_list=true">イベント一覧</a></p></td>
    </tr>
    </table>
      <p>イベント写真</p>
    <tr>
      {foreach from=$app.event_photo item=photo_url}
      <td><img src={$photo_url} width="128" height="128"></li></td>
      <td><input type="hidden" name="event_photo_url[]" value="{$photo_url}" readonly required></td>
      {/foreach}
    </tr>
</form>
