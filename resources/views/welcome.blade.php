<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لحظه های بهشتی</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        @font-face {
            font-family: 'BZar';
            src: url('fonts/BZar.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: 'BTraffic';
            src: url('fonts/BTraffic.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: 'BRoya';
            src: url('fonts/BRoya.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        body {
            margin: 0;
            /* font-family: Arial, sans-serif; */
            font-family: 'BZar', 'BTraffic', Arial, sans-serif;
            /* استفاده از فونت ایران سنس */
            display: flex;
            flex-direction: column;
            height: 100vh;
            overflow: hidden;
            /* جلوگیری از اسکرول */
            background-color: #000000;
        }

        header {
            color: white;
            font-family: 'BRoya';
            text-align: center;
            padding: 20px;
            font-size: 2em;
        }

        main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        img {
            max-height: 70vh;
            /* حداکثر ارتفاع تصویر برابر با ارتفاع صفحه */
            max-width: 100%;
            /* حداکثر عرض تصویر */
            object-fit: cover;
            display: none;
            /* Initially hide the image */
        }

        footer {
            background-color: #00000000;
            color: white;
            text-align: center;
            padding: 10px;
        }

        .loading {
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.2);
            z-index: 10;
            /* Make sure loading is on top */
        }

        .loader {
            border: 8px solid #f3f3f3;
            /* Light grey */
            border-top: 8px solid #000000;
            /* Blue */
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
            /* Spin animation */
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .download-message {
            font-family: 'BTraffic';
            position: fixed;
            bottom: 20%;
            left: 50%;
            direction: rtl;
            transform: translateX(-50%);
            background-color: #1b1b1bbe;
            color: white;
            padding: 5px 5px;
            border-radius: 5px;
            display: none;
            opacity: 0;
            /* Start with opacity 0 */
            /* Initially hidden */
            transition: opacity 1s;
        }

        .fallback-message {
            font-size: 1.2em;
            color: #e9e9e9;
            display: none;
        }

        .icon {
            width: 50px;
            height: 50px;
            animation: bounce 1s infinite;
            /* justify-items: center; */
            /* Animation for bouncing effect */
        }

        @keyframes bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateY(0);
            }

            40% {
                transform: translateY(-20px);
            }

            60% {
                transform: translateY(-10px);
            }
        }

        @media (max-width: 768px) {
            body {
                margin: 0;
                /* font-family: Arial, sans-serif; */
                font-family: 'BZar', 'BTraffic', Arial, sans-serif;
                /* استفاده از فونت ایران سنس */
                /* display: flex;
                flex-direction: column; */
                height: 90vh;
                overflow: hidden;
                /* جلوگیری از اسکرول */
                background-color: #000000;
            }
            header {
                font-size: 1.3em;
            }

            footer {
                font-size: 0.8em;
            }
        }

        @media (max-width: 450px) {

            body {
                margin: 0;
                /* font-family: Arial, sans-serif; */
                font-family: 'BZar', 'BTraffic', Arial, sans-serif;
                /* استفاده از فونت ایران سنس */
                /* display: flex;
                flex-direction: column; */
                height: 90vh;
                overflow: hidden;
                /* جلوگیری از اسکرول */
                background-color: #000000;
            }

            header {
                font-size: 0.8em;
            }

            footer {
                font-size: 0.6em;
            }
        }
    </style>
</head>

<body>
    <div class="loading" id="loading">
        <div class="loader"></div>
    </div>
    <header>
        <h1>لحظه های بهشتی</h1>
    </header>

    <main>
        <img id="download-image" src="https://a.mersadstudio.ir/uploads/{{ $image_path }}" alt="تصویر" />
        {{-- <img id="download-image" src="http://127.0.0.1:8000/uploads/{{ $image_path }}" alt="تصویر" /> --}}
        <div id="fallback-message" class="fallback-message">
            <div style="justify-items: center;">
                <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10" />
                    <line x1="12" y1="16" x2="12" y2="16" />
                    <line x1="12" y1="8" x2="12" y2="10" />
                </svg>
            </div>
            <div>
                متاسفانه تصویر موجود نیست
            </div>
        </div>
    </main>

    <footer>
        <p>تمامی حقوق مادی و معنوی برای شرکت مرصاد محفوظ است © 2024</p>
    </footer>

    <div id="message" class="download-message">تصویر با موفقیت بارگیری شد</div>

    <script>
        const img = document.getElementById('download-image');
        const loading = document.getElementById('loading');
        const fallbackMessage = document.getElementById('fallback-message');

        img.onload = function() {
            // console.log("Image loaded successfully");
            setTimeout(() => {
                loading.style.display = 'none'; // Hide loading
            }, 1000);
            img.style.display = 'block'; // Show the image

            setTimeout(() => {
                downloadImage();
            }, 1000);
        };

        img.onerror = function() {
            // console.log("Image failed to load");
            setTimeout(() => {
                loading.style.display = 'none'; // Hide loading
            }, 200);
            fallbackMessage.style.display = 'block'; // Show fallback message
        };

        // Trigger image load
        img.src = img.src; // Re-trigger load to ensure events fire

        function downloadImage() {
            const img = document.getElementById('download-image');
            img.style.display = 'block'; // Show the image after loading

            // Create a link element
            const link = document.createElement('a');
            link.href = img.src;
            link.download = 'HeavenlyMoments.jpg'; // Set the filename for download
            document.body.appendChild(link);
            link.click(); // Trigger the download
            document.body.removeChild(link); // Remove the link after downloading

            // Show the message with fade effect
            const message = document.getElementById('message');
            message.style.display = 'block'; // Show the message
            message.style.opacity = 1; // Set opacity to 1 for fade-in

            // Hide the message after 2 seconds
            setTimeout(() => {
                message.style.opacity = 0; // Start fade-out
                setTimeout(() => {
                    message.style.display = 'none'; // Hide the message after fade-out
                }, 1000); // Wait for the fade-out transition
            }, 5000); // Wait for 2 seconds before starting fade-out
        }
    </script>

</body>

</html>
