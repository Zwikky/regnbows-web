@component('mail::message')
Hello **Admin**,
{{-- use double space for line break --}}
A new advert has been created by **Lucky Kunene** for **Thelumoya Guest House**. It is waiting for your approval.

Click below to view more details
@component('mail::button', ['url' => $link])
View Advert
@endcomponent
Sincerely, {{-- --}}

Regnbows Market.
@endcomponent