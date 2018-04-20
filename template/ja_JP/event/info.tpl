<h2>event_info<h2>
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
    </table>
</form>
