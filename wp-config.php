<?php
/**
 * Cấu hình cơ bản cho WordPress
 *
 * Trong quá trình cài đặt, file "wp-config.php" sẽ được tạo dựa trên nội dung 
 * mẫu của file này. Bạn không bắt buộc phải sử dụng giao diện web để cài đặt, 
 * chỉ cần lưu file này lại với tên "wp-config.php" và điền các thông tin cần thiết.
 *
 * File này chứa các thiết lập sau:
 *
 * * Thiết lập MySQL
 * * Các khóa bí mật
 * * Tiền tố cho các bảng database
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Thiết lập MySQL - Bạn có thể lấy các thông tin này từ host/server ** //
/** Tên database MySQL */
define( 'DB_NAME', 'wordpress' );

/** Username của database */
define( 'DB_USER', 'root' );

/** Mật khẩu của database */
define( 'DB_PASSWORD', '' );

/** Hostname của database */
define( 'DB_HOST', 'localhost' );

/** Database charset sử dụng để tạo bảng database. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Kiểu database collate. Đừng thay đổi nếu không hiểu rõ. */
define('DB_COLLATE', '');

/**#@+
 * Khóa xác thực và salt.
 *
 * Thay đổi các giá trị dưới đây thành các khóa không trùng nhau!
 * Bạn có thể tạo ra các khóa này bằng công cụ
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Bạn có thể thay đổi chúng bất cứ lúc nào để vô hiệu hóa tất cả
 * các cookie hiện có. Điều này sẽ buộc tất cả người dùng phải đăng nhập lại.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'F0BRad&~UXj0[RorHU[4RcZB-Jli(n#l:[|QTaw%1MM[SG[JS.&=WMKmNuy/G|oQ' );
define( 'SECURE_AUTH_KEY',  'qTvPO] ToMG}eyYqiawHo0+;*>RWYCH@X(<cRF0A=mSV/*G!D:7@rbPupT,Szb~F' );
define( 'LOGGED_IN_KEY',    ')imiEK6):;Y=*bw0w(8s/~c[ez4WCS2_#=bJOg?s/ol!wV}h(vj+0YkO4=_t%U.4' );
define( 'NONCE_KEY',        'n-y<3Rdyg6Q3]1EO]9jxf#Ux6czzXY~M~4&E r{]x%H{rBYADSEl? Khe~}1}Y6v' );
define( 'AUTH_SALT',        'hephvZ<&Wl|!ad=`Q0Nz^ov)C7,cdai!&s>zaV10clR2x(r0#611IL?=(ed(H#^t' );
define( 'SECURE_AUTH_SALT', '.ikM[f,@^|EWPP9+9z?pn&Q03*-MHGEM{q_hIM`.=:pJO3d@7Z>|6]m}JE4Tp2<0' );
define( 'LOGGED_IN_SALT',   'JT+7Tf]U$kjrn/?8d B=05hT5cC? .i!L13!Etl{)2<W&lg=&UxYJ] S}k{S{gA-' );
define( 'NONCE_SALT',       '4=aX/~md02,LrKw(e8X&Dl+^=}zbN:g*&).NLUwzQcx:?!tY4~*HF,Pu)VxKSs`U' );

/**#@-*/

/**
 * Tiền tố cho bảng database.
 *
 * Đặt tiền tố cho bảng giúp bạn có thể cài nhiều site WordPress vào cùng một database.
 * Chỉ sử dụng số, ký tự và dấu gạch dưới!
 */
$table_prefix = 'wp_';

/**
 * Dành cho developer: Chế độ debug.
 *
 * Thay đổi hằng số này thành true sẽ làm hiện lên các thông báo trong quá trình phát triển.
 * Chúng tôi khuyến cáo các developer sử dụng WP_DEBUG trong quá trình phát triển plugin và theme.
 *
 * Để có thông tin về các hằng số khác có thể sử dụng khi debug, hãy xem tại Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Đó là tất cả thiết lập, ngưng sửa từ phần này trở xuống. Chúc bạn viết blog vui vẻ. */

/** Đường dẫn tuyệt đối đến thư mục cài đặt WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Thiết lập biến và include file. */
require_once(ABSPATH . 'wp-settings.php');
