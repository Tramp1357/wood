<div class="row">
	<div class="col-xs-12">
		<div class="slider_wrap clearfix">
			<div class="camera_wrap camera_white_skin" id="camera_wrap">
				{$params=[
					'album_id'=>1
				]}
				{processor action='web/gallery/items/getlist' ns=modxsite params=$params assign=result}
				{foreach $result.object as $object}
					<div data-src="{$object.relativeImage}">
						<div class="camera_caption fadeFromLeft">
							{$object.description}
						</div>
					</div>
				{/foreach}
			</div>
		</div>
	</div>
</div>