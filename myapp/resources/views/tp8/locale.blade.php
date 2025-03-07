<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi Lang Laravel 11</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>@lang('messages.title')</h1>

        <div class="mt-3">
            <a href="{{ url('locale/en') }}" class="btn btn-primary">🇬🇧 English</a>
            <a href="{{ url('locale/fr') }}" class="btn btn-secondary">🇫🇷 Français</a>
            <a href="{{ url('locale/ar') }}" class="btn btn-success">🇸🇦 العربية</a>
        </div>
    </div>
</body>

</html>