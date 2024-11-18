<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body style="background: black ">

    <div style="text-align: center ;margin: 4% ;">
        <img id="screenshot_image"
            src="https://tarsimdg.com/wp-content/uploads/2023/01/%D9%BE%D9%88%D8%B3%D8%AA%D8%B1-%D8%AD%D8%A7%D8%AC-%D9%82%D8%A7%D8%B3%D9%85-%D8%B3%D9%84%DB%8C%D9%85%D8%A7%D9%86%DB%8C-14-732x1024.jpg"
            alt="documentation screenshot" style='object-fit: cover ;border-radius: 4px ;' onended="downloadImage()" />
    </div>
</body>


<script>
    // async function toDataURL(url) {
    //     const blob = await fetch(url).then(res => res.blob());
    //     return URL.createObjectURL(blob);
    // }

    // async function downloadImage() {
    //     const url = window.document.getElementById('screenshot_image').currentSrc;
    //     console.log(url);
    //     // link.location.href;

    //     const a = document.createElement("a");
    //     a.href = await toDataURL(url);
    //     a.download = "heavenlyMoments.jpg";
    //     document.body.appendChild(a);
    //     a.click();
    //     document.body.removeChild(a);

    // }

    async function downloadImage() {
        const imageSrc = window.document.getElementById('screenshot_image').currentSrc;
        const image = await fetch(imageSrc)
        const imageBlog = await image.blob()
        const imageURL = URL.createObjectURL(imageBlog)

        const link = document.createElement('a')
        link.href = imageURL
        link.download = 'image file name here'
        document.body.appendChild(link)
        link.click()
        document.body.removeChild(link)
    }

    downloadImage();
</script>

</html>
