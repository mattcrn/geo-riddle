<div>
    @isset($riddles)
        <ul>
            @foreach ($riddles as $riddle)
            <li>{{ $riddle->id }}</li>
            @endforeach
        </ul>
    @endisset
</div>