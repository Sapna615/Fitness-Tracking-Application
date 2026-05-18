<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChatController extends Controller
{
    public function sendMessage(Request $request)
    {
        $message = strtolower($request->input('message', ''));
        $response = $this->generateResponse($message);

        return response()->json(['response' => $response]);
    }

    private function generateResponse($message)
    {
        // Improved keyword-based AI response logic
        
        // Weight Loss & Belly Fat
        if (Str::contains($message, ['lose weight', 'weight loss', 'loss weight', 'lose fat', 'belly fat', 'stomach fat'])) {
            return "To effectively lose weight and reduce body fat, I recommend a combination of:\n1. Caloric Deficit: Eating slightly fewer calories than you burn.\n2. Protein: Aim for 1.6g-2g of protein per kg of body weight.\n3. Cardio: 3-4 sessions of 30-minute brisk walking or HIIT.\n4. Strength Training: This helps keep your metabolism high!\nWould you like a sample meal idea for today? 🏃‍♂️";
        }

        // Abs
        if (Str::contains($message, ['abs', 'six pack', 'core'])) {
            return "Abs are mostly made in the kitchen! While crunches and planks strengthen the muscle, you need to lower your overall body fat percentage to see them. Focus on high-intensity workouts and clean eating. 🏋️‍♂️";
        }

        // Diet & Specific Meal requests
        if (Str::contains($message, ['give me diet', 'sample diet', 'what to eat', 'diet plan', 'meal plan'])) {
            return "A great starting point for a healthy day would be:\n- Breakfast: Oatmeal with berries and a scoop of protein powder.\n- Lunch: Grilled chicken breast with a large green salad and quinoa.\n- Snack: A Greek yogurt or an apple with almonds.\n- Dinner: Baked salmon or tofu with steamed broccoli and sweet potato. \nYou can find your full personalized plan in the 'Diet Plan' tab! 🥗";
        }

        // Frequency & Consistency
        if (Str::contains($message, ['how many days', 'workout frequency', 'how often', 'schedule'])) {
            return "For sustainable results, aim for 4-5 days of activity per week with 1-2 full rest days. Consistency is more important than intensity! Your current 'Workout Calendar' is already optimized for this. 📅";
        }

        // Muscle Gain
        if (Str::contains($message, ['muscle', 'gain', 'bulking', 'get big'])) {
            return "To build muscle, you need a 'Caloric Surplus' and plenty of protein. Focus on compound lifts like squats, deadlifts, and bench presses. Remember, muscles grow while you sleep, so get 7-8 hours of rest! 💪";
        }

        // Greetings
        if (Str::contains($message, ['hello', 'hi', 'hey', 'greetings', 'help'])) {
            return "Hi there! I'm your Fitness AI Assistant. I can help you with weight loss tips, sample diets, or workout advice. What's your main goal right now?";
        }

        // General fallback
        return "I'm here to help! It sounds like you're looking for fitness advice. Could you tell me more? For example, are you looking for a specific diet plan, or advice on how to lose weight faster?";
    }
}
