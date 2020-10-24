{{-- Start Confirm Modal --}}
<div class="modal fade" id="modal-konfirmasi-session" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Konfirmasi</h5>
            </div>
            <div class="modal-body">

                <div class="container">

                    <div class="mb-3">
                        <p>
                            Sesi akan berakhir, apakah anda ingin memperpanjang sesi?
                        </p>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-google btn-session-confirm-no">
                        TIDAK
                    </button>
                    <button type="button" class="btn btn-sm btn-primary btn-session-confirm-yes">
                        YA
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- End of Confirm Modal --}}

<script>
    window.onload = function () {
        // memanggil function utama untuk memulai timer
        userInactive();

        // Function untuk mendeteksi ketidakaktifan user selama 30 menit
        function userInactive() {
            var time;
            var waktu_timeout = 1800000; // 1.800.000 ms = 30 menit
            var confirm_timeout = 10000; // 10.000 ms = 10 detik
            resetTimer();

            // Notifikasi untuk user bahwa sesi akan berakhir
            function notifyUser() {

                $('#modal-konfirmasi-session').modal('show');

                setTimeout( function () {
                    $('#modal-konfirmasi-session').modal('hide');
                    alert('Waktu sesi anda telah habis');
                }, confirm_timeout);

                $('.btn-session-confirm-yes').click( function () {
                    $('#modal-konfirmasi-session').modal('hide');
                    resetTimer();
                });

                $('.btn-session-confirm-no').click( function () {
                    $('#modal-konfirmasi-session').modal('hide');
                    alert('Waktu sesi anda telah habis');
                });

            }

            // reset waktu/timer
            function resetTimer() {
                clearTimeout(time);
                time = setTimeout(notifyUser, waktu_timeout);
            }
        }
    }
</script>