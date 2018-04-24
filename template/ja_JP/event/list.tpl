{if count($errors)}
<ul>
  {foreach from=$errors item=error}
  <li>{$error}</li>
  {/foreach}
</ul>
{/if}
{foreach from=$app.eventinfo item=i}
<form action="." method="post">
<<<<<<< HEAD
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
      </tr>
=======
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
                <a href="/?action_event_edit=true&event_id={$i.event_id}">編集</a>
                <a class="button button-primary" href="/?action_event_infofirst=true&event_id={$i.event_id}">詳細</a>
            </tr>
    </table>
>>>>>>> 爆速にした(語彙力)
    </p>
  </table>
</form>
{/foreach}
<p><a href="/?action_photographer_home=true">ホームへ戻る</a></p>
