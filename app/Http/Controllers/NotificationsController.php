<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification; // Assurez-vous que le modèle Notification correspond à votre table

class NotificationsController extends Controller
{
    public function index()
    {
        $notifications = Notification::all();
        return view('notifications.index', compact('notifications'));
    }

    public function create()
    {
        return view('notifications.create');
    }

    public function store(Request $request)
    {
        // Validation des données
        $validatedData = $request->validate([
            'data' => 'required|json',
        ]);

        // Créez une nouvelle notification
        Notification::create($validatedData);

        return redirect()->route('notifications.index')->with('success', 'Notification créée avec succès');
    }

    public function show(Notification $notification)
    {
        return view('notifications.show', compact('notification'));
    }

    public function edit(Notification $notification)
    {
        return view('notifications.edit', compact('notification'));
    }

    public function update(Request $request, Notification $notification)
    {
        // Validation des données
        $validatedData = $request->validate([
            'data' => 'required|json',
        ]);

        $notification->update($validatedData);

        return redirect()->route('notifications.index')->with('success', 'Notification mise à jour avec succès');
    }

    public function destroy(Notification $notification)
    {
        $notification->delete();

        return redirect()->route('notifications.index')->with('success', 'Notification supprimée avec succès');
    }
}

