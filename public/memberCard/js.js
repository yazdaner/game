function draw(id, username, phone, date, imgProfile) {

    document.addEventListener("DOMContentLoaded", function () {
        const canvas = document.getElementById('canvas');
        const ctx = canvas.getContext('2d');
        let img = new Image();
        let profile = new Image();

        img.addEventListener("load", () => {
            ctx.drawImage(img, 0, 0);
            function x() {
                ctx.drawImage(profile, 150, 253, 240, 233);
                y();
            }
            function y() {
                ctx.font = '14px myFirstFont';
                ctx.fillStyle = "#fbb92f";
                ctx.fillText(id, 240, 520);
                ctx.fillText(username, 290, 605);
                ctx.fillText(phone, 290, 656);
                ctx.fillText(date, 290, 698);
            }
            x();
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
