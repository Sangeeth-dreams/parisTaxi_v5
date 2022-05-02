<?php

namespace App\Http\Controllers\Admin;
use App\Models\FAQ;
use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function index()
    {
            
        return FAQ::where('deleted', '=', '0')->get();
    }

    public function store(Request $request){
        
        //dd($request->all());

        $request->validate([
            
            'question' => 'required',
            'answer' => 'required',
            
        ]);

        try{

                $faqs['question'] = $request->question;
                $faqs['answer'] = $request->answer;

                $result = FAQ::create($faqs);


                if ($result) {
                    return 1;
                } else {
                    return 0;
                }

            } catch (Exception $ex) {
                return $ex;
            }

    }

    public function update(Request $request)
    {

        

        $request->validate([
            'id' => 'required',
        ]);

        try {

            $id = $request->id;
            $active = $request->active;
            $answers = $request->answer;
            $questions = $request->question;


            // dd($request->all());

            $faqs_save = FAQ::where('id', $id)
                ->update([
                    'active' => $active,
                    'question' => $questions,
                    'answer' => $answers,

                ]);


            if ($faqs_save) {
                return 1;
            } else {
                return 0;
            }
        } catch (Exception $e) {
            return $e;
        }
    }

    public function destroy(Request $request)
    {

        $request->validate([
            'id' => 'required'
        ]);

        try {
            $faq = FAQ::find($request->id);
            $delete = FAQ::where('id', $request->id)->update(['deleted' => 1]);
            error_log($delete);
            if ($delete) {
                return 1;
            } else {
                return 0;
            }
        } catch (Exception $e) {
            return $e;
        }
    }

}



