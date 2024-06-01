<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\AbsenceNotification;
use App\Models\DemandeCongeNotification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function delete(AbsenceNotification|DemandeCongeNotification $notification)
    {
        $notification->delete();
        return redirect()->back();
    }
}
