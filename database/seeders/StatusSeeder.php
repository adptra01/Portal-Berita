<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            [
                'name' => 'Published', // 1
            ],
            [
                'name' => 'In Revision', // 2
            ],
            [
                'name' => 'Pending', // 3
            ],
            [
                'name' => 'Rejected', // 3
            ],
        ];
        foreach ($statuses as $status) {
            Status::create($status);
        }
    }
}
