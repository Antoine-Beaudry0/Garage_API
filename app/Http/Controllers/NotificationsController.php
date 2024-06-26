<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\Client;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificationEmail;


class NotificationsController extends Controller
{
    public function index()
    {
        $notifications = Notification::all();
        return response()->json($notifications);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'data' => 'required|json',
        ]);

        $notification = Notification::create($validatedData);

        return response()->json($notification, 201);
    }

    public function show(Notification $notification)
    {
        return response()->json($notification);
    }

    public function update(Request $request, Notification $notification)
    {
        $validatedData = $request->validate([
            'data' => 'required|json',
        ]);

        $notification->update($validatedData);

        return response()->json($notification);
    }

    public function destroy(Notification $notification)
    {
        $notification->delete();

        return response()->json(null, 204);
    }

    public function sendEmail(Request $request, $notificationId)
    {
        $notification = Notification::findOrFail($notificationId);
        $notificationData = json_decode($notification->data, true);
        $clientEmail = Client::findOrFail($notification->id_client)->email; // Assurez-vous que votre modèle Client a un attribut email

        Mail::to($clientEmail)->send(new NotificationEmail($notificationData));

        return response()->json(['message' => 'Email envoyé avec succès']);
    }

    public function sendEmailToClient($clientId, $notificationId)
    {
        $client = Client::findOrFail($clientId);
        $notification = Notification::findOrFail($notificationId);
        $notificationData = json_decode($notification->data, true);

        Mail::to('antobeaudry@gmail.com')->send(new NotificationEmail($notificationData));

        return "Email envoyé au client avec succès.";
    }

}
