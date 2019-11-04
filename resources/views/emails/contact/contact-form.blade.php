@component('mail::message')

# You just got a new mail from "Contact form".


It was sent by **{{$data['name']}}**, email **{{$data['email']}}** and phone number **{{$data['phone']}}**.
Here is what thue user said:

**_{{$data['message']}}_**

Congrats,<br>
{{ config('app.name') }}

@endcomponent
