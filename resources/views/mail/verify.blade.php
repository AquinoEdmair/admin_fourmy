<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Verifica tu direccion de E-mail</h2>
        <img src="{{url('/')}}/img/logo.png" width="60px" height="58px" alt="logotipo" />
        <div style="padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;">
    <div style="margin-right: -15px; margin-left: -15px;">
        <div style="width: 100%;float: left;position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;box-sizing: border-box;">
            <div style="border-radius: 3px; box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
                        padding: 15px 25px; text-align: left; display: block; margin-top: 15px;margin-bottom: 10px;box-sizing: border-box;">

                    <br />
                    <p style="text-align:justify;font-style:normal;font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;
                                                font-size: 14px;">Hola <b>{{$data["nombre"]}}</b>,</p>
                    <br />
                    <p style="text-align:justify;font-style:normal;font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;
                                                font-size: 14px;">Gracias por haberte registrado en Fourmy, por favor confirma tu registro!</p>

                    <p style="text-align:justify;font-style:normal;font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;
                                                font-size: 14px;"><a href="http://localhost/fourmy/public/usuariocliente/confirmar/{{$data["confirmation_code"]}}">Confirmar aquí.</a></p>

                    <br /><br />
                    <br /><br />
                    <p style="text-align:center;font-style:italic;font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;
                                                font-size: 12px;">Esto es unicamente una notificación de correo electrónico. Por favor, no responda a este mensaje.</p>


            </div>
        </div>

    </div>
</div>
    </body>
</html>
