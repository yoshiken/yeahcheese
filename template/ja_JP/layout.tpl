<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/normalize.css" type="text/css">
    <link rel="stylesheet" href="css/skeleton.css" type="text/css">
    <link rel="stylesheet" href="css/custom.css" type="text/css">
    <title>Yeahcheese</title>
</head>

<body>


    <div class="container">
        <div class="row">
            <div class="one-half column" style="margin-top: 8%">
                <section class="header">
                    <h2 class="title">Yeahcheese{$app.usermaill)}</h2>
                </section>
                {$app.usermaill}
                <div class="navbar-spacer"></div>
                <nav class="navbar">
                    <div class="container">
                        <ul class="navbar-list">
                            {if isset($app.usermaill) }
                            <li class="navbar-item"><a class="navbar-link" href="?action_Photographer_home=true">ホーム画面</a></li>
                            <li class="navbar-item"><a class="navbar-link" href="?action_event_list=true">イベント一覧</a></li>
                            <li class="navbar-item"><a class="navbar-link" href="?action_event_create=true">イベント作成</a></li>
                            <li class="navbar-item"><a class="navbar-link" href="?action_reader_home=true">閲覧ページ</a></li>
                            {else}
                            <li class="navbar-item"><a class="navbar-link" href="?action_Photographer_login=true">ログイン</a></li>
                            <li class="navbar-item"><a class="navbar-link" href="?action_reader_home=true">閲覧ページ</a></li>
                            {/if}
                        </ul>
                    </div>
                </nav>




                {$content}


                <div id="footer">
                    Powered By Ethnam - {$smarty.const.ETHNA_VERSION}.
                </div>
            </div>
        </div>
    </div>
<script src="js/instantclick.min.js" data-no-instant></script>
<script data-no-instant>InstantClick.init();</script>
</body>

</html>
