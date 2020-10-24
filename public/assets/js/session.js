window.onload = function () {

    // memanggil function utama untuk memulai timer
    userInactive();

    // Function untuk mendeteksi ketidakaktifan user selama 30 menit
    function userInactive() {
        var time;
        window.onload = resetTimer();

        // dialog konfirmasi user - apakah ingin melanjutkan sesi atau tidak
        function userConfirm () {
            var konfirmasi = false;

            konfirmasi = confirm('Sesi akan berakhir, apakah anda ingin memperpanjang sesi?');
            
            setTimeout(function () {
                $(konfirmasi).close();
            }, 10000);

            return konfirmasi;
        }

        // Notifikasi untuk user bahwa sesi telah berakhir
        function notifyUser() {
            var konfirmasi = userConfirm();

            if (konfirmasi == true) {
                resetTimer();
            } else {
                alert('Waktu sesi anda telah habis');
            }
        }

        // reset waktu/timer
        function resetTimer () {
            clearTimeout(time);
            time = setTimeout(notifyUser, 10000);
        } 
    }
}