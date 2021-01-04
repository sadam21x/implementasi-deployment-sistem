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
                    START
                </button>
                <button id="pause_timer_button" class="btn btn-warning mx-1 my-1">
                    PAUSE
                </button>
                <button id="resume_timer_button" class="btn btn-secondary mx-1 my-1">
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
                        <option value="warriyo_mortals.mp3">Warriyo - Mortals</option>
                        <option value="janji_heroes_tonight.mp3">Janji - Heroes Tonight</option>
                        <option value="cartoon_why_we_lose.mp3">Cartoon - Why We Lose</option>
                    </select>
                </div>
                <button id="play_audio_button" class="btn btn-linkedin mx-1 my-1">
                    <i class="fas fa-play-circle mr-2"></i>
                    PLAY
                </button>
                <button id="pause_audio_button" class="btn btn-warning mx-1 my-1">
                    <i class="fas fa-pause-circle mr-2"></i>
                    PAUSE
                </button>
                <button id="stop_audio_button" class="btn btn-youtube mx-1 my-1">
                    <i class="fas fa-stop-circle mr-2"></i>
                    STOP
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