<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Kutia\Larafirebase\Facades\Larafirebase;

class NotificationController extends Controller
{
  public static function sendNotificationNewFollower($user, $idDevice)
  {
    if ($idDevice == null)
      return;
    return Larafirebase::withTitle('Nuevo seguidor')
      ->withBody("$user->name ha comenzado a seguirte!")
      ->withImage($user->image)
      ->withPriority('high')
      ->sendNotification($idDevice);
  }
}
