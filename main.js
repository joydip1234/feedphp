/**
 * Created by Sudipta on 3/29/2017.
 */
function $(e) {
    return document.getElementById(e);
}

window.addEventListener('load', function () {

    $("submitBtn").onclick = function (e) {
        e.preventDefault();
        e.stopPropagation();
        var req = new XMLHttpRequest();
        var data = new FormData();
        data.append('ajax', true);
        data.append('name', $('name').value);
        data.append('mail', $('mail').value);
        data.append('feed', $('feed').value);
        req.open('POST', 'resp.php', true);
        req.send(data);


        req.addEventListener('readystatechange', function () {
            if (this.readyState == 4 && this.status == 200) {
                var txt = eval(this.response);
                var name = txt.split(":");
                $('notification').style.display = "block";
                $('notification').innerHTML = ('data successfully stored ' + name[0]);
                setTimeout(function () {
                    $('notification').style.display = "none";
                }, 5000);
            }
        });
    }

});