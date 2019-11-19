<?php

namespace App\Http\Controllers;

use App\Participant;
use App\Participation;
use App\Question;
use App\Reponse;
use Illuminate\Http\Request;

class QuizController extends Controller
{
	public function index() {
		$question = Question::find(1);
		return view('index',compact('question'));
    }

	public function createParticipant ( Request $request  ) {
		$participant = Participant::create($request->all());
		return response()->json([
			'id' => $participant->id
		]);
    }

	public function sendAnswer( Request $request ) {

		$reponse = Reponse::where('question_id',$request->question)->where('ordre',$request->reponse)->first();
		Participation::create([
			'participant_id' => $request->participant,
			'reponse_id' => $reponse->id,
			'est_juste' => $reponse->est_juste
		]);

		if($request->question == 5) {
			return response()->json([
				'html' => view('quiz-end',[
					'participant' => Participant::find($request->participant)
				])->render()
			]);
		}

		else {
			$question = Question::find($request->question + 1);
		}



		$html = view('question-show',compact('question'));

		return response()->json([
			'html' => $html->render()
		]);
    }
}
