var select = document.getElementById('cbocategoria');
select.addEventListener('change', function(){
    var selectedOption = this.options[select.selectedIndex];
    document.getElementById('titulodetalles').innerHTML = 'Detalles de '+selectedOption.text;
    if(selectedOption.value == 1){
        desvanecer();
        TargetaG();
    }else if(selectedOption.value == 2){
        desvanecer();
        Procesador();
    }else if(selectedOption.value == 3){
        desvanecer();
        DiscoD();
    }else if(selectedOption.value == 4){
        desvanecer();
        FuenteP();
    }else if(selectedOption.value == 5){
        desvanecer();
        MemRam();
    }else if(selectedOption.value == 6){
        desvanecer();
        PlacaB();
    }else{
        desvanecer();
        document.getElementById('btnagregar').disabled = true;
    }

    //console.log(selectedOption.value + ': ' + selectedOption.text);
  });
window.onload = function() {
      desvanecer();
      document.getElementById('btnagregar').disabled = true;
    };
function desvanecer(){
    document.getElementById('detallesTargetaG').style.display = "none";
    document.getElementById('detallesProcesador').style.display = "none";
    document.getElementById('detallesDiscoD').style.display = "none";
    document.getElementById('detallesFuentePoder').style.display = "none";
    document.getElementById('detallesMemoriaRAM').style.display = "none";
    document.getElementById('detallesPlacaBase').style.display = "none";
    document.getElementById('titulodetalles').style.display = "none";
    document.getElementById('btnagregar').disabled = false;
}
function TargetaG(){
    document.getElementById('titulodetalles').style.display = "block";
    document.getElementById('detallesTargetaG').style.display = "block";
}
function Procesador(){
    document.getElementById('titulodetalles').style.display = "block";
    document.getElementById('detallesProcesador').style.display = "block";
}
function DiscoD(){
    document.getElementById('titulodetalles').style.display = "block";
    document.getElementById('detallesDiscoD').style.display = "block";
}
function FuenteP(){
    document.getElementById('titulodetalles').style.display = "block";
    document.getElementById('detallesFuentePoder').style.display = "block";
}
function MemRam(){
    document.getElementById('titulodetalles').style.display = "block";
    document.getElementById('detallesMemoriaRAM').style.display = "block";
}
function PlacaB(){
    document.getElementById('titulodetalles').style.display = "block";
    document.getElementById('detallesPlacaBase').style.display = "block";
}