# Lampart Interview - Lê Công Minh Khôi

Những hình ảnh của sản phẩm có thể không trùng khớp với tên của nó

Project này đã được deploy trên Heroku. <https://lampart-interview-khoi.herokuapp.com/>

Các chức năng của project này:

- Xem
- Thêm
- Sửa
- Xóa
- Tìm kiếm
- Phân trang, mỗi trang sẽ có 10 bản ghi

## Requirements

- PHP 7.2+
- Composer

Database MySQL sử dụng dịch vụ của *jawsdb*

Connection string: `mysql://plinwopff9fcaa6n:ctgkef9c7pyhfdrv@acw2033ndw0at1t7.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/e2ol4lf91s6greyi`

## How to run

Clone repository này về máy của bạn và chạy command sau:

``` bash
git clone https://github.com/khoilr/lampart-interview
cd lampart-interview
```

Cài đặt những thư viện composer cần thiết:

```bash
composer install
```

Cuối cùng chạy command sau để deploy ở local:

```bash
cd public
php -S 127.0.0.1:8000
```

Truy cập vào địa chỉ <http://127.0.0.1:8000/> và kiểm tra kết quả. Kết quả sẽ giống như hình dưới đây:

![Screenshot](<images/Screen Shot 2022-03-17 at 2.08.30 PM.png>)
