<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('users')->insert([
            ['name'=>'quyvd', 'email'=>'libra1310hp@gmail.com', 'password'=>Hash::make('quy1310'), 'admin'=>true],
            ['name'=>'hanhim', 'email'=>'tranhaiha.1605@gmail.com', 'password'=>Hash::make('nhim1605'), 'admin'=>false]
        ]);
        
        DB::table('questions')->insert([
            ['content' => 'Lần đầu gặp nhau, tớ mặc đồ màu gì?'],
            ['content' => 'Chúng mình đã làm gì cho ngày kỉ niệm 1 năm?'],
            ['content' => 'Ai là người bị “ăn hiếp” nhiều hơn trong mối quan hệ này?'],
            ['content' => 'Ở gia đình, tớ sợ ai nhất?'],
            ['content' => 'Điểm nào là đáng yêu nhất trên khuôn mặt của tớ?'],
            ['content' => 'Thói quen nào của cậu khiến cho tớ hay giận dỗi?'],
            ['content' => 'Lúc tớ bận, cậu thường nghĩ gì?'],
            ['content' => 'Ai là người nói lời yêu trước, và lúc đó thì chúng mình ở đâu?'],
            ['content' => 'Ấn tượng đầu tiên của tớ trong mắt cậu là gì?'],
            ['content' => '3 điểm không ưa về đối phương'],
            ['content' => '3 điểm thích nhất về đối phương'],
            ['content' => 'Lần cãi nhau to đầu tiên'],
            ['content' => 'Bộ phim yêu thích nhất của đối phương'],
            ['content' => 'Món ăn yêu thích nhất của đối phương'],
            ['content' => 'Mẫu người yêu lý tưởng của đối phương'],
            ['content' => 'Phong cách thời trang yêu thích nhất là gì'],
            ['content' => 'Những thứ họ ghét làm nhất'],
            ['content' => 'Nhìn thấy họ khóc bao giờ chưa? Như thế nào?'],
        ]);
    }
}
