{$clients=[
['name'=>'client1','image'=>'c1.jpg','url'=>'http://url1'],
['name'=>'client2','image'=>'c2.jpg','url'=>'http://url2'],
['name'=>'client3','image'=>'c3.jpg','url'=>'http://url3'],
['name'=>'client4','image'=>'c4.jpg','url'=>'http://url4'],
['name'=>'client5','image'=>'c5.jpg','url'=>'http://url5'],
['name'=>'client6','image'=>'c6.jpg','url'=>'http://url6']
]}
<div class="row owl-carousel main_clients">
	{foreach $clients as $client}
		<div class="item col-xs-4 col-sm-2">
			<a class="client_image" href="{$client.url}">
				<img src="{thumb input="assets/images/clients/{$client.image}" options='w=170&h=126&zc=1'}" alt="{$client.name}"/>
			</a>
		</div>
	{/foreach}
</div>