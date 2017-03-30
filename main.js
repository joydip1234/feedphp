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
                
                $('notification').style.marginTop = 20+"vh";
                $('notification').style.transform = "scale(1)";
                $('notification').style.opacity = "1";
                $('notification').innerHTML = ('data successfully stored ' + txt[0]);
                setTimeout(function () {
                    $('notification').style.transform = "scale(0)";
                    $('notification').style.opacity = "0";
                    setTimeout(function(){
                        
                        $('notification').style.marginTop = -50+"vh"; 
                    },1000);
                }, 2000);
            }
        });
    }
});