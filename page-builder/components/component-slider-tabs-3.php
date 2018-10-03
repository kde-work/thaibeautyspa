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
 * Name: Слайдер в 3 строки с Табами
 * Thumbnail: /page-builder/assets/img/slider-tabs-3.png *Image for admin panel in Page Builder
 * Preview: /page-builder/assets/img/slider-tabs-3.png *Relative path from Theme root
 * Global Component Rules: 0
 * Картинка: Media Upload
 * Картинка OPTION 'help': Рекомендуется вертикальный формат 388х905
 * Шаблон: Select
 * Шаблон '1': Выберите шаблон
 * Шаблон '2': Специальные предложения
 * Шаблон '3': Бизнес Линч
 * Таб: GROUP BEGIN
 * Таб OPTION 'type': Repeating Group
 *    Заголовок: Textarea
 *    Заголовок OPTION 'limited': 100
 *    Заголовок OPTION 'help': Лимит 100 символов
 *    Изображение hover-эффект: Media Upload
 *    Изображение hover-эффект OPTION 'help': Рекомендуется вертикальный формат
 *    Текст кнопки окна Подробнее: Text
 *    Настройки картинки услуги: GROUP BEGIN
 *       background-size: Checkbox
 *       background-size '1': CONTAIN
 *       min-height: Text
 *       min-height OPTION 'help': Минимальная высота картинки (умол. 140)
 *    Настройки картинки услуги: GROUP END
 *    Слайд: GROUP BEGIN
 *    Слайд OPTION 'type': Repeating Group
 *       Картинка Большая: Media Upload
 *       Картинка Большая OPTION 'help': Рекомендуется вертикальный формат
 *       Картинка Мобильная: Media Upload
 *    	 Картинка Мобильная OPTION 'help': Рекомендуется горизонтальный формат
 *       Показ в слайдере: GROUP BEGIN
 *          Заголовок слайда: Textarea
 *          Заголовок слайда OPTION 'limited': 150
 *          Заголовок слайда OPTION 'help': Limit 150 characters
 *          Описание слайда: Textarea
 *       Показ в слайдере: GROUP END
 *       Окно Подробнее: GROUP BEGIN
 *          page-type: Checkbox
 *          page-type '1': TypeA
 *          page-type-b: Checkbox
 *          page-type-b '1': TypeB
 *          page-type-c: Checkbox
 *          page-type-c '1': TypeC
 *          Заголовок окна: Textarea
 *          Заголовок окна OPTION 'limited': 150
 *          Заголовок окна OPTION 'help': Limit 150 characters
 *          Подзаголовок окна: Textarea
 *          С описание окна: Textarea
 *          Подзаголовок окна OPTION 'limited': 250
 *          Подзаголовок окна OPTION 'help': Limit 250 characters
 *          Описание слева окна: WYSIWYG
 *          Описание справа окна: WYSIWYG
 *          Картинка для типа А: Media Upload
 *          Текст возле кнопки А: Textarea
 *          Текст над слайдером: Textarea
 *          Офраншизе: GROUP BEGIN
 *          Офраншизе OPTION 'type': Repeating Group
 *              Заголовок офраншизе: Textarea
 *              Картинка офраншизе: Media Upload
 *              Описание офраншизе: WYSIWYG
 *              Mobile img франшиза: Media Upload
 *          Офраншизе: GROUP END
 *       Окно Подробнее: GROUP END
 *    Слайд: GROUP END
 * Таб: GROUP END
 * COMPONENT END
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}