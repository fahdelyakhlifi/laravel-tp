<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/6.6.6/css/flag-icons.min.css" rel="stylesheet">
    <title>@yield('title')</title>

    <style>
        /* Styles pour les drapeaux */
        .fi {
            width: 24px;
            height: 18px;
            margin-right: 8px;
            border: 1px solid #ddd;
            border-radius: 3px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Ajustement pour RTL */
        [dir="rtl"] .fi {
            margin-right: 0;
            margin-left: 8px;
        }

        /* Styles spécifiques pour RTL */
        [dir="rtl"] .text-start {
            text-align: right;
        }

        [dir="rtl"] .flex-row-reverse {
            flex-direction: row-reverse;
        }

        [dir="rtl"] .ml-2 {
            margin-left: 0;
            margin-right: 0.5rem;
        }

        [dir="rtl"] .mr-2 {
            margin-right: 0;
            margin-left: 0.5rem;
        }

        /* Styles spécifiques pour LTR */
        [dir="ltr"] .text-start {
            text-align: left;
        }

        [dir="ltr"] .flex-row {
            flex-direction: row;
        }
    </style>
</head>

<body class="text-gray-800 bg-gray-100">
    <div class="container p-4 mx-auto">
        <p class="mb-4 text-sm">@lang('messages.current_language'): {{ app()->getLocale() }}</p>

        <!-- Sélecteur de langue personnalisé avec icônes de drapeaux -->
        <form action="{{ url('change-language') }}" method="GET" class="mb-6">
            <div
                class="flex space-x-4 {{ app()->getLocale() == 'ar' ? 'flex-row-reverse' : 'flex-row' }} {{ app()->getLocale() == 'ar' ? 'justify-end' : 'justify-start' }}">
                <!-- Option Français -->
                <label class="flex items-center p-2 border border-gray-300 rounded cursor-pointer hover:bg-gray-200">
                    <input type="radio" name="lang" value="fr" {{ app()->getLocale() == 'fr' ? 'checked' : '' }}
                        class="hidden" onchange="this.form.submit()">
                    <span class="fi fi-fr"></span> Français
                </label>

                <!-- Option English -->
                <label class="flex items-center p-2 border border-gray-300 rounded cursor-pointer hover:bg-gray-200">
                    <input type="radio" name="lang" value="en" {{ app()->getLocale() == 'en' ? 'checked' : '' }}
                        class="hidden" onchange="this.form.submit()">
                    <span class="fi fi-gb"></span> English
                </label>

                <!-- Option العربية -->
                <label class="flex items-center p-2 border border-gray-300 rounded cursor-pointer hover:bg-gray-200">
                    <input type="radio" name="lang" value="ar" {{ app()->getLocale() == 'ar' ? 'checked' : '' }}
                        class="hidden" onchange="this.form.submit()">
                    <span class="fi fi-sa"></span> العربية
                </label>
            </div>
        </form>

        @yield('content')
    </div>
</body>

</html>