{extends file="layout.tpl"}

{block name='mainpage_slider'}
	{include file='inc/mainpage/slider.tpl'}
{/block}

{block name="content"}
	<h3 class="ttl_wrap"><span class="ttl">Наши преимущества</span></h3>
	<div class="row advantages">
		<div class="col-md-1 hidden-sm-down">&nbsp;</div>
		<div class="col-xs-12 col-md-2 a1">Собственное производство</div>
		<div class="col-xs-12 col-md-2 a2">Проекты «под ключ»</div>
		<div class="col-xs-12 col-md-2 a3">Четкое соблюдение сроков работы</div>
		<div class="col-xs-12 col-md-2 a4">Использование экологически чистых материалов</div>
		<div class="col-xs-12 col-md-2 a5">Надежность и долговечность изделий</div>
		<div class="col-md-1 hidden-sm-down">&nbsp;</div>
	</div>

	<h3 class="ttl_wrap"><span class="ttl">Наши изделия</span></h3>
	{$params=['parent'=>85]}
	{processor action="web/resources/getdata" params=$params ns="modxsite" assign=result}
	{include file="inc/catalog/list.tpl"}

	<h3 class="ttl_wrap"><span class="ttl">О нашей компании</span></h3>
	{$modx->resource->content}
	<a class="pull-right btn btn-callus" href="{link id=157}">Больше о нас</a>
	<div class="clearfix">&nbsp;</div>

	<div class="card main_clients_wrap">
		<h3 class="ttl_wrap"><span class="ttl">Наши клиенты</span></h3>
		{include file='inc/mainpage/clients.tpl'}
		<div class="main_delimiter"></div>
	</div>
{/block}

{block name=footers}
	<script src="{$pre_template_url}libs/camera.min.js"></script>
	<script src="{$pre_template_url}libs/owl/owl.carousel.min.js"></script>
	<script src="{$pre_template_url}js/mainpage.js"></script>
{/block}