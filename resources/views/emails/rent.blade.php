@component('mail::message')
# Hello {{$owner->name}},

{{$user->name}} has asked  to rent your book number {{$book->id}} under the title {{$book->title}}.
@component('mail::button', ['url' => 'http://'.$address.'/confirmRent/?user='.$user->id])
Confirm
@endcomponent

@component('mail::button', ['url' => 'http://'.$address.'/declineRent/?user='.$user->id])
Decline
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
