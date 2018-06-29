<?php
/**
 *
 * The file header and the name of the component
 *
 * Declaration/description of the component
 *
 * @author Dmitry
 * @version 0.01
 * @package component
 *
 * COMPONENT BEGIN
 * Name: Контакты для главной
 * Thumbnail: /page-builder/assets/img/contact-ext.jpg *Image for admin panel in Page Builder
 * Preview: /page-builder/assets/img/contact-ext.jpg *Relative path from Theme root
 * Global Component Rules: 0
 * Название блока: Text
 * Название блока EN: Text
 * Города: GROUP BEGIN
 * Города OPTION 'type': Repeating Group
 *    Название города: Text
 *    Время работы: Text
 *    Адрес: Textarea
 *    Email: Text
 *    Наши телефоны: GROUP BEGIN
 *    Наши телефоны OPTION 'type': Repeating Group
 *       Телефон: Text
 *    Наши телефоны: GROUP END
 *    Код карты: Textarea
 * Города: GROUP END
 * COMPONENT END
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}