<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            [
                'name' => 'Tag 1',
                'slug' => 'tag-1',
                'description' => 'Description for Tag 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tag 2',
                'slug' => 'tag-2',
                'description' => 'Description for Tag 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('tags')->insert($tags);

    }
}
