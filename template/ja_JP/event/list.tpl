{if count($errors)}
<ul>
  {foreach from=$errors item=error}
  <li>{$error}</li>
  {/foreach}
</ul>
{/if}
{foreach from=$app.eventinfo item=i}
<form action="." method="post">
  <table border="0">
    <p>
      <tr>
        <td>イベントID</td>
        <td>{$i.event_id}</td>
        <td><input type="hidden" name="event_id" value="{$i.event_id}" readonly required></td>
      </tr>
      <tr>
        <td>イベント名</td>
        <td>{$i.event_name}</td>
        <td><input type="hidden" name="event_name" value="{$i.event_name}" readonly required></td>
      </tr>
      <tr>
        <td>イベント認証キー</td>
        <td>{$i.event_key}</td>
        <td><input type="hidden" name="event_key" value="{$i.event_key}" readonly required></td>
      </tr>
        <tr>
        <td>イベント公開日</td>
        <td>{$i.event_start_day}</td>
        <td><input type="hidden" name="event_start_day" value="{$i.event_start_day}" readonly required></td>
      </tr>
      <tr>
        <td>イベント終了日</td>
        <td>{$i.event_end_day}</td>
        <td><input type="hidden" name="event_end_day" value="{$i.event_end_day}" readonly required></td>
      </tr>
      <tr>
        <td><input type="submit" name="action_event_edit" value="編集"></td>
        <td><input type="submit" name="action_event_info" value="詳細"></td>
        <td><a class="button button-primary" href="/?action_event_infofirst=true&event_id={$i.event_id}">爆速詳細</a></td>
        <td><input type="submit" name="action_event_infoprt" value="詳細(prt)"></td>
        <td><a class="button button-primary" href="/?action_event_infofirstprt=true&event_id={$i.event_id}">爆速詳細(prt)</a></td>
      </tr>
    </p>
  </table>
</form>
{/foreach}
<p><a href="/?action_photographer_home=true">ホームへ戻る</a></p>
