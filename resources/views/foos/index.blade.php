@extends('auth.layouts')

@section('content')
        <h1 class="is-size-1-desktop">Foos</h1>
        @if (session('status'))
            <div class="notification is-success is-light">
                <button class="delete"></button>
                <script src="delButton.js"></script>
                {{ session('status') }}
            </div>
        @endif
        @if (session('delete'))
            <div class="notification is-danger is-light">
                <button class="delete"></button>
                <script src="delButton.js"></script>
                {{ session('delete') }}
            </div>
        @endif

        <a class="button is-success " href="{{route("foos.create")}}">Create</a>
        <table class="table">
            <thead>
            <th>
                Index
            </th>
            <th>
                Bar
            </th>
            <th>
                Happiness
            </th>
            </thead>
            <tbody>
            @foreach($foos as $foo)
                <tr class="@if($foo->isHappy()) is-success @endif">
                    <td>
                        {{$foo->id}}
                    </td>
                    <td>
                        {{$foo->bar}}
                    </td>
                    <td>
                        {{$foo->happiness}}
                    </td>
                    <td>
                        <a href="{{route('foos.edit', $foo)}}" class="button">Edit</a>
                    </td>
                    <td>
                        <form method="POST" action="{{route('foos.destroy', $foo)}}">
                            @csrf
                            @method('DELETE')
                            <button class="button  is-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
@endsection
