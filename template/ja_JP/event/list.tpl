<h2>event List</h2>
{if count($errors)}
<ul>
  {foreach from=$errors item=error}
  <li>{$error}</li>
  {/foreach}
</ul>
{/if}

{foreach from=$app.eventinfo key=myId item=i}
<table border="0">
  <p>
  <tr>
    <td>イベントID</td>
    <td>{$i.0.event_id}</td>
  </tr>
  <tr>
    <td>イベント名</td>
    <td>{$i.0.event_name}</td>
  </tr>
  <tr>
    <td>イベント認証キー</td>
    <td>{$i.0.event_key}</td>
  </tr>
  <tr>
    <td>イベント公開日</td>
    <td>{$i.0.event_start_day}</td>
  </tr>
  <tr>
    <td>イベント終了日</td>
    <td>{$i.0.event_end_day}</td>
  </tr>
  <tr>
</table>
</p>
{/foreach}
