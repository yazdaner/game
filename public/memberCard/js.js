function draw(id,username,phone,date,imgProfile) {

    document.addEventListener("DOMContentLoaded",function(){
        const canvas = document.getElementById('canvas');
        const ctx = canvas.getContext('2d');
        let img = new Image();
        let profile = new Image();

        img.addEventListener("load", () => {
            ctx.drawImage(img, 0, 0);
            ctx.drawImage(profile, 99, 168, 163, 156);
            ctx.font = '13px myFirstFont';
            ctx.fillStyle = "#fbb92f";
            ctx.fillText(id, 152, 350);
            ctx.fillText(username, 190, 405);
            ctx.fillText(phone, 190, 438);
            ctx.fillText(date, 190, 468);
        });

        profile.src = imgProfile;
        img.src = "../memberCard/x.png";
        setTimeout(function () {
            download();
        }, 2000)

        });

    download = function () {
        var link = document.createElement('a');
        link.download = 'filename.png';
        link.href = document.getElementById('canvas').toDataURL()
        link.click();
    }
}
