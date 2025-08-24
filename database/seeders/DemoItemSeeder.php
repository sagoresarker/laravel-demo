<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DemoItem;

class DemoItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $demoItems = [
            [
                'name' => 'Sample Task 1',
                'description' => 'This is a sample task for demonstration purposes',
                'status' => 'active',
                'priority' => 3
            ],
            [
                'name' => 'Sample Task 2',
                'description' => 'Another sample task with medium priority',
                'status' => 'active',
                'priority' => 2
            ],
            [
                'name' => 'Sample Task 3',
                'description' => 'A pending task waiting for approval',
                'status' => 'pending',
                'priority' => 1
            ],
            [
                'name' => 'Inactive Task',
                'description' => 'This task is currently inactive',
                'status' => 'inactive',
                'priority' => 1
            ]
        ];

        foreach ($demoItems as $item) {
            DemoItem::create($item);
        }
    }
}
