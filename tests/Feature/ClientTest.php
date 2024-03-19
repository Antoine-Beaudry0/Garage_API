<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;

use App\Models\Client;

use Tests\TestCase;

class ClientTest extends TestCase
{
/** @test */

public function it_returns_a_list_of_clients()
{
    $response = $this->getJson('/api/clients'); // Assurez-vous d'utiliser l'URL correcte
    $response->assertStatus(200)
             ->assertJsonStructure([
                 'data' => [
                     '*' => [
                         'id', 'nom', 'email', // ajoutez les autres champs attendus
                     ],
                 ],
             ]);
}
/** @test */
public function it_stores_a_new_client_successfully()
{
    $clientData = [
        'prenom' => 'John',
        'nom' => 'Doe',
        'email' => 'john123456@example.com',
        'password' => 'secretPassword',
    ];

    $response = $this->postJson('/api/clients', $clientData);
    $response->assertStatus(201)
             ->assertJson(['message' => 'Client créé avec succès']);
}
/** @test */
public function it_shows_a_specific_client_details()
{
    $client = Client::first(); // Ou créez un client spécifique pour le test
    $response = $this->getJson("/api/clients/{$client->id}");
    $response->assertStatus(200)
             ->assertJson([
                 'data' => [
                     'id' => $client->id,
                     'nom' => $client->nom,
                     // Ajoutez les autres champs attendus
                 ],
             ]);
}
/** @test */
public function it_updates_a_client_successfully()
{
    $client = Client::first(); // Ou créez un client spécifique pour le test

    $updatedData = [
        'prenom' => 'Antoine',
        'nom' => 'Beaudry',
        'email' => 'email@example.com',
        'password' => 'Password'
    ];

    $response = $this->putJson("/api/clients/{$client->id}", $updatedData);
    $response->assertStatus(200)
             ->assertJson(['message' => 'Client mis à jour avec succès']);
}
/** @test */
public function it_deletes_a_client_successfully()
{
    $client = Client::first(); // Ou créez un client spécifique pour le test

    $response = $this->deleteJson("/api/clients/{$client->id}");
    $response->assertStatus(200)
             ->assertJson(['message' => 'Client supprimé avec succès']);
}
/** @test */
public function it_logs_in_a_client_successfully()
{
    $client = Client::create([
        'prenom' => 'John',
        'nom' => 'Doe',
        'email' => 'emails@example.com',
        'telephone' => '8198554444',
        'adresse' => '1212 Rue Des Tournesol',
        'password' => Hash::make('password'),
        // autres champs nécessaires
    ]);

    $loginData = ['email' => 'john@example.com', 'password' => 'password'];
    $response = $this->postJson('/api/login', $loginData);
    $response->assertStatus(200)
             ->assertJsonStructure(['token', 'client']);
}

}
