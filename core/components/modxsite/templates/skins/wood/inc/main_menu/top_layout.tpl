<nav class="navbar navbar-light bg-faded">
	<button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2">
		&#9776;
	</button>
	<div class="collapse navbar-toggleable-xs" id="exCollapsingNavbar2">
		<ul class="nav navbar-nav">
			{$params=[
				'startId'=>0,
				'sort'=>'menuindex',
				'dir'=>'asc'
			]}
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
	</div>
</nav>
