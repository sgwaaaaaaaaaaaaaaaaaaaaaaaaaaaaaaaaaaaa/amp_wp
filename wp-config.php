<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、インストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さずにこのファイルを "wp-config.php" という名前でコピーして
 * 直接編集して値を入力してもかまいません。
 *
 * このファイルは、以下の設定を含みます。
 *
 * * MySQL 設定
 * * 秘密鍵
 * * データベーステーブル接頭辞
 * * ABSPATH
 *
 * @link http://wpdocs.sourceforge.jp/wp-config.php_%E3%81%AE%E7%B7%A8%E9%9B%86
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
define('DB_NAME', 'amp');

/** MySQL データベースのユーザー名 */
define('DB_USER', 'root');

/** MySQL データベースのパスワード */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'N]K}&1AE+sN mH>)_f/pu7u}O+VnVI%>rCBuwixiMo-gy8 vI=S0]K8O|{I_|WUS');
define('SECURE_AUTH_KEY',  '<Z*Vq9B0CPj7SV ^1|GC#`mfbi?QB!J-)G-,Trl2[bx(9b1|XA$D}|P@XA6]D~Vj');
define('LOGGED_IN_KEY',    'kMYiui*scgMk3Fv>S.T7Tv/zs-0MA1I%gEH@*GjO,g  k>nUwlto[*CZL;{n:jOY');
define('NONCE_KEY',        'sv5{#h~gyRf_Z)TFT3-/.^Nuyf^<koFQ{<>7-IfUtI*R$C*(6[# (ITbFGV-Cq8O');
define('AUTH_SALT',        '0Ixt+NBxqCy4z8Wo1v5bS~q>JAtPT0B_&yb _>6:cw)5%.uX(=p,dp(gLxw-,{aN');
define('SECURE_AUTH_SALT', '1X^M7z=|_EaNcqF^+h#s63!$|0(A?]HL%df-U3IBEcyCX~?.0E -ID,g 0t]JLpf');
define('LOGGED_IN_SALT',   'Yt]e7p-7^dnRQ5f;j0BDoEpex$|kurFQ+ispZnanWIYVFM26z?FI -L2JP%Y;+{@');
define('NONCE_SALT',       '1-Ez~mpo Gh+ka%y1DHP%b51F(,YeR1Z1+pG+e,NyU_DFiBD3{=-2i4iPE)KgVlR');

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix  = 'amp_';

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 *
 * その他のデバッグに利用できる定数については Codex をご覧ください。
 *
 * @link http://wpdocs.osdn.jp/WordPress%E3%81%A7%E3%81%AE%E3%83%87%E3%83%90%E3%83%83%E3%82%B0
 */
define('WP_DEBUG', false);

/* 編集が必要なのはここまでです ! WordPress でブログをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
