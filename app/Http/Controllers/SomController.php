<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Assignment;

class SomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $code)
    {
        $user = Auth::user();
        function makeSom($operator, $batch, $min, $max){
            switch ($operator) {
                case "+":
                    $random1 = rand($min, $max);
                    $random2 = rand($min, $max);

                    $somString = $random1.' + '.$random2;
                    $result = $random1 + $random2;

                    
                    break;
                case "-":
                    $random1 = rand($min, $max);
                    $random2 = rand($min, $max);
                    if($random1 > $random2){
                        $somString = $random1.' - '.$random2;
                        $result = $random1 - $random2;
                    }else{
                        $somString = $random2.' - '.$random1;
                        $result = $random2 - $random1;
                    }
                    break;
                case ":":
                    $random1 = rand($min, $max);
                    $random2 = rand($min, $max);

                    $somString = $random1.' : '.$random2;
                    $result = $random1 / $random2;
                    break;
                case "x":
                    $random1 = rand($min, $max);
                    $random2 = rand($min, $max);

                    $somString = $random1.' x '.$random2;
                    $result = $random1 * $random2;
                    break;
                default:
                    echo "Er is iets mis gegaan";
                    exit;
            }
            $assignment = new Assignment(['user_id' => Auth::user()->id,'batch' => $batch, 'somkind' => $operator,'somstring' => $somString,'result' => $result]);
            $assignment->save();
        }

        if($user->group == 4){
            $min = 0;
            $max = 10;
        }elseif($user->group == 5){
            $min = 0;
            $max = 50;
        }elseif($user->group == 6){
            $min = 0;
            $max = 100;
        }
        $kind = $code;

        $currentBatch = Assignment::where('user_id', $user->id)->where('somkind', $kind)->where('answerresult', NULL)->first();
        if($currentBatch == NULL){
            //Als er geen openstaande vragen meer zijn
            $lastBatch = Assignment::where('user_id', $user->id)->where('somkind', $kind)->where('user_id', $user->id)->first();
            if($lastBatch == NULL){
                //als er nog nooit vragen gemaakt zijn
                $batch = 1;
            }else{
                //als er wel al ooit vragen waren gemaakt
                $lastBatch = $lastBatch->batch;
                $batch = $lastBatch + 1;
            }
            for($i=1; $i<11; $i++){
                makeSom($kind,$batch, $min, $max);
            }

        }else{
            //Als er nog openstaande vragen zijn
            $batch = $currentBatch->batch;

        }
        $alleSommen = Assignment::where('somkind', $kind)->where('user_id', $user->id)->where('batch', $batch)->get();
        $currentSom = Assignment::where('somkind', $kind)->where('user_id', $user->id)->where('batch', $batch)->where('answer', NULL)->first();
        return view('som',[
            'alleSommen' => $alleSommen,
            'currentSom' => $currentSom,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
