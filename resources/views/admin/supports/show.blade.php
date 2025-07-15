<h1>Detalhes da dúvida {{ $data->id }}</h1>

<ul>
    <li>Assunto: {{ $data->subject }}</li>
    <li>Status: {{ $data->status }}</li>
    <li>Descrição: {{ $data->body }}</li>
</ul>

<form action="{{ route('supports.destroy', $data->id) }}" method="post">
	@csrf
	@method('DELETE')
	<button type="submit">Deletar</button>
</form>
