<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Carbon\Carbon;
use App\Models\Client;

class ClientTest extends TestCase
{
    /** @test */
    public function client_factory_works()
    {
        $client = \App\Models\Client::factory()->create();
        
        $this->assertModelExists($client);
    }

    public function testIndexReturnsAllClients()
    {
        Client::factory()->count(3)->create();

        $response = $this->getJson('/api/clients');

        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data' => [
                         '*' => [
                             'id',
                             'prenom',
                             'nom',
                             'email',
                             'telephone',
                             'adresse'
                         ],
                     ],
                 ]);
    }

    public function testStoreCreatesNewClient()
    {
        $clientData = [
            'prenom' => 'Jean',
            'nom' => 'Dupont',
            'email' => 'example@siteweb.com',
            'password' => 'password',
            'telephone' => '0123456789',
            'adresse' => '123 rue de Paris',
        ];

        $response = $this->postJson('/api/clients', $clientData);

        $response->assertStatus(201)
                ->assertJson(function ($json) {
                    $json->where('message', 'Client créé avec succès')
                        ->where('data.prenom', 'Jean')
                        ->where('data.nom', 'Dupont')
                        ->where('data.email', 'example@siteweb.com')
                        ->where('data.telephone', '0123456789')
                        ->where('data.adresse', '123 rue de Paris')
                        ->etc();
                });

        // Vérification supplémentaire pour s'assurer que le client est bien créé dans la base de données
        $this->assertDatabaseHas('clients', [
            'email' => 'example@siteweb.com',
            'prenom' => 'Jean',
            'nom' => 'Dupont',
        ]);
    }
    
    public function testShowReturnsClientDetails()
    {
        $client = Client::factory()->create();

        $response = $this->getJson('/api/clients/'.$client->id);

        $response->assertStatus(200)
                 ->assertJson([
                     'data' => [
                         'id' => $client->id,
                         // ajoute d'autres vérifications nécessaires
                     ],
                 ]);
    }
    public function testUpdateModifiesExistingClient()
    {
        $client = Client::factory()->create();

        $updateData = [
            'prenom' => 'Paul',
            // ajoute d'autres champs à mettre à jour si nécessaire
        ];

        $response = $this->putJson('/api/clients/'.$client->id, $updateData);

        $response->assertStatus(200)
                 ->assertJson([
                     'message' => 'Client mis à jour avec succès',
                     // Ajoute des vérifications pour les données mises à jour si nécessaire
                 ]);
    }
    public function testDestroyDeletesClient()
    {
        $client = Client::factory()->create();

        $response = $this->deleteJson('/api/clients/'.$client->id);

        $response->assertStatus(200)
                 ->assertJson(['message' => 'Client supprimé avec succès']);

        $this->assertDatabaseMissing('clients', ['id' => $client->id]);
    }
}