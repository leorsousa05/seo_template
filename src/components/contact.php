<section class="contact section--center">
	<div class="contact__container">
		<form class="contact__container__form" action="<?= WEBSITE_FOLDER ?>email-enviado" method="get">
			<input placeholder="Nome" name="name" type="text">
			<input placeholder="Email" name="email" type="email">
			<input placeholder="Número de Telefone" name="phone-number" type="tel">
			<textarea placeholder="Mensagem" name="message" type="text"></textarea>
			<button class="btn">Enviar</button>
		</form>
	</div>
</section>
