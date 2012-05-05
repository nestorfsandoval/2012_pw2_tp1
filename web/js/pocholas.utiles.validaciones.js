function esBisiesto(yy)
{/*q hace: verifica si un anio es bisiesto o no
 q recibe: un entero
 q devuelve: verdadero si es bisiesto o falso en caso contrario
 pre: yy entero
 pos: no tiene
 con err: no tiene
 */
    return ((yy % 4 == 0) && (yy % 100 != 0)) || (yy % 400 == 0)    
};

function diasMes(mm,yy)
{/*que hace:dado un mes y un anio determina la cantidad de dias del mes.
que recibe:dos enteros que representan el mes y el anio.
que devuelve:cantidad de dias que corresponden al mes ingresado.
prec:mm,yy numeros enteros
posc:no tiene
cond.err.:-1 si mm no esta en [1..12]*/

    switch (mm)
    {
        case 1:
        case 3:
        case 5:
        case 7:
        case 8:
        case 10:
        case 12:
                return 31;
        case 4:
        case 6:
        case 9:
        case 11:
                return 30;
        case 2: 
                if (esBisiesto(yy))
                {
                    return 29;
                }
                else
                {
                    return 28;
                }
        default:
                return -1;
    }
};

function posibleFecha(fecha)
{/*que hace:valida la consistencia de una fecha.
que recibe:una cadena representativa de la fecha.
que devuelve:Verdadero si es fecha valida. Falso en cualquier otro caso.
prec:no tiene
posc:no tiene
cond.err.:no tiene*/

     var max = 10;
     var valida = false;
	 
     var dd = parseInt(fecha.substring(0,2));
     var mm = parseInt(fecha.substring(3,5));
     var yy = parseInt(fecha.substring(6,10));
	 var longitud = fecha.length;
	 
     if ((longitud <= max) && (dd >= 1 && dd <= 31) && (mm >=1 && mm <= 12) && (yy >= 0) && (fecha.substring(2,3) =='/') && (fecha.slice(5,6) =='/'))
     {
        valida = (diasMes(mm,yy) >= dd);
     }
     return valida
};