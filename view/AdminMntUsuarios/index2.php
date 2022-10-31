<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog del viajero CMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>



</head>
<body >
<form name="f1"> 
    <select name=pais onchange="cambia_provincia()"> 
    <option value="0" selected>Seleccione... 
    <option value="1">España 
    <option value="2">Argentina 
    <option value="3">Colombia 
    <option value="4">Francia 
    </select>
    
    <select name=provincia> 
    <option value="-">- 
    </select> 
  </form>


  <script>
  var provincias_1=new Array("-","Andalucía","Asturias","Baleares","Canarias","Castilla y León","Castilla-La Mancha","...");
  var provincias_2=new Array("-","Salta","San Juan","San Luis","La Rioja","La Pampa","...");
  var provincias_3=new Array("-","Cali","Santamarta","Medellin","Cartagena","...");
  var provincias_4=new Array("-","Aisne","Creuse","Dordogne","Essonne","Gironde ","...");

  var todasProvincias = [
    [],
    provincias_1,
    provincias_2,
    provincias_3,
    provincias_4,
  ];

  function cambia_provincia(){ 
   	//tomo el valor del select del pais elegido 
   	var pais 
   	pais = document.f1.pais[document.f1.pais.selectedIndex].value 
   	//miro a ver si el pais está definido 
   	if (pais != 0) { 
      	//si estaba definido, entonces coloco las opciones de la provincia correspondiente. 
      	//selecciono el array de provincia adecuado 
      	mis_provincias=todasProvincias[pais]
      	//calculo el numero de provincias 
      	num_provincias = mis_provincias.length 
      	//marco el número de provincias en el select 
      	document.f1.provincia.length = num_provincias 
      	//para cada provincia del array, la introduzco en el select 
      	for(i=0;i<num_provincias;i++){ 
         	document.f1.provincia.options[i].value=mis_provincias[i] 
         	document.f1.provincia.options[i].text=mis_provincias[i] 
      	}	
   	}else{ 
      	//si no había provincia seleccionada, elimino las provincias del select 
      	document.f1.provincia.length = 1 
      	//coloco un guión en la única opción que he dejado 
      	document.f1.provincia.options[0].value = "-" 
      	document.f1.provincia.options[0].text = "-" 
   	} 
   	//marco como seleccionada la opción primera de provincia 
   	document.f1.provincia.options[0].selected = true 
}

  </script>
</body>


</html>