@component('mail::message')
# Nova candidatura

<table class="table-panel">
    <tr>
        <td>Vaga:</td>
        <td>{{ $vaga->titulo }}</td>
    </tr>
    <tr>
        <td>Empresa:</td>
        <td>{{ $vaga->empresa ?? '- Não informada -' }}</td>
    </tr>
    <tr>
        <td>Candidato:</td>
        <td>{{ $pessoa->nome }}</td>
    </tr>
    <tr>
        <td>Telefones:</td>
        <td>{{ $pessoa->telefone1 . ' / ' . $pessoa->telefone2 }}</td>
    </tr>
</table>
<br>
<br>

Atenciosamente,<br>
{{ config('app.name') }}
@endcomponent
