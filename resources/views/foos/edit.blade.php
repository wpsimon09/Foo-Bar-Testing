@extends('auth.layouts')

    @section('content')
        <h1 class="is-size-1-desktop">Edit foo number {{$foo->number}}</h1>
        <form method="POST" action="{{route('foos.update', $foo)}}" style="margin: 20px">
            @csrf
            @method('PUT')
            <p class="is-bold">Fields labeled with <span style="color: red">*</span> are required</p>
            <div class="field">
                <label class="is-bold" for="mark"><span style="color: red">*</span>Mark</label>

                <div>
                    <input class="input text
                @error('mark') is-danger @enderror"
                           type="text"
                           name="bar"
                           id="bar"
                           value="{{$foo->bar}}"
                    >

                    @if($errors->has('bar'))
                        <p id="errorText" class="help is-danger">{{$errors -> first('bar')}}</p>
                    @endif
                </div>
            </div>
            <br>
            <div class="field">
                <label class="is-bold" for="mark"><span style="color: red">*</span>Happiness</label>

                <div>
                    <input class="input number
                @error('mark') is-danger @enderror"
                           type="number"
                           name="happiness"
                           id="happiness"
                           value="{{$foo->happiness}}"
                    >

                    @if($errors->has('happiness'))
                        <p id="errorText" class="help is-danger">{{$errors -> first('happiness')}}</p>
                    @endif
                </div>
            </div>
            <div>
                <button class="button" type="submit">Submit</button>
            </div>
            <br>
            <a class="button is-danger" href="{{route('foos.index')}}">
                Cancel
            </a>

        </form>

@endsection
