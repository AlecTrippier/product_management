<?php



namespace Database\Seeders;

use App\Models\Product; //追加
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{

    public function run() 
    {
        // ダミーレコードを10件作成
        Product::factory()->count(10)->create();
    }
}
