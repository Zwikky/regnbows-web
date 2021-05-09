@component('mail::message')
Hello **Admin**,
{{-- use double space for line break --}}
A new business has been created by **{{$email_data['owner']}}** with the name **{{$email_data['business']}}**. It is
waiting
for your approval.

Click below to view more details
@component('mail::button', ['url' => $link])
Approve New Business
@endcomponent
Sincerely, {{-- --}}

Regnbows Market.
@endcomponent