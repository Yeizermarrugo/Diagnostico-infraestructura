<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Confirmación de postulación</title>
</head>

<body style="font-family:'Instrument Sans',Arial,Helvetica,sans-serif;background:#f5f7fb;margin:0;padding:0;">
    <div
        style="max-width:520px;margin:32px auto;background:#fff;border-radius:15px;box-shadow:0 6px 32px rgba(24,79,164,0.13);padding:36px 32px 28px 32px;border:1.2px solid #e9ecef;">
        <div style="width:100%;text-align:center;margin-bottom:18px;">
            <table align="center" style="margin:0 auto;border-collapse:collapse;">
                <tr>
                    <td>
                        <img src="{{ $message->embed(public_path('img/Logo-MinTic.png')) }}" alt="Mintic"
                            style="height:56px;width:auto;vertical-align:middle;background:#fff;border-radius:8px;box-shadow:0 2px 10px rgba(30,60,90,0.10);padding:8px 18px;object-fit:contain;display:inline-block;">
                    </td>
                    <td style="padding-right:28px;">
                        <img src="{{ $message->embed(public_path('img/Logo-Unicartagena2.png')) }}" alt="Unicartagena"
                            style="height:56px;width:auto;vertical-align:middle;background:#fff;border-radius:8px;box-shadow:0 2px 10px rgba(30,60,90,0.10);padding:8px 18px;object-fit:contain;display:inline-block;">
                    </td>
                </tr>
            </table>
        </div>

        <h2
            style="color:#184fa4;font-size:1.4rem;font-weight:700;margin-bottom:16px;text-align:center;letter-spacing:-0.5px;">
            Hola {{ $postulacion->nombres_apellidos }},
        </h2>
        <div
            style="background:#f0f5ff;border-radius:10px;padding:12px 18px;margin:18px 0;font-size:1.01rem;color:#184fa4;border-left:5px solid #e9b121;">
            Gracias por diligenciar el <strong>Formulario de Información Complementaria para la Selección de
            Entidades Beneficiarias</strong> del Proyecto IA para el Estado.
        </div>
        <p style="font-size:1.07rem;color:#363a46;margin-bottom:12px;line-height:1.7;text-align:left;">
            <strong>Entidad:</strong> {{ strtoupper($postulacion->nombre_entidad) }}
        </p>
        <p style="font-size:1.07rem;color:#363a46;margin-bottom:12px;line-height:1.7;text-align:left;">
            <strong>Cargo:</strong> {{ $postulacion->cargo }}
        </p>
        <p style="font-size:1.07rem;color:#363a46;margin-bottom:20px;line-height:1.7;text-align:left;">
            <strong>Correo:</strong> {{ $postulacion->correo_institucional }}
        </p>
        <p style="font-size:1.07rem;color:#363a46;margin-bottom:12px;line-height:1.7;text-align:left;">
            La información registrada será revisada por el equipo del proyecto como parte del proceso de
            evaluación y selección. Recuerde que el diligenciamiento de este formulario
            <strong>no implica la selección automática</strong> de la entidad como beneficiaria. Una vez
            finalizada la etapa de revisión, se informarán los resultados y pasos a seguir a través de los
            canales oficiales del proyecto.
        </p>
        <div style="font-size:1.15rem;font-weight:600;color:#e79d19;text-align:center;margin-top:24px;">
            ¡Gracias por su interés en participar!
        </div>
    </div>
</body>

</html>
