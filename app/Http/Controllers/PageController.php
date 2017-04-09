<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Logging;
use App\Instru;
use App\Question;
use App\Study;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;
//use App\Http\Controllers\AuthController;
use Log;

class PageController extends Controller
{

    public function studypage()
    {

        if (Auth::check()) {
            $user = Auth::user()->name;
            $data = Study::where('username', "$user")->get();
            return view('formprocess/studypage', compact('data'));
        }
    }

    public function storestudy(Request $request)
    {
        if (Auth::check()) {
            $input = $request->all();
            $study = $input['studyname'];
            $user = Auth::user()->name;


            DB::table('study')->insert([
                'username' => $user, 'studyname' => $study
            ]);
            $data = Study::where('username', "$user")->get();
            return view('formprocess/studypage', compact('data'));
        }
    }

    public function storeinstrument(Request $request, $studyname)
    {
        if (Auth::check()) {
            $input = $request->all();
            $instrument = $input['instrumentname'];
            $study = $studyname;


            DB::table('instruments')->insert([
                'instrumentname' => $instrument, 'studyname' => $study
            ]);
            $selectinstrus = Instru::where('studyname', "$studyname")->get();
            return view('formprocess/instrumentpage', compact('selectinstrus', 'studyname'));
        }
    }

    public function instrumentpage(Request $request)
    {

        if (isset($_POST['id'])) {

            $studyname = $_POST['id'];
            $selectinstrus = Instru::where('studyname', "$studyname")->get();
            return view('formprocess/instrumentpage', compact('selectinstrus', 'studyname'));
        } else {
            return view('formprocess/studypage');
        }
    }

    public function instruajax(Request $request)
    {
        $data = $request->all();
        $questiontext = $data['questiontext'];
        $questiontype = $data['questiontype'];
        $instrumentid = $data['instrumentid'];

        $questionid = DB::table('questions')->insertGetId([
            'questiontext' => $questiontext, 'questiontype' => $questiontype, 'instrumentid' => $instrumentid
        ]);

        return response($questionid);
    }

    public function answerajax(Request $request)
    {

        $data2 = $request->all();
        $arrayofanswers = explode('^@', $data2['data']);

        foreach ($arrayofanswers as $item) {
            DB::table('answers')->insert([
                'answertext' => $item , 'questionid' => $data2['questionid']
            ]);
        }
        return response('success');
    }
}
