<table border="0">
    <p><a href="/?action_reader_home=true">別のイベントを見る</a></p>
    <tr>
        <td>イベントID</td>
        <td>{$app.eventdate.event_id}</td>
    </tr>
    <tr>
        <td>イベント名</td>
        <td>{$app.eventdate.event_name}</td>
    </tr>
    <tr>
        <td>イベント認証キー</td>
        <td>{$app.eventdate.event_key}</td>
    </tr>
    <tr>
        <td>イベント公開日</td>
        <td>{$app.eventdate.event_start_day}</td>
    </tr>
    <tr>
        <td>イベント終了日</td>
        <td>{$app.eventdate.event_end_day}</td>
    </tr>
</table>
<p>イベント写真</p>
<tr>
    {foreach from=$app.event_photo item=photo_url}
    <td><img src={$photo_url} width="256" height="256"></li></td>
    <td><input type="hidden" name="event_photo_url[]" value="{$photo_url}" readonly required></td>
    {/foreach}
</tr>
