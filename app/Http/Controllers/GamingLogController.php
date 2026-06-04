<?php

namespace App\Http\Controllers;

use App\Models\GamingLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;

class GamingLogController extends BaseController
{
    public function index()
    {
        $logs = GamingLog::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('gaming-log', compact('logs'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'game_title' => 'required|string|max:255',
                'device' => 'required|string|max:255',
                'hours' => 'required|integer|min:0',
                'rating' => 'required|string|max:10',
                'comments' => 'nullable|string'
            ]);

            $log = GamingLog::create([
                'user_id' => Auth::id(),
                'game_title' => $request->game_title,
                'device' => $request->device,
                'hours' => $request->hours,
                'rating' => $request->rating,
                'comments' => $request->comments
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Game added successfully!',
                'log' => $log
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $log = GamingLog::where('user_id', Auth::id())->findOrFail($id);
            
            $validated = $request->validate([
                'game_title' => 'required|string|max:255',
                'device' => 'required|string|max:255',
                'hours' => 'required|integer|min:0',
                'rating' => 'required|string|max:10',
                'comments' => 'nullable|string'
            ]);

            $log->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Game updated successfully!',
                'log' => $log
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $log = GamingLog::where('user_id', Auth::id())->findOrFail($id);
            $log->delete();

            return response()->json([
                'success' => true,
                'message' => 'Game deleted successfully!'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}