'use strict';

function $(e) {
    return document.getElementById(e);
}
function makedataAppear(){
    var req = new XMLHttpRequest();
        req.open('GET', 'feedback.csv', true);
        req.send();
        req.upload.addEventListener('progress', function (event) {
            document.getElementsByClassName('spinner')[0].style.display = "block"
        });
        req.upload.addEventListener('load', function (e) {
            document.getElementsByClassName('spinner')[0].style.display = "none"
        });

        req.addEventListener('readystatechange', function () {
            if (this.readyState == 4 && this.status == 200) {
                function parseall(data) {
                      var lines = data.split('\n');
                      var table = "<table><tbody>";
                      for(var i=0;i<lines.length;i++){
                        var words = lines[i].split(',');
                        table+="<tr>"
                        for(var j=0;j<3;j++){
                            table+="<td>"+words[j]+"</td>";
                        }
                        table +="</tr>";
                      }
                      /*var z= lines[lines.length-1].split(',');
                      if(z[0].length >0 && z[0]!='undefined'){
                        var words = lines[i].split(',');
                        table+="<tr>"
                        for(var j=0;j<3;j++){
                            table+="<td>"+words[j]+"</td>";
                        }
                        table +="</tr>";
                      }*/

                      table+="</tbody></table>";
                      $('wrapper').innerHTML = table;
                    }
                    parseall(this.responseText);
                    console.log(this.responseText);
            }
        });
}

$("adminSubmit").onclick = function (e) {
        var req = new XMLHttpRequest();
        var data = new FormData();
        data.append("makedataAppear", true);
        data.append('un', $('uname').value);

        data.append('pw', Sha1.hash($('password').value));
        req.open('POST', 'resp.php', true);
        req.send(data);


        req.addEventListener('readystatechange', function () {
            if (this.readyState == 4 && this.status == 200) {
                if(eval(this.responseText) == "do"){
                    makedataAppear();
                }else{
                    $("wrapper").innerHTML = "Wrong Credentials";
                }
            }
        });        
}




class Sha1 {
    static hash(msg, options) {
        const defaults = { msgFormat: 'string', outFormat: 'hex' };
        const opt = Object.assign(defaults, options);

        switch (opt.msgFormat) {
            default: // default is to convert string to UTF-8, as SHA only deals with byte-streams
            case 'string':   msg = utf8Encode(msg);       break;
            case 'hex-bytes':msg = hexBytesToString(msg); break; // mostly for running tests
        }

        // constants [§4.2.1]
        const K = [ 0x5a827999, 0x6ed9eba1, 0x8f1bbcdc, 0xca62c1d6 ];

        // initial hash value [§5.3.1]
        const H = [ 0x67452301, 0xefcdab89, 0x98badcfe, 0x10325476, 0xc3d2e1f0 ];

        // PREPROCESSING [§6.1.1]

        msg += String.fromCharCode(0x80);  // add trailing '1' bit (+ 0's padding) to string [§5.1.1]

        // convert string msg into 512-bit/16-integer blocks arrays of ints [§5.2.1]
        const l = msg.length/4 + 2; // length (in 32-bit integers) of msg + ‘1’ + appended length
        const N = Math.ceil(l/16);  // number of 16-integer-blocks required to hold 'l' ints
        const M = new Array(N);

        for (let i=0; i<N; i++) {
            M[i] = new Array(16);
            for (let j=0; j<16; j++) {  // encode 4 chars per integer, big-endian encoding
                M[i][j] = (msg.charCodeAt(i*64+j*4+0)<<24) | (msg.charCodeAt(i*64+j*4+1)<<16)
                        | (msg.charCodeAt(i*64+j*4+2)<< 8) | (msg.charCodeAt(i*64+j*4+3)<< 0);
            } // note running off the end of msg is ok 'cos bitwise ops on NaN return 0
        }
        // add length (in bits) into final pair of 32-bit integers (big-endian) [§5.1.1]
        // note: most significant word would be (len-1)*8 >>> 32, but since JS converts
        // bitwise-op args to 32 bits, we need to simulate this by arithmetic operators
        M[N-1][14] = ((msg.length-1)*8) / Math.pow(2, 32); M[N-1][14] = Math.floor(M[N-1][14]);
        M[N-1][15] = ((msg.length-1)*8) & 0xffffffff;

        // HASH COMPUTATION [§6.1.2]

        for (let i=0; i<N; i++) {
            const W = new Array(80);

            // 1 - prepare message schedule 'W'
            for (let t=0;  t<16; t++) W[t] = M[i][t];
            for (let t=16; t<80; t++) W[t] = Sha1.ROTL(W[t-3] ^ W[t-8] ^ W[t-14] ^ W[t-16], 1);

            // 2 - initialise five working variables a, b, c, d, e with previous hash value
            let a = H[0], b = H[1], c = H[2], d = H[3], e = H[4];

            // 3 - main loop (use JavaScript '>>> 0' to emulate UInt32 variables)
            for (let t=0; t<80; t++) {
                const s = Math.floor(t/20); // seq for blocks of 'f' functions and 'K' constants
                const T = (Sha1.ROTL(a,5) + Sha1.f(s,b,c,d) + e + K[s] + W[t]) >>> 0;
                e = d;
                d = c;
                c = Sha1.ROTL(b, 30) >>> 0;
                b = a;
                a = T;
            }

            // 4 - compute the new intermediate hash value (note 'addition modulo 2^32' – JavaScript
            // '>>> 0' coerces to unsigned UInt32 which achieves modulo 2^32 addition)
            H[0] = (H[0]+a) >>> 0;
            H[1] = (H[1]+b) >>> 0;
            H[2] = (H[2]+c) >>> 0;
            H[3] = (H[3]+d) >>> 0;
            H[4] = (H[4]+e) >>> 0;
        }

        // convert H0..H4 to hex strings (with leading zeros)
        for (let h=0; h<H.length; h++) H[h] = ('00000000'+H[h].toString(16)).slice(-8);

        // concatenate H0..H4, with separator if required
        const separator = opt.outFormat=='hex-w' ? ' ' : '';

        return H.join(separator);

        /* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  */

        function utf8Encode(str) {
            try {
                return new TextEncoder().encode(str, 'utf-8').reduce((prev, curr) => prev + String.fromCharCode(curr), '');
            } catch (e) { // no TextEncoder available?
                return unescape(encodeURIComponent(str)); // monsur.hossa.in/2012/07/20/utf-8-in-javascript.html
            }
        }

        function hexBytesToString(hexStr) { // convert string of hex numbers to a string of chars (eg '616263' -> 'abc').
            const str = hexStr.replace(' ', ''); // allow space-separated groups
            return str=='' ? '' : str.match(/.{2}/g).map(byte => String.fromCharCode(parseInt(byte, 16))).join('');
        }
    }


    /**
     * Function 'f' [§4.1.1].
     * @private
     */
    static f(s, x, y, z)  {
        switch (s) {
            case 0: return (x & y) ^ (~x & z);          // Ch()
            case 1: return  x ^ y  ^  z;                // Parity()
            case 2: return (x & y) ^ (x & z) ^ (y & z); // Maj()
            case 3: return  x ^ y  ^  z;                // Parity()
        }
    }


    /**
     * Rotates left (circular left shift) value x by n positions [§3.2.5].
     * @private
     */
    static ROTL(x, n) {
        return (x<<n) | (x>>>(32-n));
    }

}
if (typeof module != 'undefined' && module.exports) module.exports = Sha1; // ≡ export default Sha1