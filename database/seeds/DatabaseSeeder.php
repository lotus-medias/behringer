<?php

use App\Question;
use App\Reponse;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
	    Question::create([
		    'titre' => 'Micardis affinité pour les récepteurs AT1',
		    'enonce' => 'Saurez-vous  combien de sites de liaison aux récépteurs AT1 possède Micardis® dont la molécule est le telmisartan ? '
	    ]);
	    Question::create([
		    'titre' => 'Micardis demi-vie de dissociation aux récepteurs AT1',
		    'enonce' => 'Saurez-vous quelle est la demi-vie de dissociation aux récepteurs AT1 de Micardis® dont la molécule est le telmisartan? '
	    ]);
	    Question::create([
		    'titre' => 'Micardis demi-vie',
		    'enonce' => ' Saurez-vous quelle est la demi-vie de Micardis® dont la molécule est le telmisartan? '
	    ]);
	    Question::create([
		    'titre' => 'Micardis: Elimination rénale',
		    'enonce' => 'Saurez-vous quel est le taux d\'élimination rénale de Micardis® dont la molécule est le telmisartan? '
	    ]);
	    Question::create([
		    'titre' => 'Micardis volume de distribution',
		    'enonce' => 'Saurez-vous quel est le volume de distribution de Micardis® dont la molécule est le telmisartan? '
	    ]);

	    Reponse::create([
		    'question_id' => 1,
		    'ordre' => 1,
		    'enonce' => '2<br>sites<br>de liaison',
		    'est_juste' => false
	    ]);
	    Reponse::create([
		    'question_id' => 1,
		    'ordre' => 2,
		    'enonce' => '3<br>sites<br>de liaison',
		    'est_juste' => true
	    ]);
	    Reponse::create([
		    'question_id' => 1,
		    'ordre' => 3,
		    'enonce' => '1<br>site<br>de liaison',
		    'est_juste' => false
	    ]);

	    Reponse::create([
		    'question_id' => 2,
		    'ordre' => 1,
		    'enonce' => '<h3>70</h3> minutes',
		    'est_juste' => false
	    ]);
	    Reponse::create([
		    'question_id' => 2,
		    'ordre' => 2,
		    'enonce' => '<h3>133</h3> minutes',
		    'est_juste' => false
	    ]);
	    Reponse::create([
		    'question_id' => 2,
		    'ordre' => 3,
		    'enonce' => '<h3>213</h3> minutes',
		    'est_juste' => true
	    ]);

	    Reponse::create([
		    'question_id' => 3,
		    'ordre' => 1,
		    'enonce' => '<h3>6</h3> Heures',
		    'est_juste' => false
	    ]);
	    Reponse::create([
		    'question_id' => 3,
		    'ordre' => 2,
		    'enonce' => '<h3>24</h3> Heures',
		    'est_juste' => true
	    ]);
	    Reponse::create([
		    'question_id' => 3,
		    'ordre' => 3,
		    'enonce' => '<h3>11</h3> Heures',
		    'est_juste' => false
	    ]);
	    Reponse::create([
		    'question_id' => 4,
		    'ordre' => 1,
		    'enonce' => '<h3>40 %</h3>',
		    'est_juste' => false
	    ]);
	    Reponse::create([
		    'question_id' => 4,
		    'ordre' => 2,
		    'enonce' => '<h3>20 %</h3>',
		    'est_juste' => false
	    ]);
	    Reponse::create([
		    'question_id' => 4,
		    'ordre' => 3,
		    'enonce' => '<h3>< 1 %</h3>',
		    'est_juste' => true
	    ]);

	    Reponse::create([
		    'question_id' => 5,
		    'ordre' => 1,
		    'enonce' => '<h4>500 L</h4>',
		    'est_juste' => true
	    ]);
	    Reponse::create([
		    'question_id' => 5,
		    'ordre' => 2,
		    'enonce' => '<h4>53 L</h4>',
		    'est_juste' => false
	    ]);
	    Reponse::create([
		    'question_id' => 5,
		    'ordre' => 3,
		    'enonce' => '<h4>34 L</h4>',
		    'est_juste' => false
	    ]);
    }
}
