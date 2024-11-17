@props([
    'action',
    'post' => false,
    'put' => false,
    'delete' => false,
])

<form method="post" action="{{ $action }}">
    @csrf

    @if($put)
        @method('PUT')
    @endif
    @if($delete)
        @method('DELETE')
    @endif

    {{ $slot }}
</form>
