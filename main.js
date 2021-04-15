// stopwatch functions...
var Stopwatch = function(elem, options) {
  var timer = createTimer(), 
    startButton = createButton("start", start),
    stopButton = createButton("stop", stop),
    resetButton = createButton("reset", reset),
    divTable = createDiv("table-block"),
    table = createTable(),
    tr1 = createTr(),
    tr2 = createTr(),
    tdBiaya = createTd("Biaya", '100px' ),
    tdJamMulai = createTd("Jam Mulai", '100px'),
    offset,
    clock,
    interval;

  // default options
  options = options || {};
  options.delay = options.delay || 1;

  // append elements     
  elem.appendChild(timer);
  tr1.appendChild(tdBiaya);
  tr2.appendChild(tdJamMulai);
  table.appendChild(tr1);
  table.appendChild(tr2);
  elem.appendChild(table);
  elem.appendChild(startButton);
  elem.appendChild(stopButton);
  elem.appendChild(resetButton);

  // initialize
  reset();

  // private functions
  function createTimer() {
    var a = document.createElement("div");
    a.className = "countStopwatch";
    return a
  }
  function createDiv(name) {
    a = document.createElement("div");
    a.className = name;
    return a 
  }
  function createTr(){
    return document.createElement("tr");
  }
  function createTable(){
    return document.createElement("table");
  }
  function createTd(innerHTML, width){
    var a = document.createElement("td");
    a.innerHTML = innerHTML;
    a.style.width = width;
    return a;
  }

  function createButton(action, handler) {
    var a = document.createElement("a");
    a.href = "#" + action;
    a.innerHTML = action;
    a.addEventListener("click", function(event) {
      handler();
      event.preventDefault();
    });
    return a;
  }

  function start() {
    if (!interval) {
      offset = Date.now();
      interval = setInterval(update, options.delay);
    }
  }

  function stop() {
    if (interval) {
      clearInterval(interval);
      interval = null;
    }
  }

  function reset() {
    clock = 0;
    render(0);
  }

  function update() {
    clock += delta();
    render();
  }

  function render() {
    var h = Math.floor(clock / (1000 * 60 * 60)) % 24;
    var m = Math.floor(clock / (1000 * 60)) % 60;
    var s = Math.floor(clock / 1000) % 60;
    var ms = Math.floor(clock % 1000);

    if (h < 10) {
      h = "0" + h;
    }
    if (m < 10) {
      m = "0" + m;
    }
    if (s < 10) {
      s = "0" + s;
    }
    if (ms < 100) {
      ms = "0" + ms;
    }
    if (ms < 10) {
      ms = "0" + ms;
    }

    timer.innerHTML = h + ':' + m + ':' + s + '::' + ms;

  }

  function delta() {
    var now = Date.now(),
      d = now - offset;

    offset = now;
    return d;
  }

  this.start = start;
  this.stop = stop;
  this.reset = reset;
};


var elems = document.getElementsByClassName("basic");
for (var i = 0, len = elems.length; i < len; i++) {
  new Stopwatch(elems[i]);
}

function display_ct5() {
    var x = new Date()
    var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';

        var x1 = x.getHours( )+ ":" +  x.getMinutes() + ":" +  x.getSeconds() + ":" + ampm;
        document.getElementById('ct5').innerHTML = x1;
        display_c5();
    }
function display_c5(){
    var refresh=1000; // Refresh rate in milli seconds
    mytime=setTimeout('display_ct5()',refresh)
}
display_c5()