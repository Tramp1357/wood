<div class="row card_grid">
	{foreach $result.object as $object}
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
			<div class="card">
				<a href="{$object.uri}">
					<div class="card-block">
						<h4 class="card-title eh1">{$object.pagetitle}</h4>
					</div>
					<img src="{thumb input=$object.image options='w=326&h=322&zc=1'}" alt="{$object.pagetitle}">
				</a>
			</div>
		</div>
	{/foreach}
</div>