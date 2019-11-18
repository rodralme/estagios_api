@component('mail::message')
# Introduction

Houve uma candidatura para a vaga:

@component('mail::panel')
    {{ $vaga->titulo }}
@endcomponent

Atenciosamente,<br>
{{ config('app.name') }}
@endcomponent
