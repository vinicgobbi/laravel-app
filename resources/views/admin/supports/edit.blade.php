<h1>Dúvida {{ $data->id }}</h1>

<x-alert></x-alert>

<form action="{{ route("supports.update", $data->id) }}" method="POST">
    @method("put")
    @include('admin.supports.partials.form', [
        'support'=> $data
    ])
</form>
