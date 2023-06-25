@extends('auth.layouts')

@section('content')
    <h1 class="is-size-1-desktop">Create FOO</h1>
    <form method="POST" action="{{route('foos.store')}}" style="margin: 20px">
        @csrf
        <p class="is-bold">Fields labeled with <span style="color: red">*</span> are required</p>
        <div class="field">
            <label class="is-bold" for="mark"><span style="color: red">*</span>Bar</label>

            <div>
                <input class="input text
                @error('mark') is-danger @enderror"
                       type="text"
                       name="bar"
                       id="bar"
                       value="{{old('bar')}}"
                >

                @if($errors->has('bar'))
                    <p id="errorText" class="help is-danger">{{$errors -> first('mark')}}</p>
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
                       value="{{old('happiness')}}"
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
