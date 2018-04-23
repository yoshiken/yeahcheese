    <form action="." method="post" >
        <table class="u-full-width" border="0">

                <tr>
                    <th>イベントID</th>
                    <td>{$app.eventdata.event_id}</td>
                    <td><input type="hidden" name="event_id" value="{$eventdata.event_id}" readonly required></td>
                </tr>

                <tr>
                    <th>イベント名</th>
                    <td>{$app.eventdata.event_name}</td>
                    <td><input type="hidden" name="event_name" value="{$eventdata.event_name}" readonly required></td>
                </tr>
                <tr>
                    <th>イベント認証キー</th>
                    <td>{$app.eventdata.event_key}</td>
                    <td><input type="hidden" name="event_key" value="{$eventdata.event_key}" readonly required></td>
                </tr>
                    <th>イベント公開日</th>
                    <td>{$app.eventdata.event_start_day}</td>
                    <td><input type="hidden" name="event_start_day" value="{$eventdata.event_start_day}" readonly required></td>
                </tr>
                <tr>
                    <th>イベント終了日</th>
                    <td>{$app.eventdata.event_end_day}</td>
                    <td><input type="hidden" name="event_end_day" value="{$eventdata.event_end_day}" readonly required></td>
                </tr>
                    {foreach from=$app.event_photo item=photo_url}
                    <img src={$photo_url} width="128" height="128">
                    <input type="hidden" name="event_photo_url[]" value="{$photo_url}" readonly required>
                    {/foreach}
                    <input type="submit" name="action_event_create" value="編集">
                    <p><a href="/?action_event_list=true">イベント一覧</a></p>
    </table>
</form>
