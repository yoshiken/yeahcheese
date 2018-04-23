{if count($errors)}
<ul>
  {foreach from=$errors item=error}
  <li>{$error}</li>
  {/foreach}
</ul>
{/if}

{foreach from=$app.eventinfo key=myId item=i}
<form action="." method="post">
<table border="0">
  <p>
  <tr>
    <td>イベントID</td>
    <td>{$i.0.event_id}</td>
    <td><input type="hidden" name="event_id" value="{$i.0.event_id}" readonly required></td>
  </tr>
  <tr>
    <td>イベント名</td>
    <td>{$i.0.event_name}</td>
    <td><input type="hidden" name="event_name" value="{$i.0.event_name}" readonly required></td>
  </tr>
  <tr>
    <td>イベント認証キー</td>
    <td>{$i.0.event_key}</td>
    <td><input type="hidden" name="event_key" value="{$i.0.event_key}" readonly required></td>
  </tr>
  <tr>
    <td>イベント公開日</td>
    <td>{$i.0.event_start_day}</td>
    <td><input type="hidden" name="event_start_day" value="{$i.0.event_start_day}" readonly required></td>
  </tr>
  <tr>
    <td>イベント終了日</td>
    <td>{$i.0.event_end_day}</td>
    <td><input type="hidden" name="event_end_day" value="{$i.0.event_end_day}" readonly required></td>
  </tr>
  <tr>
    <td><input type="submit" name="action_event_edit" value="編集"></td>
    <td><input type="submit" name="action_event_info" value="詳細"></td>
  </tr>
</table>
</p>
</form>
{/foreach}
<p><a href="/?action_photographer_home=true">ホームへ戻る</a></p>
