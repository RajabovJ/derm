<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Diagnosis Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }
        .section-title {
            font-size: 16px;
            font-weight: bold;
            margin-top: 20px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 4px;
        }
        .table th, .table td {
            padding: 6px;
            vertical-align: top;
        }
        .img-preview {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body class="p-4">

    <h2 class="text-center mb-4">Diagnosis Report</h2>

    <div class="section-title">👤 Patient Information</div>
    <table class="table table-bordered table-sm">
        <tr>
            <th>Full Name</th><td>{{ $patient->fullname }}</td>
        </tr>
        <tr>
            <th>Birth Date</th><td>{{ $patient->birth_date }}</td>
        </tr>
        <tr>
            <th>Gender</th><td>{{ $patient->gender }}</td>
        </tr>
        <tr>
            <th>Phone</th><td>{{ $patient->phone }}</td>
        </tr>
    </table>

    <div class="section-title">📝 Assessment Details</div>
    <table class="table table-bordered table-sm">
        <tr><th>Location</th><td>{{ $assesment->location }}</td></tr>
        <tr><th>Duration</th><td>{{ $assesment->duration }}</td></tr>
        <tr><th>Evolution</th><td>{{ $assesment->evolution }}</td></tr>
        <tr><th>Symptoms</th><td>{{ $assesment->symptoms }}</td></tr>
        <tr><th>Bleeding</th><td>{{ $assesment->bleeding }}</td></tr>
        <tr><th>Itching</th><td>{{ $assesment->itching }}</td></tr>
    </table>

    <div class="section-title">📊 Diagnosis Result</div>
    <table class="table table-bordered table-sm">
        <tr><th>Result</th><td>{{ $diagnosisResult->result }}</td></tr>
        <tr><th>Confidence</th><td>{{ $diagnosisResult->confidence }}%</td></tr>
    </table>

    <div class="section-title">👨‍⚕️ Doctor Info</div>
    <table class="table table-bordered table-sm">
        <tr><th>Doctor Name</th><td>{{ $user->name }}</td></tr>
        <tr><th>Email</th><td>{{ $user->email }}</td></tr>
    </table>

    <div class="section-title">📈 Model Training Chart</div>
    <p class="mb-2">Below is a performance graph based on training data:</p>
    <div class="text-center">
        {{-- Agar chart rasm bo‘lsa, uni base64 yoki public_path orqali joylashtiring --}}
        <img src="{{ public_path('images/chart.png') }}" class="img-preview" alt="Chart">
    </div>

</body>
</html>
