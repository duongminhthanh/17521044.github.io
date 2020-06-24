----Hướng dẫn sử dụng----

Bước 1: Cài đặt 2 chương trình Xampp và Notepad++ nếu chưa có. Mục đích:
	+ Xampp: chạy localhost.
	+ Notepad++: đọc file SQL (dùng chương trình khác có thể sẽ bị lỗi font).

Bước 2: Chạy Xampp, start mục Apache và MySQL.

Bước 3: Mở trình duyệt, vào url localhost/phpmyadmin, tạo database có tên là 'bandienthoai', import dữ liệu theo 1 trong 2 cách sau:
	+ C1: Mở file bandienthoai.sql trong mục data bằng Notepad++, copy toàn bộ, dán vào command của database 'bandienthoai' và chạy toàn bộ.
	+ C2: Dùng chức năng Import của phpmyadmin, bandienthoai->import->chọn tệp sql.

Bước 4: Vào thư mục cài đặt xampp, tìm đến htdocs, sau đó copy mục myproject trong mục Sourcecode vào thư mục htdocs.

Bước 5: Trong thư mục htdocs vừa thao tác ở bước 4, theo đường dẫn myproject\DoAnMonWA\admin mở file .htaccess bằng notepad:
	Sau đó tại dòng AuthUserFile sửa lại đường dẫn theo "..Ổ đĩa cài Xampp..\xampp\htdocs\myproject\DoAnMonWA\admin\.htpasswd"

		#Ví dụ nếu cài ở ổ C thì sửa lại thành "C:\xampp\htdocs\myproject\DoAnMonWA\admin\.htpasswd"#

Bước 6: + Chạy url sau để vào trang chủ: http://localhost/myproject/DoAnMonWA/public/trangchu.html
	+ Chạy url sau để vào trang admin: http://localhost/myproject/DoAnMonWA/admin/admin.html
	Đăng nhập trang admin với:
	+ Tài khoản: admin
	+ Mật khẩu: admin.