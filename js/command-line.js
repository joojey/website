// JS FOR COMMAND LINE IMITATION
function commandlineScrollEvent(){

    let commandline = document.getElementById("web-command-line");

    let y = window.pageYOffset;
    let windowWidth = window.innerWidth;
    let x;

// WINDOW WIDTHS
    if (windowWidth <= 599 ) {
      x = 300;
    }

    if (windowWidth >= 600 ) {
      x = 800;
    }

    if (windowWidth >= 900 ) {
      x = 800;
    }

    if (windowWidth >= 1200 ) {
      x = 400;
    }

    if (windowWidth >= 1900 ) {
      x = 400;
    }

    if (windowWidth >= 2190 ) {
      x = 200;
    }

    if (windowWidth >= 3000 ) {
      x = 0;
    }

// MESSAGES
    let command0 = '<span style="color:#b7f570">guest@get-access</span><span>:</span><span style="color:#03a9f4">~</span>$ ';
    let command1 = 'sudo apt-get update persoenliche-informationen';
    let cursor = '<span id="command-line-cursor"></span><br>';
    let command2 = '<br>Reading package lists... Done<br>Building dependency tree<br>Reading state information... Done<br><br>Das folgende optinale Paket wird bereitgestellt:<br>&nbsp;&nbsp;kontaktiere-mich<br><br>Empfohlene Pakete:<br>&nbsp;&nbsp;meine-projekte<br><br>Moechtest du weitere Informationen ueber mich?: [Y/n]';
    let command3 = ' Y';
    let command4 = '.';
    let command5 = '<br>Zugang wird bereitgestellt<br>';
    let loading1 = '<br>0% [Working]';
    let loading2 = '<br>0% [Connecting to git/repo/website]';
    let loading3 = '<br>10% [Loading website]';
    let loading4 = '<br>45% [Loading website]';
    let loading5 = '<br>91% [Loading website]';
    let command6 = '<br>Du erhaelst nun weitere Informationen. Ich hoffe dir hat meine kleine JavaScript-Sequenz gefallen.';

// MESSAGES TO APPEAR AT SPECIFIC HEIGHTS
    if(y >= 0-x){
        commandline.innerHTML = command0 + cursor;
    }

    if(y >= 900-x){
        commandline.innerHTML = command0 + command1 + cursor;
    }

    if(y >= 1100-x){
        commandline.innerHTML = command0 + command1 + command2 + cursor;
    }

    if(y >= 1200-x){
        commandline.innerHTML = command0 + command1 + command2 + command3 + cursor;
    }

    if(y >= 1250-x){
        commandline.innerHTML += command4;
    }

    if(y >= 1275-x){
        commandline.innerHTML += command4;
    }

    if(y >= 1300-x){
        commandline.innerHTML += command4;
    }

    if(y >= 1350-x){
        commandline.innerHTML = command0 + command1 + command2 + command3 + command5;
    }

    if(y >= 1375-x){
        commandline.innerHTML += loading1;
    }

    if(y >= 1400-x){
      commandline.innerHTML = command0 + command1 + command2 + command3 + command5 + loading2;
    }

    if(y >= 1420-x){
        commandline.innerHTML = command0 + command1 + command2 + command3 + command5 + loading3;
    }

    if(y >= 1450-x){
        commandline.innerHTML = command0 + command1 + command2 + command3 + command5 + loading4;
    }

    if(y >= 1475-x){
        commandline.innerHTML = command0 + command1 + command2 + command3 + command5 + loading5;
    }

    if(y >= 1500-x){
        commandline.innerHTML = command0 + command1 + command2 + command3 + command5 + command6;
    }

    if(y >= 1550-x){
        commandline.innerHTML += "<br>" + command0 + cursor;
        commandline.style.opacity = 1;
    }
}
