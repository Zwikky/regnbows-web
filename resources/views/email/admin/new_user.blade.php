@component('mail::message')
Hello **Admin**,
{{-- use double space for line break --}}
A new user has registered. The name is **{{$email_data['name']}}** and email is **{{$email_data['email']}}**. Your
approval is required.

Click below to view more details
@component('mail::button', ['url' => $link])
Approve New User
@endcomponent
Sincerely, {{-- --}}

Regnbows Market.
@endcomponent