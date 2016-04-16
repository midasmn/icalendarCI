<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、MySQL、テーブル接頭辞、秘密鍵、ABSPATH の設定を含みます。
 * より詳しい情報は {@link http://wpdocs.sourceforge.jp/wp-config.php_%E3%81%AE%E7%B7%A8%E9%9B%86 
 * wp-config.php の編集} を参照してください。MySQL の設定情報はホスティング先より入手できます。
 *
 * このファイルはインストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さず、このファイルを "wp-config.php" という名前でコピーして直接編集し値を
 * 入力してもかまいません。
 *
 * @package WordPress
 */

// 注意: 
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.sourceforge.jp/Codex:%E8%AB%87%E8%A9%B1%E5%AE%A4 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** MySQL 設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define('DB_NAME', 'icalendar');

/** MySQL データベースのユーザー名 */
define('DB_USER', 'root');

/** MySQL データベースのパスワード */
define('DB_PASSWORD', 'mn9621mnZ+');

/** MySQL のホスト名 */
define('DB_HOST', 'localhost');

/** データベースのテーブルを作成する際のデータベースの文字セット */
define('DB_CHARSET', 'utf8');

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define('DB_COLLATE', '');

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'eS*.9>?*`ALCJH;M[*iokMdXS&/{p-D8<>p}uep{Iw=IOMWyLtV~oF@4)gY/VdS~');
define('SECURE_AUTH_KEY',  '|i+f$8]pnR)Uzb7bXAaUH=x(peuni3GY*J^.gX?+4qSk.~eA9?$|pl=A:B7Qi>qL');
define('LOGGED_IN_KEY',    'KN+5KaCTv7cEJKZ<E_QJ(~CMq~PW{C>=0j/%C~(ZDtQr(|Ln2L`*){YW_6F&0N-T');
define('NONCE_KEY',        'EiC#$FO}-2LeDF_[oi(Q |Ptjtt=z&RA%=6t<X +71l6FzpaM>M~PXiZ*q;GcTfm');
define('AUTH_SALT',        '$!AON0|5T>%yi2a*`s)+eu}z^>b@$HjCwfbT}AL,#rqOeB&%AX4xeK4}gh!zMQkl');
define('SECURE_AUTH_SALT', 'g]RDu3M`5TE_C/9VAh2h3j}@0:/%WscIzS2(u+qw9t([l6?QtN$Sk2-uJtZU)5+H');
define('LOGGED_IN_SALT',   'rB2SfS+Mb.WM=S1NH^AMxkX@o8&8,)gP%et]iz2Va{=etf$:h9p^CYg8BHF4/^L.');
define('NONCE_SALT',       'kK6k02SKWj2+dQRu=HGlPzyuPEY_fd-6Zu/3/^)R7<QOf`v7XT.e%xz 8p%oOfhw');

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix  = 'wp_';

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 */
define('WP_DEBUG', false);

define('FS_METHOD', 'direct');

/* 編集が必要なのはここまでです ! WordPress でブログをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
