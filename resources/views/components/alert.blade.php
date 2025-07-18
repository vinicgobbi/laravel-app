<div>
   @if ($errors->any())
	    @foreach ($errors->all() as $error) 
		    {{ $error }}{{-- Imprime os erros de validação na tela --}}
	    @endforeach
    @endif
</div>