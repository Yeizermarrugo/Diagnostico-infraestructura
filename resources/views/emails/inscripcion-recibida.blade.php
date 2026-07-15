<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Confirmación de inscripción</title>
</head>

<body style="font-family:'Instrument Sans',Arial,Helvetica,sans-serif;background:#f5f7fb;margin:0;padding:0;">
    <div
        style="max-width:520px;margin:32px auto;background:#fff;border-radius:15px;box-shadow:0 6px 32px rgba(24,79,164,0.13);padding:36px 32px 28px 32px;border:1.2px solid #e9ecef;">
        <!-- Logos centrados con tabla para máxima compatibilidad en emails -->
        <div style="width:100%;text-align:center;margin-bottom:18px;">
            <table align="center" style="margin:0 auto;border-collapse:collapse;">
                <tr>
                      <td>
                        <img src="{{ $message->embed(public_path('img/Logo-MinTic.png')) }}"
                            alt="Mintic"
                            style="height:56px;width:auto;vertical-align:middle;background:#fff;border-radius:8px;box-shadow:0 2px 10px rgba(30,60,90,0.10);padding:8px 18px;object-fit:contain;display:inline-block;">
                    </td>
                    <td style="padding-right:28px;">
                        <img src="{{ $message->embed(public_path('img/Logo-Unicartagena2.png')) }}"
                            alt="Unicartagena"
                            style="height:56px;width:auto;vertical-align:middle;background:#fff;border-radius:8px;box-shadow:0 2px 10px rgba(30,60,90,0.10);padding:8px 18px;object-fit:contain;display:inline-block;">
                    </td>
                </tr>
            </table>
        </div>

        <h2
            style="color:#184fa4;font-size:1.4rem;font-weight:700;margin-bottom:16px;text-align:center;letter-spacing:-0.5px;">
            Hola {{ $inscripcion->nombres }} {{ $inscripcion->apellidos }},
        </h2>
        <div
            style="background:#f0f5ff;border-radius:10px;padding:12px 18px;margin:18px 0;font-size:1.01rem;color:#184fa4;border-left:5px solid #e9b121;">
            Tu inscripción al evento <strong>"Fortaleciendo un Estado digital seguro y confiable: Lineamientos de
                seguridad y privacidad de la información para sistemas de IA"</strong> ha sido recibida exitosamente.
        </div>
        <p style="font-size:1.07rem;color:#363a46;margin-bottom:12px;line-height:1.7;text-align:left;">
            <strong>Entidad:</strong> {{ strtoupper($inscripcion->nombre_entidad) }}
        </p>
        <p style="font-size:1.07rem;color:#363a46;margin-bottom:12px;line-height:1.7;text-align:left;">
            <strong>Cargo:</strong> {{ $inscripcion->cargo }}
        </p>
        <p style="font-size:1.07rem;color:#363a46;margin-bottom:12px;line-height:1.7;text-align:left;">
            <strong>Correo:</strong> {{ $inscripcion->correo_institucional ?? $inscripcion->correo_personal }}
        </p>
        <p style="font-size:1.07rem;color:#363a46;margin-bottom:20px;line-height:1.7;text-align:left;">
            <strong>Fecha:</strong> Jueves 30 de julio de 2026, de 8:00 a. m. a 1:00 p. m. (registro desde las 7:15
            a. m.)<br>
            <strong>Lugar:</strong> Hotel Bogotá Plaza, Carrera 18A # 100 - 41, Bogotá D. C.<br>
            Favor llevar computador portátil pues se realizarán sesiones prácticas durante el evento.
        </p>
        <p style="font-size:1.07rem;color:#363a46;margin-bottom:12px;line-height:1.7;text-align:left;">
            Tu inscripción será validada por el equipo organizador. Pronto recibirás más información sobre el
            proceso.
        </p>
        <div style="font-size:1.15rem;font-weight:600;color:#e79d19;text-align:center;margin-top:24px;">
            ¡Gracias por participar!
        </div>
    </div>
</body>

</html>
