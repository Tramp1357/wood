{$params=['startId'=>0,'showHome'=>true]}
{processor action='site/web/breadcrumbs' ns=modxsite params=$params assign=result}
<div class="breadcrumbs">
	{$total = count($result['object'])}
	{$counter = 0}
	{foreach $result.object as $object}
		{$counter=$counter+1}
		{if $counter<$total}
			<span itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
				<a itemprop="url" rel="{$object.pagetitle}" href="{$object.uri}">
					<span itemprop="title">{$object.pagetitle}</span></a></span>
			/
		{else}
			<span class="last" itemscope="itemscope">{$object.pagetitle}</span>
		{/if}
	{/foreach}
</div>
