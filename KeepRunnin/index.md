<!DOCTYPE html>

<html>

<head>
    <title>Keep Runnin</title>
    <style>
        *{
            background-color:#9c9393;
        }
    </style>
</head>

<body>
    <p>Keep Runnin by <b>Furkan Sayan</b></p>
    <table width="1600" height="720px" align="center" cellpadding="0" cellspacing="0" id="tab">
        <tr>
            <th colspan="4" rowspan="2" width="1280" height="720">
                <canvas id="gwin" width="1280" height="720"></canvas>
                <div style="background-color: black; color: whitesmoke;" id="div_info">
                    <h2 style="background-color: black;">
                        You are a runner , who loves running.<br />
                        Jump or slide to overcome the obstacles<br />
                        The more you run , the harder it gets.<br />
                        To jump, press either one of the W or ArrowUp or Space buttons.<br />
                        To slide, press either one of the S or ArrowDown or LeftCtrl buttons.<br />
                        For mobile , you can use the buttons on the right.<br />
                        <img src="images/butUp.png" width="80" height="90" />
                        <img src="images/butDown.png" width="80" height="90" /><br />
                        Have fun , and always hit the ground RUNNIN<br />
                    </h2>
                    <img src="images/play.png" id="playBut" /><br />
                    <img src="images/char_run1.png" /><img src="images/char_run2.png" />
                    <img src="images/char_run3.png" /><img src="images/char_run4.png" />
                </div>
            </th>
            <th>
                <img id="upBut" src="images/butUp.png" width="320" height="358" />
            </th>
        </tr>
        <tr>
            <th>
                <img id="downBut" src="images/butDown.png" width="320" height="358" />
            </th>
        </tr>
    </table>
    <p id="score">Score: </p>
    <p id="maxScore">Max Score:</p>
    <script src="code.js"></script>

    <audio id="songID" src="sounds/Chilly.mp3" preload="auto" loop></audio>

</body>

</html>