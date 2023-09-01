@component('mail::message')
# Welcome,{{$admin->name}}

Thank you for your support and registration
@component('mail::panel')
    To access CMS your password is  ( {{$password}} ) <br>
     click on below button.
@endcomponent

@component('mail::button', ['url' => 'http://127.0.0.1:8000/cms/admin/login','color'=>'success'])
CMS Login
@endcomponent

{{-- @component('mail::table')
| producte | Quantity | Total |
|:------------- |:-------------:|:--------:|
| Burger | 2 | $30 |
| pizza | 3 | $50 |
|cola |1 |10$
@endcomponent --}}
Thanks,<br>
{{ config('app.name') }}
@endcomponent
