test

@foreach ($tests as $test)
    <p>No. {{ $test->id }} , {{ $test->text }}</p>
@endforeach