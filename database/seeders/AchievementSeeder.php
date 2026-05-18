<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Achievement;
class AchievementSeeder extends Seeder {
    public function run() {
        $items = [
            ['title' => 'Welcome Aboard', 'description' => 'Joined the Fitness Portal', 'icon' => '👋'],
            ['title' => 'Profile Master', 'description' => 'Completed your fitness profile', 'icon' => '👤'],
            ['title' => 'Early Bird', 'description' => 'Logged your first workout', 'icon' => '🌅'],
            ['title' => 'Unstoppable', 'description' => 'Reached a 5-day workout streak', 'icon' => '🔥'],
            ['title' => 'Progress King', 'description' => 'Logged 7 days of weight progress', 'icon' => '👑'],
        ];
        foreach ($items as $item) { Achievement::updateOrCreate(['title' => $item['title']], $item); }
    }
}
