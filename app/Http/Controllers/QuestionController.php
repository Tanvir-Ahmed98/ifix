<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    function fetch_questions()
    { 
        $question=Question::get('qid');
        return response()->json([
[
                "questionsAndAnswerList"=>[
                "question1"=>[
                "qId"=>"454654654",
                "qData"=>"1. Does your phone has any dents?",
                "qType"=>"Single",
              
                "answerList1"=>[
                      "ansId"=>"494649463",
                      "ansData"=> "Yes",   
                ],
            ],
                "question2"=>[
                  "qId"=>"797463413",
                  "qData"=>"2. Does your phone have any parts issue?",
                  "qType"=>"Multiple",
                
                "answerList2"=>[
                    [
                      "ansId"=>"64613484",
                      "ansData"=>"Camera Problem",
                    ],
                    [
                      "ansId"=>"0341461",
                      "ansData"=> "Battery Problem",
                    ],
                    [
                      "ansId"=>"127527274",
                      "ansData"=> "Display Problem",
                    ]
                ],
            ]

        ]
]     
       ]);
    }
}
