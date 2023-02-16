<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return vouser_id
     */
    public function run()
    {
        Item::create(["user_id" => "1", "name" => "島袋光年", "type" => "3", "detail" => "紫色"]);
        Item::create(["user_id" => "1", "name" => "矢吹健太朗", "type" => "5", "detail" => "白色"]);
        Item::create(["user_id" => "1", "name" => "藤巻忠俊", "type" => "7", "detail" => "黄色"]);
        Item::create(["user_id" => "1", "name" => "佐藤太郎", "type" => "6", "detail" => "緑色"]);
        Item::create(["user_id" => "2", "name" => "河下水希", "type" => "8", "detail" => "紫色"]);
        Item::create(["user_id" => "2", "name" => "尾田栄一郎", "type" => "2", "detail" => "黄色"]);
        Item::create(["user_id" => "2", "name" => "鳥山明", "type" => "6", "detail" => "緑色"]);
        Item::create(["user_id" => "2", "name" => "冨樫義博", "type" => "9", "detail" => "青色"]);
        Item::create(["user_id" => "2", "name" => "ゆでたまご", "type" => "2", "detail" => "青色"]);
        Item::create(["user_id" => "3", "name" => "井上雄彦", "type" => "1", "detail" => "白色"]);
        Item::create(["user_id" => "3", "name" => "岸本斉史", "type" => "3", "detail" => "紫色"]);
        Item::create(["user_id" => "3", "name" => "荒木飛呂彦", "type" => "4", "detail" => "黄色"]);
        Item::create(["user_id" => "3", "name" => "久保帯人", "type" => "5", "detail" => "緑色"]);
        Item::create(["user_id" => "4", "name" => "空知英秋", "type" => "6", "detail" => "白色"]);
        Item::create(["user_id" => "4", "name" => "小畑健", "type" => "9", "detail" => "紫色"]);
        Item::create(["user_id" => "4", "name" => "原哲夫", "type" => "7", "detail" => "青色"]);
        Item::create(["user_id" => "4", "name" => "森田まさのり", "type" => "3", "detail" => "黄色"]);
        Item::create(["user_id" => "4", "name" => "うすた京介", "type" => "5", "detail" => "白色"]);
        Item::create(["user_id" => "4", "name" => "高橋陽一", "type" => "1", "detail" => "緑色"]);
        Item::create(["user_id" => "4", "name" => "許斐剛", "type" => "2", "detail" => "黄色"]);
        Item::create(["user_id" => "4", "name" => "北条司", "type" => "9", "detail" => "青色"]);

        for ($i = 1; $i <= 100; $i++) {
            Item::create([
                "user_id" => rand(1, 4), 
                "name" => "謎のおやつ No.". $i,
                "type" => rand(4, 10) + 3,
                "detail" => "虹色",
            ]);
        }
    }
}
