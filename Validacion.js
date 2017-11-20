//Validacion del digito verificador

function validacion(){
    
    var rut = document.getElementById("rut").value;
    rut = rut.toString().split("").reverse().join("");
    
    var suma = 0;
    var mult = 2;
    
    for(var i=0; i<=rut.length-1;i++){
 
        suma = suma + (rut[i] * mult);
        
        if(mult==7){
            mult=2;
        }
        else{
            mult++;
        }
                     
    }
    
    
    var dv = 11-(suma % 11);
    //console.log(dv);
    
    if(dv==10){
        dv='k';
    }else{
        if(dv==11){
        dv=0;
    }
    }
    
                
    var digitov = document.getElementById("dv").value;
    
    
    if(digitov == dv){
        //alert('DV correcto');
        return true;
    }
    else{
        alert('DV incorrecto');
        return false;
    }
}
            
     