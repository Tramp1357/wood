{extends file="layout.tpl"}

{block name=content}
	{include file='inc/breadcrumbs/layout.tpl'}
	<h1><span class="ttl">{$modx->resource->pagetitle}</span></h1>
	{$modx->resource->content}
	{block name='post_content'}{/block}
{/block}
