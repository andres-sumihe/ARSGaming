// stopwatch functions...


var stopwatch =( async (elem, id, options )=> {

  const getTime = async (id)=>{
    try {
      const response = await axios.get('http://localhost:8080/ARSGaming/api/crud/read.php?table=tv'+id+'&waktu=true',
      {
        headers : {"Content-type": "application/json;charset=UTF-8", "Access-Control-Allow-Origin": "*"}
      });
      return response.data
    }catch (err) {
      // console.log(err);
    }
  }
  var data = await getTime(id);
  var waktu_mulai
  var timer = createTimer(), 
    startButton = createButton("start", start),
    stopButton = createButton("stop", stop),
    resetButton = createButton("reset", reset),
    divButton = createDiv("button-block"),
    table = createTable(),
    tr1 = createTr(),
    tr2 = createTr(),
    tdBiaya = createTd("Biaya", '100px', "biaya" ),
    tdJamMulai = createTd("Jam Mulai", '100px', "jamMulai"),
    offset,
    clock,
    interval,
    harga = 0,
    jamMulai = "",
    tdJamMulaiValue = createTd(": "+jamMulai, '100px' ,'jamMulaiValue')
    tdBiayaValue = createTd(": Rp. 0", '100px', 'biayaValue');

  // default options
  options = options || {};
  options.delay = options.delay || 1;

  // append elements     
  elem.appendChild(timer);
  tr1.appendChild(tdBiaya);
  tr1.appendChild(tdBiayaValue);
  tr2.appendChild(tdJamMulai);
  tr2.appendChild(tdJamMulaiValue);
  table.appendChild(tr1);
  table.appendChild(tr2);
  elem.appendChild(table);
  divButton.appendChild(startButton);
  divButton.appendChild(stopButton);
  divButton.appendChild(resetButton);
  elem.appendChild(divButton);

  var mogaJadiHehe = document.getElementById('biayaValue'+id);
  // initialize
  reset();

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
  function createTd(innerHTML, width, idName){
    var a = document.createElement("td");
    a.id = idName+id;
    a.innerHTML = innerHTML;
    a.style.width = width;
    return a;
  }

  function createButton(action, handler) {
    var a = document.createElement("button");
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
      var x = new Date()
      var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';
      jamMulai = x.getHours( )+ ":" +  x.getMinutes() + ":" +  x.getSeconds()  + ampm;
      tdJamMulaiValue.innerHTML = ": "+jamMulai;
      interval = setInterval(update, 1000);
    }
    $.post(window.location.pathname+'/index.php', {
      name: "tv"+id,
      time: offset
    }, function(response) {
      // Log the response to the console
      console.log("Response: "+response);
    });
  }

  function stop() {
    if (interval) {
      clearInterval(interval);
      interval = null;
    }
  }

  function reset() {
    clock = 0;
    harga = 0;
    jamMulai = "";
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

    if (h < 10) {
      h = "0" + h;
    }
    if (m < 10) {
      m = "0" + m;
    }
    if (s < 10) {
      s = "0" + s;
    }
    (s % 5 == 0) ? harga+=6.9 : harga = harga; 

    timer.innerHTML = h + ':' + m + ':' + s ;
    mogaJadiHehe.innerHTML = ": Rp. "+ harga.toFixed(2);

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
});


var elems = document.getElementsByClassName("basic");
for (var i = 0, len = elems.length; i < len; i++) {
  stopwatch(elems[i], i);
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

window.addEventListener('beforeunload', function (e) {
  e.preventDefault();
  e.returnValue = '';
});