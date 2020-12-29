stop_audio();

var is_playing_audio = false;
var is_timer_on = false;
var is_timer_pause = false;

if(typeof (EventSource) !== "undefined") {
    source.onmessage = function(event){
        let data = JSON.parse(event.data);

        $('#home_team').html(data[0].home_team);
        $('#away_team').html(data[0].away_team);
        $('#home_score').html(data[0].home_score);
        $('#away_score').html(data[0].away_score);

        if(data[0].audio != ''){
            if(is_playing_audio == false){
                is_playing_audio = true;
                document.getElementById(data[0].audio).play();
            }
        } else {
            is_playing_audio = false;
        }

        if(data[0].timer != 0){
            if(is_timer_on == false){
                is_timer_on = true;
                var duration = data[0].timer;
                var display = document.querySelector('#timer');

                start_timer(duration, display);
            }
        }

    };
} else {
    alert('Sorry, your browser does not support server sent event');
}

function start_timer(duration, display){
    var timer = duration, minutes, seconds;
    var x = setInterval(function () {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;

                if (--timer < 0){
                    clearInterval(x);
                    document.getElementById("bell_ring_01.mp3").play();

                    var token = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': token
                        },
                        url: '/scoreboard/controller/sse/timer',
                        data: {
                            stop: 'stop'
                        },
                        dataType: 'json',
                        success: function(data){
                            console.log(data);
                        }
                    });

                    is_timer_on = false;
                }

            }, 1000);
}

function stop_audio(){
    is_playing_audio = false;
    var token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': token
        },
        url: '/scoreboard/controller/sse/audio',
        data: {
            stop: 'stop'
        },
        dataType: 'json',
        success: function(data){
            console.log(data);
        }
    });
}