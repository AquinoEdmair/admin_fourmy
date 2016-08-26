<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <style media="screen">
          table tr th{
            padding: 10px;
          }
        </style>
    </head>
    <body>
        <h2>Servicio contrado</h2>
        <div style="padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;">
    <div style="margin-right: -15px; margin-left: -15px;">
        <div style="width: 100%;float: left;position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;box-sizing: border-box;">
            <div style="border-radius: 3px; box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
                        padding: 15px 25px; text-align: left; display: block; margin-top: 15px;margin-bottom: 10px;box-sizing: border-box;">
                        <img src="{{url('/')}}/img/logo.png" width="60px" height="58px" alt="logotipo" />
                        <br>
                    <br />
                    <p style="text-align:justify;font-style:normal;font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;
                                                font-size: 14px;">Hola <b>{{$data["nombre"]}}</b>,</p>
                                                <br/>
                    <p style="text-align:justify;font-style:normal;font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;
                                                font-size: 14px;">Gracias por solicitar un servicio, a continuación te mostramos los detalles:</p>

                    <br />
                    <table>
                      <tr>
                        <th>Servicio: </th>
                        <td>{{$data["servicio"]}}</td>
                      </tr>
                      <tr>
                        <th>Precio: </th>
                        <td>{{$data["precio"]}}</td>
                      </tr>
                      <tr>
                        <th>Fecha: </th>
                        <td>{{$data["fecha"]}}</td>
                      </tr>
                      <tr>
                        <th>Hora: </th>
                        <td>{{$data["hora"]}}</td>
                      </tr>
                      <tr>
                        <th>Observaciones: </th>
                        <td>{{$data["observaciones"]}}</td>
                      </tr>
                    </table>
                    <br /><br />
                    <p style="text-align:center;font-style:italic;font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;
                                                font-size: 12px;">Esto es unicamente una notificación de correo electrónico. Por favor, no responda a este mensaje.</p>


            </div>
        </div>

    </div>
</div>
    </body>
</html>
