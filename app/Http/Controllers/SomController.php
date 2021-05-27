<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $code)
    {
        $splittedCode = explode(",",$code);
        $kind = $splittedCode[0];
        $somCode = $splittedCode[1];
        //URL CHECK
        switch ($somCode) {
            case "010":
                $min = 0;
                $max = 10;
                break;
            case "050":
                $min = 0;
                $max = 50;
                break;
            case "0100":
                $min = 0;
                $max = 100;
                break;
            default:
                echo "Er is iets mis gegaan";
                exit;
        }

        function makeSom($operator, $min, $max){
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
        }
        //CHECK IF SOMMEN EXIST
        //JA
            //PAK ALLE SOMMEN 
        //NEE
            for($i=1; $i<11; $i++){
                makeSom($kind, $min, $max);
            }
            //PAK ALLE SOMMEN
        //RETURN ALLE SOMMEN
        return view('som');

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
