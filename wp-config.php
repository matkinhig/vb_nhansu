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
define( 'DB_NAME', 'nhansuvietbank' );

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
define( 'AUTH_KEY',         '?1)<cIAh.SMv{x#T<o`3wcF{,dA==jkrTqM@qCsGWt9Hc=bY_Wy6)v[#L.hw`acE' );
define( 'SECURE_AUTH_KEY',  'Tiu5E~qu}lJT`BP24Eg2AFf!(N!}6M%dhiZ{+(W,znI;>^g%]MvN3]8!<!ROB(B`' );
define( 'LOGGED_IN_KEY',    'Ue^p6A<m/)KloQ_`1Y[Q76&:`1Y3NV?DwFg~/AKFqpQIwC]xIE-XRdU,%cDch|ps' );
define( 'NONCE_KEY',        '=dJ6I2 O0>[&q0zqpg[kYy{HiY|Cn(q(k$0G#nf&(=Iv4CgT!+G:fE5F8<Z$5,mE' );
define( 'AUTH_SALT',        '*=u, ^g[e$L>zl[`j&N+&>lATn|D@$z0F#A;sKuP,=y.0rcm{C~lK[3hzkQm8<8{' );
define( 'SECURE_AUTH_SALT', 'xr_p:JG8nh1z_$Vq*+.:VGdxEO8e=}=3/pnzWXFdF4)IlZbeEj?kV-kQyU@^!lq.' );
define( 'LOGGED_IN_SALT',   '{trpdij&kqaly].LK%}|1zT)`~+4mu%Qa^7DJTga4IN09*JK7(Dt;]nX+:Tf7!hw' );
define( 'NONCE_SALT',       'h2zWh!&^3FANq&[GLN~?CoL2g.~7sP!O-oZ2ooXS`dA{Pz[_+`eb{OjqUn8fssxr' );

/**#@-*/

/**
 * Tiền tố cho bảng database.
 *
 * Đặt tiền tố cho bảng giúp bạn có thể cài nhiều site WordPress vào cùng một database.
 * Chỉ sử dụng số, ký tự và dấu gạch dưới!
 */
$table_prefix  = 'wp_';

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
