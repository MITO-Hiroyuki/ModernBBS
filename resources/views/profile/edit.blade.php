@extends('layouts.app')
@section('title', 'プロフィールの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール編集</h2>
                <form action="{{ action('ProfileController@update',['id' => $profile->id]) }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="row">
                        <label class="col-md-2">誕生日</label>
                            <div class="col-md-10">
                                <select name="birth_year">
                                    <option value="">--</option>
                                        @foreach(range(2000,2020) as $year)
                                            <option>{{ $year }}</option>
                                        @endforeach
                                </select>
                                <span>年</span>
                                <select name="birth_month">
                                    <option value="">--</option>
                                        @foreach(range(1,12) as $month)
                                        <option value="{{ str_pad($month,2,0,STR_PAD_LEFT) }}">{{ $month }}</option>
                                        @endforeach
                                </select>
                                <span>月</span>
                                <select name="birth_day">
                                    <option value="">--</option>
                                        @foreach(range(1,31) as $day)
                                        <option value="{{ str_pad($day,2,0,STR_PAD_LEFT) }}">{{ $day }}</option>
                                        @endforeach
                                </select>
                                <span>日</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="gender">性別</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="gender" value="{{ $profile->gender }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="hobby">趣味</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="hobby" value="{{ $profile->hobby }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="introduction">自己紹介</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="20">{{ $profile->introduction }}</textarea>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection