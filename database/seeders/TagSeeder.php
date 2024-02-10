<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            [
                'name' => 'Pop',
            ],
            [
                'name' => 'Rock',
            ],
            [
                'name' => 'Classica',
            ],
            [
                'name' => 'Elettronica',
            ],
            [
                'name' => 'Jazz',
            ],
            [
                'name' => 'Blues',
            ],
        ];

        foreach ($tags as $tag) {
            $newTag = new Tag();
            $newTag->fill($tag);
            $newTag->save();
        }
    }
}
