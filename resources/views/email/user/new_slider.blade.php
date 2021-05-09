@component('mail::message')
Hello **Admin**,
{{-- use double space for line break --}}
A new slider has been created by **{{$email_data['owner']}}** titled **{{$email_data['slider']}}**. It is
waiting
for your approval.

Click below to view more details
@component('mail::button', ['url' => $link])
Approve New Slider
@endcomponent
Sincerely, {{-- --}}

Regnbows Market.
@endcomponent