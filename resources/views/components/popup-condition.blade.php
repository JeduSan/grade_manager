@if (session()->has('success'))
    <x-pop-up>
        <x-slot:type>
            Success
        </x-slot:type>
        {!! session()->get('success') !!}
    </x-pop-up>

    @php
        session()->forget('success');
    @endphp
@elseif (session()->has('failure'))
    <x-pop-up>
        <x-slot:type>
            Failure
        </x-slot:type>
        {!! session()->get('failure') !!}
    </x-pop-up>

    @php
        session()->forget('failure');
    @endphp
@endif
