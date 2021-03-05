# vuelos_php_cliente_servidor

####Configurar bbd:
Para configurar la base de datos modificar el archivo conexion.php

####Configurar js:
Para que todo funcione de manera correcta actualizar los enlaces al final de cada metodo de Vuelos.js

#### leeVuelo.php
**GET**

Devuelve todos los vuelos.

Para hacer una búsqueda:
```
{
   "id": 1
}
```

#### escribirVuelo.php
**POST**
```
{
    "codigo": "qw21",
	"origen": "Bilbao",
	"destino": "Madrid",
	"fecha": 19/02/2000,
	"hora": "12:00",
	"plazas": 350,
	"plazas_libres": 3
}
```

#### updateVuelo.php
**PUT**
```
{
    "id": 1
  "codigo": "qw21",
	"origen": "Bilbao",
	"destino": "Madrid",
	"fecha": 19/02/2000,
	"hora": "12:00",
	"plazas": 350,
	"plazas_libres": 3

}
```

#### deleteVuelo.php
**PUT**
```
{
    "id": 1
}
```
