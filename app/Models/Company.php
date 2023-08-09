<?php

namespace App\Models;

// 使うツールを取り込んでいます。
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Companyという名前のツール（クラス）を作っています。
class Company extends Model
{
    // 便利なツールを使うことを宣言しています。
    use HasFactory;
}
