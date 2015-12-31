<nav class="bottom_nav">
	<ul class="container">
		{foreach $nav_result.object as $object}
			<li class="nav-item {$object.cls}">
				{if $object.id==$modx->resource->id}
					<span class="nav-link">{$object.linktext}</span>
				{else}
					<a class="nav-link" href="{$object.uri}">{$object.linktext}</a>
				{/if}
			</li>
		{/foreach}
	</ul>
</nav>
