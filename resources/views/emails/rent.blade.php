@component('mail::message')
# Hello {{$owner->name}},

{{$user->name}} has asked to rent your book number {{$book->id}} under the title {{$book->title}}.

@component('mail::button', ['url' => ''])
Confirm
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
