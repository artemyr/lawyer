<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->createCategories();
    }

    private function createCategories()
    {
        $data = [];
        $data[] = [
            'name' => 'Автоюрист',
            'link' => 'autojurist',
            'parent_id' => 0,
            'city_id' => 0,
//            'image' => 'uploads/images/banners/1.png'
//            'icon' => 'menu-icon-1',
//            'subtitle' => 'Автомобили с дефектами','parent_id' => 0,
        ];
        $data[] = [
            'name' => 'ДТП',
            'link' => 'dtp',
            'parent_id' => 1,
            'city_id' => 0,
//            'image' => 'uploads/images/banners/1.png'
//            'icon' => 'menu-icon-1',
//            'subtitle' => 'Автомобили с дефектами','parent_id' => 0,
        ];
        $data[] = [
            'name' => 'ОСАГО',
            'link' => 'osago',
            'parent_id' => 1,
            'city_id' => 0,
//            'image' => 'uploads/images/banners/1.png'
//            'icon' => 'menu-icon-1',
//            'subtitle' => 'Автомобили с дефектами','parent_id' => 0,
        ];
        $data[] = [
            'name' => 'Семейное право',
            'link' => 'semeinoe',
            'parent_id' => 0,
            'city_id' => 0,
//            'image' => 'uploads/images/banners/1.png'
//            'icon' => 'menu-icon-1',
//            'subtitle' => 'Автомобили с дефектами','parent_id' => 0,
        ];
        $data[] = [
            'name' => 'Ипотечные дела',
            'link' => 'ipotech',
            'parent_id' => 4,
            'city_id' => 0,
//            'image' => 'uploads/images/banners/1.png'
//            'icon' => 'menu-icon-1',
//            'subtitle' => 'Автомобили с дефектами','parent_id' => 0,
        ];

        foreach($data as $item)
            Category::create($item);
    }
}
