@extends('layout/karyawan-navbar')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container">
        <h2>Scan QR Code Absensi</h2>
        <video id="barcodeScanner" width="100%" height="auto" autoplay></video>
        <button id="startScan">Start Scanning</button>
        <p id="result"></p>
        <p id="qrToken">QR Code Token: </p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jsqr/dist/jsQR.js"></script>
    <script>
        let isScanning = false;
        const resultElement = document.getElementById('result');
        const videoElement = document.getElementById('barcodeScanner');
        const qrTokenElement = document.getElementById('qrToken'); 

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
                //tampilkan token dari qr
                const qrData = code.data;
                resultElement.innerText = `QR Code Detected: ${qrData}`;
                qrTokenElement.innerText = `QR Code Token: ${qrData}`;
                sendAttendanceData(qrData);
            } else {
                //scan kembali jika tidak terdeteksi adanya qr
                if (isScanning) {
                    requestAnimationFrame(scanQRCode);
                }
            }
        }
    </script>
@endsection
