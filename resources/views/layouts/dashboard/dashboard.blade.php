@props(['dir'])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ $dir ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <title>{{ env('APP_NAME') }} | Responsive Bootstrap 5 Admin Dashboard Template</title>

    @include('partials.dashboard._head')
</head>

<body class="">
    @include('partials.dashboard._body')
</body>

<script>
    function dropdown(url, targetClass, dropdownParentId, placeholder) {

        console.log(typeof $, $('.' + targetClass).css({
            background: 'red'
        }))

        $('.' + targetClass).select2({
            dropdownParent: $('#' + dropdownParentId),
            placeholder,
            ajax: {
                url: url,
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });
    }
</script>

</html>
