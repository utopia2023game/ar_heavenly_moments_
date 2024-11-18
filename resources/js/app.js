import './bootstrap';


async function downloadImage(){
    const link = window.document.getElementById('screenshot_image') ;
    console.log(link);
    link.click();
    
}

downloadImage();