<h3>プレビュー画面</h3>
<form action="." method="post" enctype="multipart/form-data">
  <table border="0">
    <tr>
      <td>イベント名</td>
      <td><input type="text" name="event_name" value="{$form.event_name}" readonly required></td>
    </tr>
    <tr>
      <td>公開開始日</td>
      <td><input type="date" name="event_start_day" value="{$form.event_start_day}" readonly required></td>
    </tr>
    <tr>
      <td>公開終了日</td>
      <td><input type="date" name="event_end_day" value="{$form.event_end_day}" readonly required></td>
    </tr>
  </table>
  <p>写真</p>
  <br>
  {foreach from=$app.uploadphoto item='updata'}
  <img src={$updata.phototmppath} width="128" height="128">
  <input type="hidden" name="photo_tmp_path[]" value="{$updata.phototmppath}" readonly required/>
  {/foreach}
  <p>
    <input type="submit" name="action_event_create" value="編集">
    <input type="submit" name="action_event_create_do" value="作成">
    <input type="submit" name="action_event_createprt_do" value="作成(prototype)">
  </p>
</form>
