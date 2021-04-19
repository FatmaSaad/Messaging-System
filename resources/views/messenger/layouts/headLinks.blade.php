{{-- Meta tags --}}
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="route" content="{{ $route }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="url" content="{{ url('').'/'.'chat' }}" data-user="{{ Auth::user()->id }}">
<style>
    .tooltip.shown {
        opacity: 1 !important;
        position: fixed !important;
        top: -450px !important;
    }

    .tooltip:not(.shown) {
        display: none;
    }

    emoji-picker {
        --emoji-size: 1.5rem;
        --button-active-background:{{ $messengerColor }};
    }

</style>
{{-- scripts --}}
<script src="{{asset('assets/js/font.awesome.min.js') }}"></script>
<script src="{{asset('assets/js/autosize.js') }}"></script>
<script src="{{asset('js/app.js') }}"></script>
<script src='https://unpkg.com/nprogress@0.2.0/nprogress.js'></script>

<script type="module" src="https://cdn.jsdelivr.net/npm/emoji-picker-element@^1/index.js"></script>

{{-- styles --}}
<link rel='stylesheet' href='https://unpkg.com/nprogress@0.2.0/nprogress.css' />
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/'.$dark_mode.'.mode.css') }}" rel="stylesheet" />
<link href="{{ asset('css/app.css') }}" rel="stylesheet" />

{{-- Messenger Color Style--}}

@include('messenger.layouts.messengerColor')