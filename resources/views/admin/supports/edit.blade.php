<h1>Dúvida {{ $data->id }}</h1>

<form action="{{ route("supports.update", $data->id) }}" method="POST">
    {{-- <input type="hidden" value="{{ csrf_token() }}" name="_token"> --}}
    @csrf
    @method("put")
    <input type="text" placeholder="Assunto" name="subject" value="{{ $data->subject }}">
    <textarea name="body" cols="30" rows="5" placeholder="Descrição">{{ $data->body }}</textarea>
    <button type="submit">Enviar</button>
</form>
