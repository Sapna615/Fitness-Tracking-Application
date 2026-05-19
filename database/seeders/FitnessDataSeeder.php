<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Workout;
use App\Models\Exercise;
use App\Models\WorkoutPlan;
use App\Models\User;

class FitnessDataSeeder extends Seeder
{
    public function run()
    {
        // Skip if workouts already exist (prevents duplicate seeding on every deploy)
        if (Workout::count() > 0) {
            echo "Workouts already exist, skipping FitnessDataSeeder.\n";
            return;
        }

        // Create all 12 core exercises
        $exercisesData = [
            // Chest
            ['name' => 'Bench Press', 'muscle_group' => 'Chest', 'video_url' => 'https://www.youtube.com/watch?v=rT7DgCr-3pg&t=4s', 'instructions' => 'Lie flat on a bench, grip the barbell slightly wider than shoulder-width, lower the bar slowly to your chest, then press it back up while keeping your chest active.'],
            ['name' => 'Push-ups', 'muscle_group' => 'Chest', 'video_url' => 'https://www.youtube.com/watch?v=IODxDxX7oi4', 'instructions' => 'Start in a high plank position. Keep your neck and back straight as you lower your body until your chest almost touches the floor, then push back up.'],
            ['name' => 'Incline Dumbbell Press', 'muscle_group' => 'Chest', 'video_url' => 'https://www.youtube.com/watch?v=8iPEnn-ltC8', 'instructions' => 'Sit on an incline bench. Press dumbbells straight up over your chest, keeping shoulders down, and slowly lower until dumbbells are at chest level.'],
            // Legs
            ['name' => 'Squats', 'muscle_group' => 'Legs', 'video_url' => 'https://www.youtube.com/watch?v=xuf1czJv-XI', 'instructions' => 'Stand feet shoulder-width apart. Keep your chest up and core engaged. Hinge back at the hips and lower into a deep squat, then push through heels to stand.'],
            ['name' => 'Lunges', 'muscle_group' => 'Legs', 'video_url' => 'https://www.youtube.com/watch?v=MxfTNXSFiYI', 'instructions' => 'Step forward with one leg. Lower hips until both knees are bent at a 90-degree angle, keeping your torso straight, then push back up to the starting position.'],
            ['name' => 'Deadlifts', 'muscle_group' => 'Legs', 'video_url' => 'https://www.youtube.com/watch?v=op9kVnSso6Q', 'instructions' => 'Hinge at your hips with a flat back. Grip the barbell, engage your lats, and pull through your heels to stand upright, squeezing your glutes at the top.'],
            // Core
            ['name' => 'Plank', 'muscle_group' => 'Core', 'video_url' => 'https://www.youtube.com/watch?v=ASdvN_XEl_c', 'instructions' => 'Hold a push-up position but with your weight resting on your forearms. Squeeze your core, glutes, and legs, keeping your body perfectly straight.'],
            ['name' => 'Crunches', 'muscle_group' => 'Core', 'video_url' => 'https://www.youtube.com/watch?v=0t4t3IpiEao', 'instructions' => 'Lie flat on your back, knees bent. Place hands gently behind your head, and contract your abs to lift your upper shoulder blades off the floor.'],
            ['name' => 'Russian Twists', 'muscle_group' => 'Core', 'video_url' => 'https://www.youtube.com/watch?v=DJQGX2J4IVw', 'instructions' => 'Sit on the floor, lean back slightly, and lift your feet. Hold your hands together and rotate your torso and hands from side to side.'],
            // Back
            ['name' => 'Pull-ups', 'muscle_group' => 'Back', 'video_url' => 'https://www.youtube.com/watch?v=eGo4IYlbE5g', 'instructions' => 'Grip pull-up bar with hands wider than shoulder-width. Pull your shoulder blades down and pull your chest to the bar, then slowly control your descent.'],
            ['name' => 'Bent Over Rows', 'muscle_group' => 'Back', 'video_url' => 'https://www.youtube.com/watch?v=Cds8s4aaHXo', 'instructions' => 'Hinge forward at the hips with knees slightly bent. Pull the barbell towards your lower ribs while keeping your spine straight and squeezing your back muscles.'],
            ['name' => 'Lat Pulldowns', 'muscle_group' => 'Back', 'video_url' => 'https://www.youtube.com/watch?v=AOpi-p0cJkc', 'instructions' => 'Sit at the pulldown station. Pull the bar down to your upper chest, squeezing your shoulder blades together and keeping your torso upright.']
        ];

        $exercises = [];
        foreach ($exercisesData as $exData) {
            $exercises[$exData['name']] = Exercise::create($exData);
        }

        // Create the day-specific workouts
        $workoutsData = [
            'Monday' => [
                'title' => 'Chest & Triceps Workout',
                'description' => 'Bench press, pushups, tricep dips',
                'difficulty_level' => 'Intermediate',
                'sets' => 4,
                'reps' => 10,
                'exercise_names' => ['Bench Press', 'Push-ups', 'Incline Dumbbell Press']
            ],
            'Tuesday' => [
                'title' => 'Leg Day Training',
                'description' => 'Squats, lunges, calf raises',
                'difficulty_level' => 'Intermediate',
                'sets' => 4,
                'reps' => 12,
                'exercise_names' => ['Squats', 'Lunges', 'Deadlifts']
            ],
            'Wednesday' => [
                'title' => 'Yoga & Core Stability',
                'description' => 'Stretching, planks, breathing exercises',
                'difficulty_level' => 'Beginner',
                'sets' => 3,
                'reps' => 30,
                'exercise_names' => ['Plank', 'Crunches', 'Russian Twists']
            ],
            'Thursday' => [
                'title' => 'Back & Biceps Workout',
                'description' => 'Pull-ups, rows, bicep curls',
                'difficulty_level' => 'Intermediate',
                'sets' => 4,
                'reps' => 10,
                'exercise_names' => ['Pull-ups', 'Bent Over Rows', 'Lat Pulldowns']
            ],
            'Friday' => [
                'title' => 'HIIT Cardio Session',
                'description' => 'Jump rope, burpees, mountain climbers',
                'difficulty_level' => 'Advanced',
                'sets' => 5,
                'reps' => 40,
                'exercise_names' => ['Push-ups', 'Plank', 'Squats']
            ],
            'Saturday' => [
                'title' => 'Shoulders & Abs',
                'description' => 'Shoulder press, lateral raises, crunches',
                'difficulty_level' => 'Intermediate',
                'sets' => 4,
                'reps' => 12,
                'exercise_names' => ['Plank', 'Crunches', 'Russian Twists']
            ]
        ];

        $createdWorkouts = [];
        foreach ($workoutsData as $day => $data) {
            $workout = Workout::create([
                'title' => $data['title'],
                'description' => $data['description'],
                'difficulty_level' => $data['difficulty_level']
            ]);

            // Sync exercises with the workout
            $exIds = [];
            foreach ($data['exercise_names'] as $exName) {
                if (isset($exercises[$exName])) {
                    $exIds[] = $exercises[$exName]->id;
                }
            }
            $workout->exercises()->sync($exIds);

            $createdWorkouts[$day] = $workout;
        }

        // Assign workout plans to ALL existing users
        $users = User::all();
        foreach ($users as $user) {
            // Skip if user already has workout plans
            if (WorkoutPlan::where('user_id', $user->id)->count() > 0) {
                continue;
            }

            foreach ($workoutsData as $day => $data) {
                WorkoutPlan::create([
                    'user_id' => $user->id,
                    'workout_id' => $createdWorkouts[$day]->id,
                    'day' => $day,
                    'sets' => $data['sets'],
                    'reps' => $data['reps']
                ]);
            }
            echo "Workout plans seeded for user: {$user->email}\n";
        }

        echo "FitnessDataSeeder completed successfully.\n";
    }
}
