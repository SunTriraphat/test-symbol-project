<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShortRequest;
use App\Models\static_val;
use Illuminate\Http\Request;

class CalculateController extends Controller
{
    //

    public function cal(ShortRequest $request)
    {

        $explode = str_split($request->input_val);
        $data = static_val::get();
        $sum = 0;
        $numPlus = 0;
        $display_array = [];

        
        for ($i = 0; $i < count($explode); $i++) {
            $numPlus++;
            // dump($explode[$i],$i);
            // dump($explode[$numPlus],$numPlus);
            // dump($numPlus < count($explode));
           

            if ($explode[$i] == 'A') {
                if ( $numPlus < count($explode)) {
                    if ($explode[$numPlus] == 'B') {
                        $sum += 4;
                        $i += 1;
                        $numPlus +=1;
                        array_push($display_array,"AB = 4");
                        continue ;
                    } else if ($explode[$numPlus] == 'Z') {
                        $sum += 9;
                        $i += 1;
                        $numPlus +=1;
                        array_push($display_array,"AZ = 9");
                        continue ;
                    } else {
                        $sum += 1;
                        array_push($display_array,"A = 1");
                    }
                } else {
                    $sum += 1;
                    array_push($display_array,"A = 1");
                }
                
            } else if ($explode[$i] == 'B') {
                $sum += 5;
                array_push($display_array,"B = 5");
            } else if ($explode[$i] == 'Z') {
                if ($numPlus < count($explode)) {
                    if ($explode[$numPlus] == 'L') {
                        $sum += 40;
                        $i += 1;
                        $numPlus +=1;
                        array_push($display_array,"ZL = 40");
                        continue ;
                    } else if ($explode[$numPlus] == 'C') {
                        
                        $sum += 90;
                        $i += 1;
                        $numPlus +=1;
                        array_push($display_array,"ZC = 90");
                        continue;
                    } else {
                        $sum += 10;
                        array_push($display_array,"Z = 10");
                    }
                } else {
                    $sum += 10;
                    array_push($display_array,"Z = 10");
                }
            } else if ($explode[$i] == 'L') {
                $sum += 50;
                array_push($display_array,"L = 50");
            } else if ($explode[$i] == 'C') {
                
                if ($numPlus < count($explode)) {
                    if ($explode[$numPlus] == 'D') {
                        $sum += 400;
                        $i += 1;
                        $numPlus +=1;
                        array_push($display_array,"CD = 400");
                        continue;
                    } else if ($explode[$numPlus] == 'R') {
                        
                        $sum += 900;
                        $i += 1;
                        $numPlus +=1;
                        array_push($display_array,"CR = 900");
                        continue;
                    } else {
                        $sum += 100;
                        array_push($display_array,"C = 100");
                    }
                } else {
                    $sum += 100;
                    array_push($display_array,"C = 100");
                }
            } else if ($explode[$i] == 'D') {
                $sum += 500;
                array_push($display_array,"D = 500");
            } else if ($explode[$i] == 'R') {
                $sum += 1000;
                array_push($display_array,"R = 1000");
            }
            
        }
        // dump($sum,$display_array);
        return redirect()->back()->with('success_message',
        '<h1 class="text-3xl text-red-500 ">Input: s = "'.$request->input_val.'"</a></h1>
        <h1 class="text-3xl text-red-500 ">Output: "'.$sum.'"</a></h1>
        <h1 class="text-3xl text-red-500 ">Explanation: "'.implode(" ",$display_array).'"</a></h1>');
    }
}
