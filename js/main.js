const btnSwitch = document.querySelector('#switch');
const linkVideo = document.querySelector('#video');
const linkLogo = document.querySelector('#logo img');

btnSwitch.addEventListener('click', () => {
    document.body.classList.toggle('dark');
    btnSwitch.classList.toggle('active');

    //Alojamos la configuración temporalmente en el servidor
    if(document.body.classList.contains('dark')){
        localStorage.setItem('dark_Mode', 'true');         
    }else{
        localStorage.setItem('dark_Mode', 'false');       
    }

    if(btnSwitch.classList.contains('active')){
        linkVideo.setAttribute("src", "../video/asteroides.mp4");
        linkLogo.setAttribute("src", "../images/logo_dark.png");
    }else{
        linkVideo.setAttribute("src", "../video/claro_web.mp4");
        linkLogo.setAttribute("src", "../images/logo.png");
    }
});

//Capturamos el modo
if(localStorage.getItem('dark_Mode') === 'true'){
    document.body.classList.add('dark');
    btnSwitch.classList.add('active');
    linkVideo.setAttribute("src", "../video/asteroides.mp4");
    linkLogo.setAttribute("src", "../images/logo_dark.png"); 
}else{
    document.body.classList.remove('dark');
    btnSwitch.classList.remove('active');
    linkVideo.setAttribute("src", "../video/claro_web.mp4");
    linkLogo.setAttribute("src", "../images/logo.png");
}
   
