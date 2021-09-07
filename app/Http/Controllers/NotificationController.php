<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Kutia\Larafirebase\Facades\Larafirebase;

class NotificationController extends Controller
{
    public static function sendNotificationNewFollower($user, $idDevice)
    {
        return Larafirebase::withTitle('Test Title')
            ->withBody('Nuevo seguidor')
            ->withImage($user->image)
            ->withClickAction('admin/notifications')
            ->withPriority('high')
            ->sendNotification($idDevice);
    }
}
