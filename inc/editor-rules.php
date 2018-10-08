<?php

add_action('admin_menu', 'remove_admin_menu');
function remove_admin_menu() {
	if( current_user_can( 'editor' ) ){
		remove_menu_page('index.php');
		remove_menu_page('edit.php?post_type=courses');
		remove_menu_page('edit.php?post_type=mails');
		remove_menu_page('edit.php?post_type=services');
		remove_menu_page('edit.php?post_type=en_v');
		remove_menu_page('profile.php');
		remove_menu_page('options-general.php'); // Удаляем раздел Настройки	
		remove_menu_page('tools.php'); // Инструменты
		remove_menu_page('users.php'); // Пользователи
		remove_menu_page('plugins.php'); // Плагины
		remove_menu_page('themes.php'); // Внешний вид	
		remove_menu_page('edit.php'); // Посты блога
		remove_menu_page('upload.php'); // Медиабиблиотека
		remove_menu_page('edit.php?post_type=page'); // Страницы
		remove_menu_page('edit-comments.php'); // Комментарии	
		remove_menu_page('link-manager.php'); // Ссылки
		remove_menu_page('wpcf7');   // Contact form 7
		remove_menu_page('options-framework'); // Cherry Framework
	}
}

if( current_user_can( 'editor' ) ){
	add_filter('show_admin_bar', '__return_false'); // отключить
} 