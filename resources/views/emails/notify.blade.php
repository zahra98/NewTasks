@component('mail::message')
# Hello there,

We would like to remind you that your most recent rent for the book {{$book->title}} has reached to its end.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
