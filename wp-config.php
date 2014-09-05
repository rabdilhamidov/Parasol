<?php
/**
 * Основные параметры WordPress.
 *
 * Этот файл содержит следующие параметры: настройки MySQL, префикс таблиц,
 * секретные ключи, язык WordPress и ABSPATH. Дополнительную информацию можно найти
 * на странице {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Кодекса. Настройки MySQL можно узнать у хостинг-провайдера.
 *
 * Этот файл используется сценарием создания wp-config.php в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать этот файл
 * с именем "wp-config.php" и заполнить значения.
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'wp_parasol');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'rs2311');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется снова авторизоваться.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'P<(x<.Hi<mu^UQ=*GeHaNz4#.Ue^|Y7SU:BeDxDEI Ia _|V8BLpE?OYYdduK&dO');
define('SECURE_AUTH_KEY',  'cWm4kEz sh3mlX$&3_3Sp)mT^O^Y#DU(b_7y8Yz-SVY,WgMk58*~fS9JsYip;T^W');
define('LOGGED_IN_KEY',    '-7>&{rT^`>}BHS_`AZTD?@rVNQu.||<Z;XF|)B$GU!STrPIq7=Zhw$MYDit0GyZI');
define('NONCE_KEY',        'J2aC:=m8ar8.4e+9#?:I]ompN^)GT.I8@crgu3%D+B)|%0P*>EMIzVWs&1.OTEq:');
define('AUTH_SALT',        'B,q:-&mW1$AU;) ZGkeQV%5Z!l|WGmU_g OEC5m(_*]`Lfn~:%QSqE&Cx)6iO{/h');
define('SECURE_AUTH_SALT', '9gCEdBHIR*X&.42MA:F[!*]DnN(?9JhW-fE; bq#OYd@MJPP`v}!(Y&+p[7bAh[A');
define('LOGGED_IN_SALT',   'x1DE}CG5+frJ-T7uu2n:ALMT`hsc~%_Z&|_pjJ};^;Cd%YB$bY{!.6!+DxdE~]AP');
define('NONCE_SALT',       'Te2.e_E--L c| UGna]S8;v7<()p,PyY&7 1Q1PebSb#O<O7)ns75F}w^G5^0N(5');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько блогов в одну базу данных, если вы будете использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Язык локализации WordPress, по умолчанию английский.
 *
 * Измените этот параметр, чтобы настроить локализацию. Соответствующий MO-файл
 * для выбранного языка должен быть установлен в wp-content/languages. Например,
 * чтобы включить поддержку русского языка, скопируйте ru_RU.mo в wp-content/languages
 * и присвойте WPLANG значение 'ru_RU'.
 */
define('WPLANG', 'ru_RU');

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Настоятельно рекомендуется, чтобы разработчики плагинов и тем использовали WP_DEBUG
 * в своём рабочем окружении.
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

// Откл. автообновление
define( 'AUTOMATIC_UPDATER_DISABLED', true );

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
