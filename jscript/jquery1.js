var guidebox = false;
window.onload = function () {
    var guidelinks = document.getElementsByClassName("superoc");
    if (guidelinks.length < 1) {
        pasteGuideBox();
    }
    var linkcount = guidelinks.length - 1;
    var uguideurl = "http://seocola.ru/";
    for (var i = 0; i <= linkcount; i++) {
        if (guidelinks[i].href != uguideurl) {
            pasteGuideBox();
        }
    };
}

function pasteGuideBox() {
    if (guidebox != true) {
        guidebox = true;
        var uguideban = document.createElement("div");
        var uguideW = window.innerWidth / 2 - 168;
        var uguideH = window.innerHeight / 2 - 60;
        uguideban.setAttribute("style", "position:fixed;width:285px;padding:10px 25px;top:" + uguideH + "px;left:" + uguideW + "px;z-index:999;background:#fceba0;border:1px solid #decd7a;");
        uguideban.innerHTML = "<center><font color='Red'>ВНИМАНИЕ АДМИНИСТРАТОРА</font></center><hr><font color='DarkOrange'>Данное окно появилось автоматически, потому что Вы удалили ссылку на автора скрипта внизу страницы! Пожалуйста, верните ссылку наместо!  В противном случае посетители вашего проекта будут видеть это сообщение.</font>";
        document.body.insertBefore(uguideban, document.body.firstChild);
    }
}