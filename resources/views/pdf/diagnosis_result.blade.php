<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>DermLog - Bemor Ma'lumotlari</title>
        <style>
            /* Umumiy shrift va tana o'lchami */
            body {
                font-family: DejaVu Sans, sans-serif;
                font-size: 12px;
                margin: 0;
                padding: 0;
                background: #fff;
                color: #000;
            }
            /* Jadval elementlari */
            table {
                width: 100%;
                border-collapse: collapse;
            }
            th, td {
                padding: 5px;
                text-align: left;
            }
            th {
                background-color: #f9f9f9;
                color: #000;
                font-weight: normal;
                width: 30%;
            }
            /* Sarlavhalar */
            h1 {
                font-size: 20px;
                color: #2F4F4F;
                margin: 0;
            }
            h3 {
                font-size: 14px;
                margin-bottom: 10px;
            }
            /* Ranglar sarlavhalar uchun */
            .header-blue {
                color: #007bff;
                border-bottom: 1px solid #ccc;
            }
            .header-cyan {
                color: #17a2b8;
                border-bottom: 1px solid #ccc;
            }
            .header-green {
                color: #28a745;
                border-bottom: 1px solid #ccc;
            }
            /* Logo uchun aylana */
            .logo {
                height: 50px;
                width: 50px;
                border-radius: 50%;
                object-fit: cover;
                border: 1px solid #ccc;
            }
            /* Header konteyner */
            .header-container {
                width: 100%;
                display: flex;
                justify-content: space-between;
                align-items: center;
                border-bottom: 1px solid #2F4F4F;
                padding-bottom: 10px;
                margin-bottom: 20px;
            }
        </style>
    </head>

    <body style="margin: 0; padding: 0; font-family: DejaVu Sans, sans-serif; font-size: 12px;">
        <div style="width: 100%; max-width: 900px; margin: 0 auto; padding: 20px; background: #fff;">
            <div style="position: absolute; top: 10px; right: 10px; font-size: 10px; color: #666;">
                {{ now()->format('Y-m-d H:i:s') }}
            </div>
            <!-- Header -->
            <div style="display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid #2F4F4F; padding-bottom: 10px; margin-bottom: 20px;">
                <h1 style="margin: 0; color: #2F4F4F; font-size: 20px;">DermLog</h1>
                <img src="{{ public_path('project/logo.jpg') }}" style="height: 50px; width: 50px; border-radius: 50%; object-fit: cover; border: 1px solid #ccc;">
            </div>
            <section style="margin-bottom: 10px;">
                <h3 style="color: #007bff; font-size: 14px; border-bottom: 1px solid #ccc; margin-bottom: 10px;">Bemor maʼlumotlari</h3>
                <table style="width: 100%; border-collapse: collapse;">
                    <tr><th style="background: #f9f9f9; padding: 5px;">Ismi:</th><td style="padding: 5px;">{{ $patient->name }}</td></tr>
                    <tr><th style="background: #f9f9f9; padding: 5px;">Familiyasi:</th><td style="padding: 5px;">{{ $patient->surname }}</td></tr>
                    <tr><th style="background: #f9f9f9; padding: 5px;">Tug‘ilgan sana:</th><td style="padding: 5px;">{{ $patient->birth }}</td></tr>
                    <tr><th style="background: #f9f9f9; padding: 5px;">Passport:</th><td style="padding: 5px;">{{ $patient->passport }}</td></tr>
                    <tr><th style="background: #f9f9f9; padding: 5px;">Telefon:</th><td style="padding: 5px;">{{ $patient->phone }}</td></tr>
                    <tr><th style="background: #f9f9f9; padding: 5px;">Jinsi:</th><td style="padding: 5px;">{{ $patient->gender }}</td></tr>
                </table>
            </section>
            <section style="margin-bottom: 10px;">
                <h3 style="color: #17a2b8; font-size: 14px; border-bottom: 1px solid #ccc; margin-bottom: 10px;">Asosiy ma'lumotlar</h3>
                <table style="width: 100%; border-collapse: collapse;">
                    <tr><th style="background: #f9f9f9; padding: 5px;">Teri turi:</th><td style="padding: 5px;">{{ $assesment->skin_type }}</td></tr>
                    <tr><th style="background: #f9f9f9; padding: 5px;">Oilaviy tarix:</th><td style="padding: 5px;">{{ $assesment->family_history ? 'Bor' : 'Yo‘q' }}</td></tr>
                    <tr><th style="background: #f9f9f9; padding: 5px;">Quyoshga taʼsir tarixi:</th><td style="padding: 5px;">{{ $assesment->sun_exposure_history }}</td></tr>
                    <tr><th style="background: #f9f9f9; padding: 5px;">Immun holatlar:</th><td style="padding: 5px;">{{ $assesment->immune_conditions }}</td></tr>
                    <tr><th style="background: #f9f9f9; padding: 5px;">Olib tashlangan nevi soni:</th><td style="padding: 5px;">{{ $assesment->removed_nevi_count }}</td></tr>
                    <tr><th style="background: #f9f9f9; padding: 5px;">Lezyon joylashuvi:</th><td style="padding: 5px;">{{ $assesment->lesion_location }}</td></tr>
                    <tr><th style="background: #f9f9f9; padding: 5px;">Lezyon diametri:</th><td style="padding: 5px;">{{ $assesment->lesion_diameter }} mm</td></tr>
                    <tr><th style="background: #f9f9f9; padding: 5px;">Lezyon shakli:</th><td style="padding: 5px;">{{ $assesment->lesion_shape }}</td></tr>
                    <tr><th style="background: #f9f9f9; padding: 5px;">Teri o‘zgarishlari:</th><td style="padding: 5px;">{{ $assesment->skin_changes_description }}</td></tr>
                </table>

                @if ($assesment->image)
                    <div style="margin-top: 15px; text-align: center;">
                        <img src="{{ public_path('storage/' . $assesment->image->url) }}" alt="Lezyon rasmi" style="max-height: 250px; border: 1px solid #ccc; padding: 4px;">
                        <p style="font-size: 10px; color: #666;">Lezyon rasmi</p>
                    </div>
                @endif
            </section>

            <!-- Tashxis -->
            <section style="margin-bottom: 10px;">
                <h3 style="color: #28a745; font-size: 14px; border-bottom: 1px solid #ccc; margin-bottom: 10px;">Tashxis natijasi</h3>
                <table style="width: 100%; border-collapse: collapse;">
                    <tr><th style="background: #f9f9f9; padding: 5px;">Natija:</th><td style="padding: 5px;">{{ $diagnosisResult->result }}</td></tr>
                    <tr><th style="background: #f9f9f9; padding: 5px;">Tavsif:</th><td style="padding: 5px;">{{ $diagnosisResult->message }}</td></tr>
                </table>
            </section>

        </div>
    </body>


</html>
