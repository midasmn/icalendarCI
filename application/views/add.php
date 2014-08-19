<?php
$new_calname = "名称未設定";
?>

<!-- ページメイン -->
<div class="container" style="margin-top:10px;">
  <!-- 登録画面 -->
  <div class="row">
    <div class="col-md-12">
      <div class="text-right">
        <p class="lead">カレンダー編集 &quot;<span id="snippet-name"><?=$new_calname ?></span>&quot;</p>
      </div>
    </div>
  </div>
  <div class="row" style="margin-top:10px;">
    <div class="col-md-3">
      <div class="btn-group btn-group-justified">
        <a href="#" id="show-preview" class="active btn btn-default">スクレイピング</a>
        <a href="#" id="show-html" class="btn btn-default">キーワード</a>
      </div>
    </div>
    <div class="col-md-3">
      <input class="form-control" placeholder="Name this snippet" name="title" type="text">
    </div>
    <div class="col-md-3">
      <select class="form-control" name="bootstrap-version">
        <li class=" selected version-chooser">
          <option selected value="3.2.0">Google画像</option>
        </li>
        <li class=" version-chooser">
          <option value="3.1.0">fotolia画像</option>   
        </li>       
      </select>
    </div>

    <div class="col-md-3 text-right">

      <div class="btn-group" style="text-align:left">
        <a href="#" id="save-snippet" class="btn btn-primary ladda-button" data-style="expand-right">カレンダー追加</a>
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
          <span class="caret"></span>
        </button>
      </div>

    </div>
  </div>

<!-- ページメイン -->
<div class="container"  style="margin-top:10px;">
  <div class="row">
    <div class="col-lg-12" style="display: block;">
      <div id="editor-html" class="playground-editor ace_editor ace-clouds" style="display: block;">
        <textarea wrap="off" style="top: 16px; height:auto; width: 100%; left: 44px;"></textarea>
      </div>
    </div>
</div>
<!--  -->
</div>
