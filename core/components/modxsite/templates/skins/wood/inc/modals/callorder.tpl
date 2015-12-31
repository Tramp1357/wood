<div class="modal fade" id="callorder">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Заказ звонка</h4>
			</div>
			<div class="modal-body">
				<form>
					<input type="hidden" name="action" value="callorder">
					{include file='inc/misc/form/input_text.tpl' name=fullname id=co_fullname caption='Ваше имя:' required=true}
					{include file='inc/misc/form/input_text.tpl' name=phone id=co_phone caption='Ваш телефон:' required=true}
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
				<button type="button" class="btn btn-callus send_callorder">Отправить</button>
			</div>
		</div>
	</div>
</div>