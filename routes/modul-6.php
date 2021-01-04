<?php

use Illuminate\Support\Facades\Route;

Route::get('/scoreboard/controller', 'modul6\ScoreBoardController@controller');
Route::get('/scoreboard/client', 'modul6\ScoreBoardController@client');

Route::get('/scoreboard/client/sse', 'modul6\ScoreBoardController@sse');

Route::get('/scoreboard/controller/sse/reset', 'modul6\ScoreBoardController@sse_reset');
Route::post('/scoreboard/controller/sse/team', 'modul6\ScoreBoardController@sse_team');

Route::post('/scoreboard/controller/sse/home/score', 'modul6\ScoreBoardController@sse_home_score');
Route::post('/scoreboard/controller/sse/away/score', 'modul6\ScoreBoardController@sse_away_score');

Route::post('/scoreboard/controller/sse/timer', 'modul6\ScoreBoardController@sse_timer');
Route::post('/scoreboard/controller/sse/audio', 'modul6\ScoreBoardController@sse_audio');