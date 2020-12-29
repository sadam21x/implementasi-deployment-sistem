@extends('layouts/modul1/main')
@section('title', 'Scoreboard Controller')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/css/scoreboard-controller.css') }}">
@endsection

@section('content')
<!-- Content -->
<div class="content ">

    <div class="page-header">
        <h4>Scoreboard Controller</h4>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-12">

            <form id="team_form">

                <div class="form-row">
                    <div class="col">
                        <label>Home</label>
                    </div>
                    <div class="col">
                        <label>Away</label>
                    </div>
                    <div class="col"></div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <input type="text" id="input_home_team" class="form-control" required>
                    </div>
                    <div class="col">
                        <input type="text" id="input_away_team" class="form-control" required>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-dark">
                            UPDATE
                        </button>
                    </div>
                </div>
            </form>

            <div class="d-flex justify-content-center mt-5">
                <h5 class="card-title"><===== Score =====></h5>
            </div>

            <div class="score-container">
                <div class="score-value">
                    <h1 id="home_score">0</h1>
                    <h6 id="home_team">Home</h6>
                </div>
                <div class="score-value">
                    <h1 id="away_score">0</h1>
                    <h6 id="away_team">Away</h6>
                </div>
            </div>

            <div class="score-value-control-container mt-5">
                <div class="row">
                    <div class="col">
                        <button id="home_plus_two_button" class="btn btn-sm btn-primary">
                            +2 Home
                        </button>
                    </div>
                    <div class="col">
                        <button id="home_minus_two_button" class="btn btn-sm btn-primary">
                            -2 Home
                        </button>
                    </div>
                    <div class="col">
                        <button id="away_plus_two_button" class="btn btn-sm btn-danger">
                            +2 Away
                        </button>
                    </div>
                    <div class="col">
                        <button id="away_minus_two_button" class="btn btn-sm btn-danger">
                            -2 Away
                        </button>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <button id="home_plus_three_button" class="btn btn-sm btn-primary">
                            +3 Home
                        </button>
                    </div>
                    <div class="col">
                        <button id="home_minus_three_button" class="btn btn-sm btn-primary">
                            -3 Home
                        </button>
                    </div>
                    <div class="col">
                        <button id="away_plus_three_button" class="btn btn-sm btn-danger">
                            +3 Away
                        </button>
                    </div>
                    <div class="col">
                        <button id="away_minus_three_button" class="btn btn-sm btn-danger">
                            -3 Away
                        </button>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center mt-5">
                <button id="reset_button" class="btn btn-sm btn-dark">
                    RESET
                </button>
            </div>

            <div class="d-flex justify-content-center mt-5">
                <h5 class="card-title"><===== Countdown =====></h5>
            </div>

            <div class="form-inline my-3 d-flex justify-content-center">
                <div class="form-group">
                    <input type="number" id="input_timer" min="0" class="form-control" placeholder="timer (seconds)">
                </div>
                <button id="start_timer_button" class="btn btn-linkedin mx-1 my-1">
                    START/RESTART
                </button>
                <button id="stop_timer_button" class="btn btn-google mx-1 my-1">
                    STOP
                </button>
                <button class="btn btn-warning mx-1 my-1">
                    RESUME
                </button>
            </div>
            
            <div class="d-flex justify-content-center mt-5">
                <h5 class="card-title"><===== Music =====></h5>
            </div>

            <div class="d-flex justify-content-center form-inline my-4">
                <div class="form-group">
                    <label class="mr-3">Select Song</label>
                    <select id="select_audio" class="form-control">
                        <option value="breatha_josh_pan.mp3">Breatha - Josh Pan</option>
                        <option value="cat_shat_in_the_box_josh_pan.mp3">Cat Shat in The Box - Josh Pan</option>
                        <option value="june_bobby_richards.mp3">June - Bobby Richards</option>
                        <option value="phrase_prant_josh_pan.mp3">Phrase Prant - Josh Pan</option>
                    </select>
                </div>
                <button id="play_audio_button" class="btn btn-linkedin mx-1 my-1">
                    <i class="fas fa-play-circle mr-2"></i>
                    PLAY
                </button>
            </div>

        </div>
    </div>

</div>
<!-- ./ Content -->
@endsection

@section('extra-script')
    <script>
        var source = new EventSource("{{ url('/scoreboard/client/sse') }}");
    </script>
    <script src="{{ asset('/assets/js/scoreboard-controller.js') }}"></script>
@endsection