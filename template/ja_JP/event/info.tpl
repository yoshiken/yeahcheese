<<<<<<< HEAD
<form action="." method="post">
  <table border="0">
    <tr>
      <td>イベントID</td>
      <td>{$app.eventdata.event_id}</td>
      <td><input type="hidden" name="event_id" value="{$eventdata.event_id}" readonly required></td>
    </tr>
    <tr>
      <td>イベント名</td>
      <td>{$app.eventdata.event_name}</td>
      <td><input type="hidden" name="event_name" value="{$eventdata.event_name}" readonly required></td>
    </tr>
    <tr>
      <td>イベント認証キー</td>
      <td>{$app.eventdata.event_key}</td>
      <td><input type="hidden" name="event_key" value="{$eventdata.event_key}" readonly required></td>
    </tr>
    <tr>
      <td>イベント公開日</td>
      <td>{$app.eventdata.event_start_day}</td>
      <td><input type="hidden" name="event_start_day" value="{$eventdata.event_start_day}" readonly required></td>
    </tr>
    <tr>
      <td>イベント終了日</td>
      <td>{$app.eventdata.event_end_day}</td>
      <td><input type="hidden" name="event_end_day" value="{$eventdata.event_end_day}" readonly required></td>
    </tr>
    <tr>
      <td>イベント写真</td>
      {foreach from=$app.event_photo item=photo_url}
      <td><img src={$photo_url} width="128" height="128"></li></td>
      <td><input type="hidden" name="event_photo_url[]" value="{$photo_url}" readonly required></td>
      {/foreach}
    </tr>
    <tr>
      <td><input type="submit" name="action_event_create" value="編集"></td>
    </tr>
    <tr>
      <td><p><a href="/?action_event_list=true">イベント一覧</a></p></td>
    </tr>
=======
    <form action="." method="post" >
        <table class="u-full-width" border="0">

                <tr>
                    <th>イベントID</th>
                    <td>{$app.eventdata.event_id}</td>
                    <td><input type="hidden" name="event_id" value="{$app.eventdata.event_id}" readonly required></td>
                </tr>

                <tr>
                    <th>イベント名</th>
                    <td>{$app.eventdata.event_name}</td>
                    <td><input type="hidden" name="event_name" value="{$app.eventdata.event_name}" readonly required></td>
                </tr>
                <tr>
                    <th>イベント認証キー</th>
                    <td>{$app.eventdata.event_key}</td>
                    <td><input type="hidden" name="event_key" value="{$app.eventdata.event_key}" readonly required></td>
                </tr>
                    <th>イベント公開日</th>
                    <td>{$app.eventdata.event_start_day}</td>
                    <td><input type="hidden" name="event_start_day" value="{$app.eventdata.event_start_day}" readonly required></td>
                </tr>
                <tr>
                    <th>イベント終了日</th>
                    <td>{$app.eventdata.event_end_day}</td>
                    <td><input type="hidden" name="event_end_day" value="{$app.eventdata.event_end_day}" readonly required></td>
                </tr>
                <tr>
                    <th><input type="submit" name="action_event_edit" value="編集"></th>
                </tr>
        </table>
                <tr>
                    {foreach from=$app.event_photo item=photo_url}
                    <td><img src={$photo_url} width="200" height="200"></td>
                    <input type="hidden" name="event_photo_url[]" value="{$photo_url}" readonly required>
                    {/foreach}
<<<<<<< HEAD
                    <input type="submit" name="action_event_create" value="編集">
                    <p><a href="/?action_event_list=true">イベント一覧</a></p>
>>>>>>> 最低限の見栄えを良くした
=======
                </tr>

<<<<<<< HEAD
>>>>>>> バグ潰し
    </table>
=======

>>>>>>> 爆速にした(語彙力)
</form>
