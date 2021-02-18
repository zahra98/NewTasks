@component('mail::message')
# Hello {{$owner->name}},

{{$user->name}} has {{$address}} asked to rent your book number {{$book->id}} under the title {{$book->title}}.

@component('mail::button', ['url' => 'http://127.0.0.1:8000/confirmRent/?user='.$user->id])
Confirm
@endcomponent

@component('mail::button', ['url' => 'http://127.0.0.1:8000/declineRent/?user='.$user->id])
Decline
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
