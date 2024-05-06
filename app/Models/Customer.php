<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer'; // Định nghĩa tên của bảng

    protected $primaryKey = 'customer_id'; // Định nghĩa primary key của bảng

    protected $fillable = ['customer_name', 'customer_email', 'customer_password', 'customer_phone','customer_address']; // Các trường có thể gán dữ liệu

    // Các mối quan hệ nếu có

    // Ví dụ mối quan hệ 1-n với một bảng khác
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // Các phương thức tùy chỉnh nếu cần
}