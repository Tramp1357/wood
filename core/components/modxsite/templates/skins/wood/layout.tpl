<!DOCTYPE html>

{block name=params}{/block}

<html lang="ru">
	<head>
		{block name=meta}
			{* Заголовок специально в блок загнан, чтобы в разных шаблонах его можно было бы переопределить *}
			<title>{block name="title"}{$modx->resource->longtitle|default:$modx->resource->pagetitle} | {$site_name}{/block}</title>
			{snippet name="MetaX@MetaX"}
		{/block}

		{block name=bootstrap}
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
		{/block}

		{block name=styles}
			<link rel="stylesheet" href="{$pre_template_url}css/style.css">
		{/block}

		{block name=headers}{/block}
	</head>

{* Разметка сетки отделена от разметки функц. блоков. Тем самым наш контент не привязан к сетке. Добавлены только теги header и footer. *}

{block name=body}
<body>
<header{if $modx->resource->id==1} class="mainpage"{/if}>
	<div class="container">
		<div class="row top_panel">
			<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 logo">
				{if $modx->resource->id==1}
					<div class="img"></div>
				{else}
					<a class="img" href="{config name="site_url"}"></a>
				{/if}
			</div>
			<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 ttl">
				Интерьеры и мебель<br/>
				на заказ
			</div>
			<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 info">
				<div class="phone">
					<span class="prefix">+7 (903)</span> 759 49 32
				</div>
				<button type="button" class="btn btn-primary-outline" data-toggle="modal" data-target="#callorder">Заказать звонок</button>
			</div>
		</div>
		{$params=['startId'=>0,'sort'=>'menuindex','dir'=>'asc']}
		{processor action="site/web/getmenu" ns=modxsite params=$params assign=nav_result}
		{include file='inc/main_menu/top_layout.tpl'}
		{block name='mainpage_slider'}
		{/block}
	</div>
</header>


<div class="container">
	{block name=content}
		{$modx->resource->content}
	{/block}
</div>

<footer>
	{include file='inc/main_menu/bottom_layout.tpl'}
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-4 bottom_logo">

			</div>
			<div class="col-sm-12 col-md-4 bottom_callus">
				<button type="button" class="btn btn-callus" data-toggle="modal" data-target="#callorder">Заказать звонок</button>
			</div>
			<div class="col-sm-12 col-md-4 bottom_info">
				<div class="bottom_phone"><span>+7 (495)</span> 762 28 12</div>
				<div class="bottom_phone"><span>+7 (903)</span> 759 49 32</div>
				<div class="addr_info"><a href="mailto:info@wood-elite.ru">info@wood-elite.ru</a></div>
			</div>
			<div class="col-xs-12 copyright">&copy; wood-elite.ru 2015-{time()|date_format:'Y'}</div>
		</div>
	</div>
</footer>

{block name=modals}
	{include file='inc/modals/callorder.tpl'}
{/block}
	<script src="{$pre_template_url}libs/jquery.min.js"></script>
	<script src="{$pre_template_url}libs/jquery.browser.min.js"></script>
	<script src="{$pre_template_url}libs/jquery.easing.1.3.js"></script>
	<script src="{$pre_template_url}libs/tether/js/tether.js"></script>
	<script src="{$pre_template_url}libs/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="{$template_url}vendor/AlertifyJS/build/alertify.min.js"></script>
	<script src="{$pre_template_url}js/script.js"></script>
{block name=footers}{/block}
</body>
{/block}
</html>
