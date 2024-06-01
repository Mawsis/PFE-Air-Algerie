<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\AbsenceNotification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function delete(AbsenceNotification $notification)
    {
        $notification->delete();
        return redirect()->back();
    }
}
