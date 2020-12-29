<?php

namespace App\Http\Controllers\modul6;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Support\Facades\File;

class ScoreBoardController extends Controller
{
    public function controller()
    {
        return view('modul6.controller');
    }

    public function client()
    {
        $audio = File::files(public_path().'/storage/audio');
        return view('modul6.client', compact('audio'));
    }

    public function sse_reset(){
        DB::table('scoreboard')->where('id_scoreboard', 1)->update([
            'home_team' => 'Home',
            'away_team' => 'Away',
            'home_score' => 0,
            'away_score' => 0
        ]);

        $message = "Reset success";
        return response()->json($message);
    }

    public function sse_team_server(Request $request){
        $input_home_team = $request->input_home_team;
        $input_away_team = $request->input_away_team;

        DB::table('scoreboard')->where('id_scoreboard', 1)->update([
            'home_team' => $input_home_team,
            'away_team' => $input_away_team
        ]);

        $message = "Team updated successfully";
        return response()->json($message);
    }

    public function sse_team()
    {

        $data = DB::table('scoreboard')->where('id_scoreboard', 1)->get()->toArray();

        $response = new StreamedResponse();

        $response->setCallback(function () use ($data){
            echo 'data: ' . json_encode($data) . "\n\n";
            ob_end_flush();
            flush();
            usleep(2000);
        });
                                         
        $response->headers->set('Content-Type', 'text/event-stream');
        $response->headers->set('X-Accel-Buffering', 'no');
        $response->headers->set('Cache-Control', 'no-cache');
        $response->send();
    }

    public function sse_home_score(Request $request)
    {
        $current_score = DB::table('scoreboard')->where('id_scoreboard', 1)->value('home_score');

        if ($request->has('plus_two')) {
            $score = $request->plus_two + $current_score;

            DB::table('scoreboard')->where('id_scoreboard', 1)->update([
                'home_score' => $score
            ]);

            $message = 'Score updated successfully';
            return response()->json($message);

        } elseif ($request->has('plus_three')) {
            $score = $request->plus_three + $current_score;

            DB::table('scoreboard')->where('id_scoreboard', 1)->update([
                'home_score' => $score
            ]);

            $message = 'Score updated successfully';
            return response()->json($message);

        } elseif ($request->has('minus_two')) {
            $score = $request->minus_two + $current_score;

            if ($score <= 0){
                DB::table('scoreboard')->where('id_scoreboard', 1)->update([
                    'home_score' => 0
                ]);
            } else {
                DB::table('scoreboard')->where('id_scoreboard', 1)->update([
                    'home_score' => $score
                ]);
            }

            $message = 'Score updated successfully';
            return response()->json($message);

        } elseif ($request->has('minus_three')) {
            $score = $request->minus_three + $current_score;

            if ($score <= 0){
                DB::table('scoreboard')->where('id_scoreboard', 1)->update([
                    'home_score' => 0
                ]);
            } else {
                DB::table('scoreboard')->where('id_scoreboard', 1)->update([
                    'home_score' => $score
                ]);
            }

            $message = 'Score updated successfully';
            return response()->json($message);
            
        }
    }

    public function sse_away_score(Request $request)
    {
        $current_score = DB::table('scoreboard')->where('id_scoreboard', 1)->value('away_score');

        if ($request->has('plus_two')) {
            $score = $request->plus_two + $current_score;

            DB::table('scoreboard')->where('id_scoreboard', 1)->update([
                'away_score' => $score
            ]);

            $message = 'Score updated successfully';
            return response()->json($message);

        } elseif ($request->has('plus_three')) {
            $score = $request->plus_three + $current_score;

            DB::table('scoreboard')->where('id_scoreboard', 1)->update([
                'away_score' => $score
            ]);

            $message = 'Score updated successfully';
            return response()->json($message);

        } elseif ($request->has('minus_two')) {
            $score = $request->minus_two + $current_score;

            if ($score <= 0){
                DB::table('scoreboard')->where('id_scoreboard', 1)->update([
                    'away_score' => 0
                ]);
            } else {
                DB::table('scoreboard')->where('id_scoreboard', 1)->update([
                    'away_score' => $score
                ]);
            }

            $message = 'Score updated successfully';
            return response()->json($message);

        } elseif ($request->has('minus_three')) {
            $score = $request->minus_three + $current_score;

            if ($score <= 0){
                DB::table('scoreboard')->where('id_scoreboard', 1)->update([
                    'away_score' => 0
                ]);
            } else {
                DB::table('scoreboard')->where('id_scoreboard', 1)->update([
                    'away_score' => $score
                ]);
            }

            $message = 'Score updated successfully';
            return response()->json($message);
            
        }
    }

    public function sse_audio(Request $request)
    {

        if($request->has('audio')){
            $audio = $request->audio;

            DB::table('scoreboard')->where('id_scoreboard', 1)->update([
                'audio' => $audio
            ]);
            
            $message = 'Audio played successfully';
            return response()->json($message);

        } elseif($request->has('stop')){
            DB::table('scoreboard')->where('id_scoreboard', 1)->update([
                'audio' => ''
            ]);
            
            $message = 'Audio stopped';
            return response()->json($message);
        }
    }

    public function sse_timer(Request $request)
    {
        if($request->has('start')){
            DB::table('scoreboard')->where('id_scoreboard', 1)->update([
                'timer' => $request->duration
            ]);

            $message = 'Countdown start';
            return response()->json($message);

        } elseif($request->has('stop')){
            DB::table('scoreboard')->where('id_scoreboard', 1)->update([
                'timer' => 0
            ]);

            $message = 'Countdown stop';
            return response()->json($message);
        }
    }
}
