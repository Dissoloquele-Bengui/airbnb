<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        /*\App\Models\User::create([
            'name'=>"Administrador",
            'email'=>"Admnistrador@disso.com",
            'password'=>Hash::make("12345678"),
            'nivel'=>"Administrador",
        ]);*/
        $hospitais = [
            [
                'nome' => 'Hospital Geral Luanda',
                'rua' => 'Desvio do Camama',
                'bairro' => 'Camama',
                'municipio' => 'Luanda',
                'latitude' => -8.838333, // Latitude aproximada (necessita confirmação)
                'longitude' => 13.225, // Longitude aproximada (necessita confirmação)
                'provincia' => 'Luanda',
                'url' => 'https://maps.google.com/?cid=5784978115292450546',
                'horário_funcionamento' => 'Atendimento 24 horas, todos os dias',
                'avaliacao' => 2.6,
            ],
            [
                'nome' => 'Hospital Josina Machel',
                'rua' => 'Largo Josina Machel',
                'bairro' => 'Luanda',
                'municipio' => 'Luanda',
                'latitude' => -8.840833, // Latitude aproximada (necessita confirmação)
                'longitude' => 13.224167, // Longitude aproximada (necessita confirmação)
                'provincia' => 'Luanda',
                'url' => 'https://www.facebook.com/profile.php?id=197170703688041&paipv=0&eav=AfZSAy4Nq_uaXtH9dwfz2x9S-fhhjZdxYiVr0T8RQXSkMD7l1XInV5XTd3cO20Ap7FU&_rdr',
                'horário_funcionamento' => 'Atendimento 24 horas, todos os dias',
                'avaliacao' => 3.5,
                'telefone' => '+244 222 336 346',
            ],
            [
                'nome' => 'Hospital Sanatório',
                'rua' => 'Av. Pedro de Castro Van-Dúnem Loy',
                'bairro' => 'Luanda',
                'municipio' => 'Luanda',
                'latitude' => -8.8425, // Latitude aproximada (necessita confirmação)
                'longitude' => 13.225833, // Longitude aproximada (necessita confirmação)
                'provincia' => 'Luanda',
                'url' => 'https://www.facebook.com/ComplexoHospitalar.CDAN/',
                'horário_funcionamento' => 'Atendimento 24 horas, todos os dias',
                'avaliacao' => 4,
                'telefone' => '+244 930 626 230',
            ],
            [
                'nome' => 'Hospital Militar Central',
                'rua' => 'Rua da Missão',
                'bairro' => 'Ingombota',
                'municipio' => 'Luanda',
                'latitude' => -8.843333, // Latitude aproximada (necessita confirmação)
                'longitude' => 13.23, // Longitude aproximada (necessita confirmação)
                'provincia' => 'Luanda',
                'url' => 'https://maps.google.com/?cid=11925203343986131163',
                'horário_funcionamento' => 'Atendimento 24 horas, todos os dias',
                'avaliacao' => 3.8,
                'telefone' => '+244 222 370 750',
            ],
            [
                'nome' => 'Hospital Municipal da Samba',
                'rua' => 'Av. Pedro de Castro Van-Dúnem Loy',
                'bairro' => 'Luanda',
                'municipio' => 'Luanda',
                'latitude' => -8.844167, // Latitude aproximada (necessita confirmação)
                'longitude' => 13.226667, // Longitude aproximada (necessita confirmação)
                'provincia' => 'Luanda',
            ],
        ];
        foreach($hospitais as $hospital){
            \App\Models\Hospital::create([
                'nome' => $hospital['nome'],
                'rua' => $hospital['rua'],
                'bairro' => $hospital['bairro'],
                'municipio' => $hospital['municipio'],
                'latitude' => $hospital['latitude'],
                'longitude' => $hospital['longitude'],
                'provincia' => $hospital['provincia'],
            ]);
        }
        // Array com os nomes das fases
        /*$fases = [
            'Fase de Grupos',
            'Oitavas de Final',
            'Quartas de Final',
            'Semifinais',
            'Final'
        ];*/

        // Loop para criar instâncias de Epoca para cada fase
        /*foreach ($fases as $nomeFase) {
            \App\Models\Epoca::create([
                'nome' => $nomeFase,
            ]);
        }*/

    }
}
