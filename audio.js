addEventListener("load", function () {
    //return;
    var formatTime = function (seconds) {
        seconds = seconds.toFixed(0);
        minutes = Math.floor(seconds / 60);
        seconds = seconds % 60;
        if (seconds < 10) {
            seconds = "0" + seconds;
        }
        return minutes + ":" + seconds;
    }
    function player(audio) {
        audio.controls = false;
        audio.style.display = "none";
        audio.addEventListener("timeupdate", function () {
            progress.style.width = 100 * audio.currentTime / audio.duration + "px";
            currentTime.data = formatTime(audio.currentTime);
        }, false);
        //audio.addEventListener("volumechange", function () {
        //    progress.style.width = 100 * audio.volume + "px";
        //}, false);
        var div = document.createElement("div");
        var button = document.createElement("button");
        button.addEventListener("click", function () {
            if (audio.paused) {
                audio.play();
                label.data = "\"";
            } else {
                audio.pause();
                label.data = ">";
            }
        }, false);
        var label = document.createTextNode(">");
        button.appendChild(label);
        div.appendChild(button);
        var progressOuter = document.createElement("span");
        progressOuter.style.display = "inline-block";
        progressOuter.style.width = "100px";
        progressOuter.style.height = "20px";
        progressOuter.style.backgroundColor = "red";
        progressOuter.addEventListener("click", function (event) {
            var percentage = event.clientX - this.offsetLeft;
            audio.currentTime = audio.duration * percentage / 100;
            //audio.volume = percentage / 100;
        }, false);
        var progress = document.createElement("span");
        progress.style.display = "inline-block";
        //progress.style.width = "200px";
        progress.style.height = "10px";
        progress.style.backgroundColor = "green";
        progressOuter.appendChild(progress);
        div.appendChild(progressOuter);
        var currentTime = document.createTextNode("0:00");
        div.appendChild(currentTime);
        var muteButton = document.createElement("button");
        muteButton.addEventListener("click", function () {
            if (audio.volume == 0) {
                audio.volume = 1;
            } else {
                audio.volume = 0;
            }
        }, false);
        var muteButtonLabel = document.createTextNode("M");
        muteButton.appendChild(muteButtonLabel);
        div.appendChild(muteButton);
        return div;
    }
    var audios = document.getElementsByTagName("audio");
    // TODO: filter by class!
    for (var i = 0; i < audios.length; ++i) {
        var audio = audios[i];
        audio.parentNode.appendChild(player(audio));
    }
}, false);
