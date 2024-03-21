<?php

namespace Database\Seeders;use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RendezVousSeeder extends Seeder
{
    public function run()
    {
        DB::table('rendezVous')->insert([
            [
                'dateHeureDebut' => '2024-01-10T15:00:00.000Z',
                'dateHeureFin' => '2024-01-10T15:20:00.000Z',
                'commentaire' => 'Contrôle technique',
                'notificationEnvoye' => true,
                'services' => json_encode([
                    [
                        "prix" => "50",
                        "type" => "prestation",
                        "temps" => "45",
                        "titre" => "Changements pneus",
                        "chosen" => false,
                        "position" => 1,
                        "id_prestation" => 109
                    ],
                    [
                        "prix" => "150",
                        "type" => "prestation",
                        "temps" => "60",
                        "titre" => "Amortisseurs",
                        "chosen" => false,
                        "position" => 2,
                        "id_prestation" => 106
                    ],
                    [
                        "prix" => "80",
                        "type" => "prestation",
                        "temps" => "120",
                        "titre" => "Verification globale",
                        "chosen" => false,
                        "position" => 3,
                        "id_prestation" => 104
                    ]
                ]),
                'id_Voiture' => '1',
                'id_Statut' => '1',
                'id_PageGarage' => '1',
            ],
            [
                'dateHeureDebut' => '2024-02-15T15:00:00.000Z',
                'dateHeureFin' => '2024-02-15T15:20:00.000Z',
                'commentaire' => 'Révision moteur',
                'notificationEnvoye' => false,
                'services' => json_encode([
                    [
                        "prix" => "50",
                        "type" => "prestation",
                        "temps" => "45",
                        "titre" => "Changements pneus",
                        "chosen" => false,
                        "position" => 1,
                        "id_prestation" => 109
                    ],
                    [
                        "prix" => "150",
                        "type" => "prestation",
                        "temps" => "60",
                        "titre" => "Amortisseurs",
                        "chosen" => false,
                        "position" => 2,
                        "id_prestation" => 106
                    ],
                    [
                        "prix" => "80",
                        "type" => "prestation",
                        "temps" => "120",
                        "titre" => "Verification globale",
                        "chosen" => false,
                        "position" => 3,
                        "id_prestation" => 104
                    ]
                ]),
                'id_Voiture' => '2',
                'id_Statut' => '2',
                'id_PageGarage' => '2',
            ],
            [
                'dateHeureDebut' => '2024-03-20T15:00:00.000Z',
                'dateHeureFin' => '2024-03-20T15:20:00.000Z',
                'commentaire' => 'Changement de pneus',
                'notificationEnvoye' => true,
                'services' => json_encode([
                    [
                        "prix" => "50",
                        "type" => "prestation",
                        "temps" => "45",
                        "titre" => "Changements pneus",
                        "chosen" => false,
                        "position" => 1,
                        "id_prestation" => 109
                    ],
                    [
                        "prix" => "150",
                        "type" => "prestation",
                        "temps" => "60",
                        "titre" => "Amortisseurs",
                        "chosen" => false,
                        "position" => 2,
                        "id_prestation" => 106
                    ],
                    [
                        "prix" => "80",
                        "type" => "prestation",
                        "temps" => "120",
                        "titre" => "Verification globale",
                        "chosen" => false,
                        "position" => 3,
                        "id_prestation" => 104
                    ]
                ]),
                'id_Voiture' => '3',
                'id_Statut' => '3',
                'id_PageGarage' => '3',
            ],
            [
                'dateHeureDebut' => '2024-04-25T15:00:00.000Z',
                'dateHeureFin' => '2024-04-25T15:20:00.000Z',
                'commentaire' => 'Peinture carrosserie',
                'notificationEnvoye' => false,
                'services' => json_encode([
                    [
                        "prix" => "50",
                        "type" => "prestation",
                        "temps" => "45",
                        "titre" => "Changements pneus",
                        "chosen" => false,
                        "position" => 1,
                        "id_prestation" => 109
                    ],
                    [
                        "prix" => "150",
                        "type" => "prestation",
                        "temps" => "60",
                        "titre" => "Amortisseurs",
                        "chosen" => false,
                        "position" => 2,
                        "id_prestation" => 106
                    ],
                    [
                        "prix" => "80",
                        "type" => "prestation",
                        "temps" => "120",
                        "titre" => "Verification globale",
                        "chosen" => false,
                        "position" => 3,
                        "id_prestation" => 104
                    ]
                ]),
                'id_Voiture' => '4',
                'id_Statut' => '4',
                'id_PageGarage' => '4',
            ],
            [
                'dateHeureDebut' => '2024-05-30T15:00:00.000Z',
                'dateHeureFin' => '2024-05-30T15:20:00.000Z',
                'commentaire' => 'Vérification freins',
                'notificationEnvoye' => true,
                'services' => json_encode([
                    [
                        "prix" => "50",
                        "type" => "prestation",
                        "temps" => "45",
                        "titre" => "Changements pneus",
                        "chosen" => false,
                        "position" => 1,
                        "id_prestation" => 109
                    ],
                    [
                        "prix" => "150",
                        "type" => "prestation",
                        "temps" => "60",
                        "titre" => "Amortisseurs",
                        "chosen" => false,
                        "position" => 2,
                        "id_prestation" => 106
                    ],
                    [
                        "prix" => "80",
                        "type" => "prestation",
                        "temps" => "120",
                        "titre" => "Verification globale",
                        "chosen" => false,
                        "position" => 3,
                        "id_prestation" => 104
                    ]
                ]),
                'id_Voiture' => '5',
                'id_Statut' => '1',
                'id_PageGarage' => '5',
            ],
            [
                'dateHeureDebut' => '2024-06-04T15:00:00.000Z',
                'dateHeureFin' => '2024-06-04T15:20:00.000Z',
                'commentaire' => 'Réglage des phares',
                'notificationEnvoye' => false,
                'services' => json_encode([
                    [
                        "prix" => "50",
                        "type" => "prestation",
                        "temps" => "45",
                        "titre" => "Changements pneus",
                        "chosen" => false,
                        "position" => 1,
                        "id_prestation" => 109
                    ],
                    [
                        "prix" => "150",
                        "type" => "prestation",
                        "temps" => "60",
                        "titre" => "Amortisseurs",
                        "chosen" => false,
                        "position" => 2,
                        "id_prestation" => 106
                    ],
                    [
                        "prix" => "80",
                        "type" => "prestation",
                        "temps" => "120",
                        "titre" => "Verification globale",
                        "chosen" => false,
                        "position" => 3,
                        "id_prestation" => 104
                    ]
                ]),
                'id_Voiture' => '6',
                'id_Statut' => '2',
                'id_PageGarage' => '6',
            ],
            [
                'dateHeureDebut' => '2024-07-09T15:00:00.000Z',
                'dateHeureFin' => '2024-07-09T15:20:00.000Z',
                'commentaire' => 'Installation système GPS',
                'notificationEnvoye' => true,
                'services' => json_encode([
                    [
                        "prix" => "50",
                        "type" => "prestation",
                        "temps" => "45",
                        "titre" => "Changements pneus",
                        "chosen" => false,
                        "position" => 1,
                        "id_prestation" => 109
                    ],
                    [
                        "prix" => "150",
                        "type" => "prestation",
                        "temps" => "60",
                        "titre" => "Amortisseurs",
                        "chosen" => false,
                        "position" => 2,
                        "id_prestation" => 106
                    ],
                    [
                        "prix" => "80",
                        "type" => "prestation",
                        "temps" => "120",
                        "titre" => "Verification globale",
                        "chosen" => false,
                        "position" => 3,
                        "id_prestation" => 104
                    ]
                ]),
                'id_Voiture' => '7',
                'id_Statut' => '3',
                'id_PageGarage' => '1',
            ],
            [
                'dateHeureDebut' => '2024-08-14T15:00:00.000Z',
                'dateHeureFin' => '2024-08-14T15:20:00.000Z',
                'commentaire' => 'Entretien climatisation',
                'notificationEnvoye' => false,
                'services' => json_encode([
                    [
                        "prix" => "50",
                        "type" => "prestation",
                        "temps" => "45",
                        "titre" => "Changements pneus",
                        "chosen" => false,
                        "position" => 1,
                        "id_prestation" => 109
                    ],
                    [
                        "prix" => "150",
                        "type" => "prestation",
                        "temps" => "60",
                        "titre" => "Amortisseurs",
                        "chosen" => false,
                        "position" => 2,
                        "id_prestation" => 106
                    ],
                    [
                        "prix" => "80",
                        "type" => "prestation",
                        "temps" => "120",
                        "titre" => "Verification globale",
                        "chosen" => false,
                        "position" => 3,
                        "id_prestation" => 104
                    ]
                ]),
                'id_Voiture' => '8',
                'id_Statut' => '4',
                'id_PageGarage' => '2',
            ],
            [
                'dateHeureDebut' => '2024-09-19T15:00:00.000Z',
                'dateHeureFin' => '2024-09-19T15:20:00.000Z',
                'commentaire' => 'Réparation système audio',
                'notificationEnvoye' => true,
                'services' => json_encode([
                    [
                        "prix" => "50",
                        "type" => "prestation",
                        "temps" => "45",
                        "titre" => "Changements pneus",
                        "chosen" => false,
                        "position" => 1,
                        "id_prestation" => 109
                    ],
                    [
                        "prix" => "150",
                        "type" => "prestation",
                        "temps" => "60",
                        "titre" => "Amortisseurs",
                        "chosen" => false,
                        "position" => 2,
                        "id_prestation" => 106
                    ],
                    [
                        "prix" => "80",
                        "type" => "prestation",
                        "temps" => "120",
                        "titre" => "Verification globale",
                        "chosen" => false,
                        "position" => 3,
                        "id_prestation" => 104
                    ]
                ]),
                'id_Voiture' => '9',
                'id_Statut' => '1',
                'id_PageGarage' => '3',
            ],
            [
                'dateHeureDebut' => '2024-10-24T15:00:00.000Z',
                'dateHeureFin' => '2024-10-24T15:20:00.000Z',
                'commentaire' => 'Remplacement batterie',
                'notificationEnvoye' => false,
                'services' => json_encode([
                    [
                        "prix" => "50",
                        "type" => "prestation",
                        "temps" => "45",
                        "titre" => "Changements pneus",
                        "chosen" => false,
                        "position" => 1,
                        "id_prestation" => 109
                    ],
                    [
                        "prix" => "150",
                        "type" => "prestation",
                        "temps" => "60",
                        "titre" => "Amortisseurs",
                        "chosen" => false,
                        "position" => 2,
                        "id_prestation" => 106
                    ],
                    [
                        "prix" => "80",
                        "type" => "prestation",
                        "temps" => "120",
                        "titre" => "Verification globale",
                        "chosen" => false,
                        "position" => 3,
                        "id_prestation" => 104
                    ]
                ]),
                'id_Voiture' => '10',
                'id_Statut' => '2',
                'id_PageGarage' => '4',

            ]
        ]);
    }
}
