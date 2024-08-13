<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductComment;
class ProductCommentSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductComment::factory()->count(10)->create();
    }
}
