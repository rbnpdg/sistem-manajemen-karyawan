@extends('layout/karyawan-navbar')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container">
        <h2>Scan QR Code Absensi</h2>
        <button id="startScan" class="btn btn-primary mb-3">Scan QR Code</button>
        
        <form action="{{ route('karyawan.presensicek') }}" method="POST">
            @csrf
            <input type="hidden" name="karyawan_id" value="{{ Auth::id() }}">
            <input type="hidden" name="tanggal" value="{{ now()->toDateString() }}">
            <input type="hidden" name="waktu" value="{{ now()->toTimeString() }}">
            <input type="hidden" name="token" id="qrToken" value="contoh_token">
            <input type="hidden" name="status" value="Hadir">
            <button id="recordPresensiBtn" class="btn btn-success mb-3" style="display: none;">Record Presensi</button>
        </form>  
        
        <br>
        <video id="barcodeScanner" width="100%" height="auto" autoplay></video>
        <p id="result"></p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jsqr/dist/jsQR.js"></script>
    <script>
        let isScanning = false;
        const resultElement = document.getElementById('result');
        const videoElement = document.getElementById('barcodeScanner');
        const recordPresensiBtn = document.getElementById('recordPresensiBtn');

        //menggunakan kamera dan menampilkan view dari kamera
        function startCamera() {
            if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                navigator.mediaDevices.getUserMedia({ video: true })
                    .then(function(stream) {
                        videoElement.srcObject = stream;
                        videoElement.setAttribute("width", "40%");
                        videoElement.setAttribute("height", "auto");
                        if (!isScanning) {
                            startScanning();
                        }
                    })
                    .catch(function(err) {
                        console.log("Error accessing camera: ", err); //jika gagal membuka kamera
                    });
            } else {
                console.log("Camera not supported by this browser.");
            }
        }

        //button
        document.getElementById('startScan').addEventListener('click', function() {
            if (!isScanning) {
                startCamera();
                startScanning();
            } else {
                stopScanning();
            }
        });

        //scan qr code
        function startScanning() {
            isScanning = true;
            document.getElementById('startScan').innerText = 'Stop Scanning';
            scanQRCode();
        }

        function stopScanning() {
            isScanning = false;
            document.getElementById('startScan').innerText = 'Start Scanning';
        }

        function scanQRCode() {
            const canvas = document.createElement("canvas");
            const context = canvas.getContext("2d");
            //set dimensi canvas
            canvas.width = videoElement.videoWidth || videoElement.clientWidth;
            canvas.height = videoElement.videoHeight || videoElement.clientHeight;
            context.drawImage(videoElement, 0, 0, canvas.width, canvas.height);
            
            //scan qr code dari canvas
            const imageData = context.getImageData(0, 0, canvas.width, canvas.height);
            const code = jsQR(imageData.data, canvas.width, canvas.height);
            
            if (code) {
                //tampilkan token dari qr dan kirim data presensi ke server
                const qrData = code.data;
                sendAttendanceData(qrData);
            } else {
                //scan kembali jika tidak terdeteksi adanya qr
                if (isScanning) {
                    requestAnimationFrame(scanQRCode);
                }
            }
        }

        function sendAttendanceData(qrCode) {
            fetch('/karyawan/verif-presensi', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({ qrCode: qrCode }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message); // token sesuai
                    document.getElementById('qrToken').value = qrCode; //send token ke form
                    recordPresensiBtn.style.display = 'inline-block';
                } else {
                    alert(data.message); // token tidak sesuai
                }
            });
        }


        recordPresensiBtn.addEventListener('click', function () {
            fetch('/karyawan/store-presensi', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify(presensiData)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message); // Tampilkan pesan sukses
                } else {
                    alert(data.message); // Tampilkan pesan gagal
                }
            })
            .catch(error => {
                console.error('Error:', error); // Log error jika terjadi
            });
        });

    </script>
@endsection
