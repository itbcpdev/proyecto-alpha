<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Alpha</title>
    <link href="{{ asset('web/assets/style.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

    <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
    <meta name="description" content="Favorece tu silueta. Con prendas y colores que te harán lucir increíble.">
</head>

<body>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <link rel="stylesheet"
    href="{{ asset('web/lib/multiselect/css/mobiscroll.jquery.min.css')}}" />


    <div id="app">
        <test-subcription></test-subcription>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <style>
        button {
        display: inline-block;
        margin: 5px 5px 0 0;
        padding: 10px 30px;
        outline: 0;
        border: 0;
        cursor: pointer;
        color: #fff;
        text-decoration: none;
        font-family: arial, verdana, sans-serif;
        font-size: 14px;
        font-weight: 100;
    }

    input {
        width: 100%;
        margin: 0 0 5px 0;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 0;
        font-family: arial, verdana, sans-serif;
        font-size: 14px;
        box-sizing: border-box;
        -webkit-appearance: none;
    }
    input[type='checkbox'] {
        width: initial !important;
        -webkit-appearance:inner-spin-button !important;
    }
    .mbsc-ios.mbsc-page {
        background: none;
    }
    .mbsc-page {
        padding: 1em;
    }
    label.mbsc-ios.mbsc-textfield-wrapper-outline{
        max-width: 300px;
        margin: 0 auto;
    }
    .mbsc-ios.mbsc-select, .mbsc-ios.mbsc-textarea-inner.mbsc-textfield-inner-box, .mbsc-ios.mbsc-textarea-inner.mbsc-textfield-inner-outline {
        background: #e0e0e0;
    }
    </style>
    <script src="{{ asset('web/lib/multiselect/js/mobiscroll.jquery.min.js')}}"></script>
    <script>
        mobiscroll.setOptions({
            locale: mobiscroll.localeEs,                                             // Specify language like: locale: mobiscroll.localePl or omit setting to use default
            theme: 'ios',                                                            // Specify theme like: theme: 'ios' or omit setting to use default
            themeVariant: 'light'                                                // More info about themeVariant: https://docs.mobiscroll.com/5-19-2/select#opt-themeVariant
        });

        $(function () {
            // Mobiscroll Select initialization
            $('#inpRrss').mobiscroll().select({
                inputElement: document.getElementById('inpRrss-input')  // More info about inputElement: https://docs.mobiscroll.com/5-19-2/select#opt-inputElement
            });
            $('#inpAmbientes').mobiscroll().select({
                inputElement: document.getElementById('inpAmbientes-input')  // More info about inputElement: https://docs.mobiscroll.com/5-19-2/select#opt-inputElement
            });
        });
   </script>
</body>

</html>
