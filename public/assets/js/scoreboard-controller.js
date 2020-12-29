// Efek menu aktif
$('#scoreboard-menu').addClass('active');

// SSE
if (typeof (EventSource) !== "undefined") {
    source.onmessage = function(event){
        let data = JSON.parse(event.data);
        $('#home_team').html(data[0].home_team);
        $('#away_team').html(data[0].away_team);
        $('#home_score').html(data[0].home_score);
        $('#away_score').html(data[0].away_score);
    };
} else {
    alert('Sorry, your browser does not support server sent event');
}

// Submit perubahan nama team
$('#team_form').on('submit', function(event){
    event.preventDefault();
    var input_home_team = $('#input_home_team').val();
    var input_away_team = $('#input_away_team').val();
    var token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': token
        },
        url: '/scoreboard/controller/sse/team',
        data: {
            input_home_team: input_home_team,
            input_away_team: input_away_team
        },
        dataType: 'json',
        success: function(data){
            console.log(data);

            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: 'Nama Tim telah diupdate'
            });
        }
    });
});

// reset data scoreboard
$('#reset_button').on('click', function(){
    var token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        type: 'GET',
        headers: {
            'X-CSRF-TOKEN': token
        },
        url: '/scoreboard/controller/sse/reset',
        dataType: 'json',
        success: function(data){
            console.log(data);
            $('#input_home_team').val('');
            $('#input_away_team').val('');

            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: 'Data telah direset.'
            });
        }
    });
});

// ============= Home Score ==============

// Home score +2
$('#home_plus_two_button').on('click', function(){
    var token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': token
        },
        url: '/scoreboard/controller/sse/home/score',
        data: {
            plus_two: 2,
        },
        dataType: 'json',
        success: function(data){
            console.log(data);
        }
    });
});

// Home score +3
$('#home_plus_three_button').on('click', function(){
    var token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': token
        },
        url: '/scoreboard/controller/sse/home/score',
        data: {
            plus_three: 3,
        },
        dataType: 'json',
        success: function(data){
            console.log(data);
        }
    });
});

// Home score -2
$('#home_minus_two_button').on('click', function(){
    var token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': token
        },
        url: '/scoreboard/controller/sse/home/score',
        data: {
            minus_two: -2,
        },
        dataType: 'json',
        success: function(data){
            console.log(data);
        }
    });
});

// Home score -3
$('#home_minus_three_button').on('click', function(){
    var token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': token
        },
        url: '/scoreboard/controller/sse/home/score',
        data: {
            minus_three: -3,
        },
        dataType: 'json',
        success: function(data){
            console.log(data);
        }
    });
});

// ============= Away Score ==============

// Home score +2
$('#away_plus_two_button').on('click', function(){
    var token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': token
        },
        url: '/scoreboard/controller/sse/away/score',
        data: {
            plus_two: 2,
        },
        dataType: 'json',
        success: function(data){
            console.log(data);
        }
    });
});

// Home score +3
$('#away_plus_three_button').on('click', function(){
    var token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': token
        },
        url: '/scoreboard/controller/sse/away/score',
        data: {
            plus_three: 3,
        },
        dataType: 'json',
        success: function(data){
            console.log(data);
        }
    });
});

// Home score -2
$('#away_minus_two_button').on('click', function(){
    var token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': token
        },
        url: '/scoreboard/controller/sse/away/score',
        data: {
            minus_two: -2,
        },
        dataType: 'json',
        success: function(data){
            console.log(data);
        }
    });
});

// Home score -3
$('#away_minus_three_button').on('click', function(){
    var token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': token
        },
        url: '/scoreboard/controller/sse/away/score',
        data: {
            minus_three: -3,
        },
        dataType: 'json',
        success: function(data){
            console.log(data);
        }
    });
});

// Play audio
$('#play_audio_button').on('click', function(){
    var audio = $('#select_audio').val();
    var token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': token
        },
        url: '/scoreboard/controller/sse/audio',
        data: {
            audio: audio
        },
        dataType: 'json',
        success: function(data){
            console.log(data);
        }
    });
});

// start timer
$('#start_timer_button').on('click', function(){
    var token = $('meta[name="csrf-token"]').attr('content');
    var duration = $('#input_timer').val();

    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': token
        },
        url: '/scoreboard/controller/sse/timer',
        data: {
            start: 'start',
            duration: duration
        },
        dataType: 'json',
        success: function(data){
            console.log(data);
            Swal.fire({
                icon: 'success',
                title: 'Timer started'
            });
        }
    });
});

// stop timer
$('#stop_timer_button').on('click', function(){
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
});