<!DOCTYPE html>
<html>
<head>
    <title>Gerador de QR Code</title>
</head>
<body>
    <h1>QR Code Gerado</h1>

    @if(isset($qrCodePath))
        <img src="{{ $qrCodePath }}" alt="QR Code">
    @endif
</body>
</html>
