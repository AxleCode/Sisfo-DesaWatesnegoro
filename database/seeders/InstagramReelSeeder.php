<?php

namespace Database\Seeders;

use App\Models\InstagramReel;
use Illuminate\Database\Seeder;

class InstagramReelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reels = [
            [
                'url' => 'https://www.instagram.com/reel/DSr9-RoE4DO/?igsh=d2J5Y2Z1NmZqazdj',
                'is_active' => true,
                'order' => 1
            ],
            [
                'url' => 'https://www.instagram.com/reel/DSoeyCfk7v_/?igsh=MXg2NXkzeXRnNXQ0ZA==',
                'is_active' => true,
                'order' => 2
            ],
            [
                'url' => 'https://www.instagram.com/reel/DSaotV3E2DT/?igsh=dXlwcHVsM2J6cTYz',
                'is_active' => true,
                'order' => 3
            ],
            [
                'url' => 'https://www.instagram.com/reel/DST-H4dk3lq/?igsh=MmR4MTZzdjhsYTZt',
                'is_active' => true,
                'order' => 4
            ],
        ];

        foreach ($reels as $reel) {
            InstagramReel::create($reel);
        }
    }
}

