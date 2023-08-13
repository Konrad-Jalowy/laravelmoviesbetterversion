<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class StatsController extends Controller
{
    public function generalStats() {
        $this->authorize("view-admin-stats");
        $usersCount = User::all()->count();
        $activeUsersCount = User::where('is_active', 1)->count();
        $notActiveCount = $usersCount - $activeUsersCount;
        $adminsCount = User::where('is_admin', 1)->count();
        $moderatorsCount = User::where('is_moderator', 1)->count();
        $revieversCount = User::where('is_reviever', 1)->count();
        return "Users count: $usersCount";
    }
}
