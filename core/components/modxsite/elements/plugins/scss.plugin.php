<?php
// директория со стилями (в конце слэш обязателен)
$style_dir = MODX_BASE_PATH.'assets/components/modxsite/templates/skins/wood/css/';

// сканирование содержимого
$files = scandir(rtrim($style_dir,'/'));

$scss = new Sass();
$scss->setStyle(Sass::STYLE_COMPRESSED);

// выбор файлов с расширением scss
foreach ($files as $scss_file) {
	if (is_file($style_dir . $scss_file) && (strtolower(pathinfo($style_dir . $scss_file, PATHINFO_EXTENSION)) == 'scss')) {

		// вычисление проверочного md5 хэша содержимого .scss файла
		$scss_hash = hash('md5', file_get_contents($style_dir . $scss_file));

		// при отсутствии записанного (в .scsshash файл) хэша или его несовпадении с записанным - генерация css
		if (!file_exists($style_dir . $scss_file . 'hash') || ($scss_hash != file_get_contents($style_dir . $scss_file . 'hash'))) {

			//file_put_contents( $style_dir.substr($scss_file,0,-4).'css', $scss->compile($style_dir.$scss_file) );
			file_put_contents($style_dir . substr($scss_file, 0, -4) . 'css', $scss->compileFile($style_dir . $scss_file));

			// запись хэша
			file_put_contents($style_dir . $scss_file . 'hash', $scss_hash);
		}
	}
}