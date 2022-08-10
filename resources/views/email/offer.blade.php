@component('mail::message')
# New Offer
# 20% flat discount!

It applies on all products, click on the below button to see all offers

@component('mail::button', ['url' => "http://127.0.0.1:8000/email/offer", 'color' => 'success'])
View Order Click
@endcomponent

@component('mail::panel')
New Product arrive daily
@endcomponent

@component('mail::table')
| Laravel       | Table         | Example  |
| ------------- |:-------------:| --------:|
| Col 2 is      | Centered      | $10      |
| Col 3 is      | Right-Aligned | $20      |
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
