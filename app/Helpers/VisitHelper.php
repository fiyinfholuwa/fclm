<?php

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

if (!function_exists('track_visit')) {
    function track_visit()
    {
        static $hasRun = false;
        if ($hasRun) return;
        $hasRun = true;

        try {
            $ip = request()->ip();
            $page = request()->path();

            $lastVisit = DB::table('visits')
                ->where('ip_address', $ip)
                ->where('page', $page)
                ->first();

            if ($lastVisit) {
                $lastTime = Carbon::parse($lastVisit->created_at);
                $now = now();

                if ($lastTime->greaterThan($now)) {
                    return; // don't insert
                }

                if ($now->diffInMinutes($lastTime) < 5) {
                    return;
                }
            }

            DB::table('visits')->insert([
                'ip_address' => $ip,
                'user_agent' => request()->userAgent(),
                'page' => $page,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        } catch (\Exception $e) {
            // \Log::error($e->getMessage());
        }
    }
}