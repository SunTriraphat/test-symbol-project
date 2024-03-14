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

        $duplicate_stringA = '';
        $sum_a = 0;

        $duplicate_stringB = '';
        $sum_B = 0;

        $duplicate_stringZ = '';
        $sum_Z = 0;

        $duplicate_stringL = '';
        $sum_L = 0;

        $duplicate_stringC = '';
        $sum_C = 0;

        $duplicate_stringD = '';
        $sum_D = 0;

        $duplicate_stringR = '';
        $sum_R = 0;


        for ($i = 0; $i < count($explode); $i++) {
            $numPlus++;
            if ($explode[$i] == 'A') {

                if ($numPlus < count($explode)) {
                    if ($explode[$numPlus] == 'B') {
                        $sum += 4;
                        $i += 1;
                        $numPlus += 1;
                        array_push($display_array, "AB = 4");
                        continue;
                    } else if ($explode[$numPlus] == 'Z') {
                        $sum += 9;
                        $i += 1;
                        $numPlus += 1;
                        array_push($display_array, "AZ = 9");
                        continue;
                    } else {
                        $sum += 1;
                        $sum_a += 1;
                        $duplicate_stringA = $duplicate_stringA . 'A';
                    }
                } else {
                    $sum += 1;
                    $sum_a += 1;
                    $duplicate_stringA = $duplicate_stringA . 'A';
                }

                // dd($duplicate_string);
                // array_push($display_array,$duplicate_string);

            } else if ($explode[$i] == 'B') {
                $sum += 5;
                $sum_B += 5;
                $duplicate_stringB = $duplicate_stringB . 'B';
            } else if ($explode[$i] == 'Z') {
                if ($numPlus < count($explode)) {
                    if ($explode[$numPlus] == 'L') {
                        $sum += 40;
                        $i += 1;
                        $numPlus += 1;
                        array_push($display_array, "ZL = 40");
                        continue;
                    } else if ($explode[$numPlus] == 'C') {

                        $sum += 90;
                        $i += 1;
                        $numPlus += 1;
                        array_push($display_array, "ZC = 90");
                        continue;
                    } else {
                        $sum += 10;
                        $sum_Z += 10;
                        $duplicate_stringZ = $duplicate_stringZ . 'Z';
                    }
                } else {
                    $sum += 10;
                    $sum_Z += 10;
                    $duplicate_stringZ = $duplicate_stringZ . 'Z';
                }
            } else if ($explode[$i] == 'L') {
                $sum += 50;
                $sum_L += 50;
                $duplicate_stringL = $duplicate_stringL . 'L';
            } else if ($explode[$i] == 'C') {
                if ($numPlus < count($explode)) {
                    if ($explode[$numPlus] == 'D') {
                        $sum += 400;
                        $i += 1;
                        $numPlus += 1;
                        array_push($display_array, "CD = 400");
                        continue;
                    } else if ($explode[$numPlus] == 'R') {

                        $sum += 900;
                        $i += 1;
                        $numPlus += 1;
                        array_push($display_array, "CR = 900");
                        continue;
                    } else {
                        $sum += 100;
                        $sum_C += 100;
                        $duplicate_stringC = $duplicate_stringC . 'C';
                    }
                } else {
                    $sum += 100;
                    $sum_C += 100;
                    $duplicate_stringC = $duplicate_stringC . 'C';
                }
            } else if ($explode[$i] == 'D') {
                $sum += 500;
                $sum_D += 500;
                        $duplicate_stringD = $duplicate_stringD . 'D';
            } else if ($explode[$i] == 'R') {
                $sum += 1000;
                $sum_R += 1000;
                        $duplicate_stringD = $duplicate_stringR . 'R';
            }
        }
        $duplicate_stringA = $duplicate_stringA . '=' . $sum_a;
        $duplicate_stringB = $duplicate_stringB . '=' . $sum_B;
        $duplicate_stringZ = $duplicate_stringZ . '=' . $sum_Z;
        $duplicate_stringL = $duplicate_stringL . '=' . $sum_L;
        $duplicate_stringC = $duplicate_stringC . '=' . $sum_C;
        $duplicate_stringD = $duplicate_stringD . '=' . $sum_D;
        $duplicate_stringR = $duplicate_stringR . '=' . $sum_R;
        

        if ($sum_a != 0) {
            array_push($display_array, $duplicate_stringA);
        }
        if ($sum_B != 0) {
            array_push($display_array, $duplicate_stringB);
        }
        if ($sum_Z != 0) {
            array_push($display_array, $duplicate_stringZ);
        }
        if ($sum_L != 0) {
            array_push($display_array, $duplicate_stringL);
        }
        if ($sum_C != 0) {
            array_push($display_array, $duplicate_stringC);
        }
        if ($sum_D != 0) {
            array_push($display_array, $duplicate_stringD);
        }
        if ($sum_R != 0) {
            array_push($display_array, $duplicate_stringR);
        }

        // dump($sum, $display_array);
        return redirect()->back()->with('success_message',
        '<h1 class="text-3xl text-red-500 ">Input: s = "'.$request->input_val.'"</a></h1>
        <h1 class="text-3xl text-red-500 ">Output: "'.$sum.'"</a></h1>
        <h1 class="text-3xl text-red-500 ">Explanation: "'.implode(" ",$display_array).'"</a></h1>');
    }
}
