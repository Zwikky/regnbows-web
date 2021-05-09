@component('mail::message')
Hello **Admin**,
{{-- use double space for line break --}}
A new advert has been created by **{{$email_data['owner']}}** titled **{{$email_data['advert']}}**. It is
waiting
for your approval.

Click below to view more details
@component('mail::button', ['url' => $link])
Approve New Advert
@endcomponent
Sincerely, {{-- --}}

Regnbows Market.
@endcomponent