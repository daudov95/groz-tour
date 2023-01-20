@extends('backend.layouts.app')


@section('page_title') Создание экскурсии @endsection


@section('content')

<style>
    .table-action {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .table-action__btn-edit {
        width: 50px;
    }
    .table-action__btn-delete {
        width: 50px;
        margin-top: 0 !important;
        margin-left: 10px;
    }
</style>


<div class="row">
    <div class="col-12">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="margin-bottom: 0px">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success')}}
            </div>
        @endif

        <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title">Создание экскурсии</h3>
            </div>


            <form method="POST" action="{{ route('admin.excursion.store') }}" enctype="multipart/form-data">
                @CSRF
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Заголовок</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Заголовок поста">
                    </div>
                    <div class="form-group">
                        <label for="summernote">Описание</label>
                        <textarea id="summernote" class="summernote" name="description" style="display: none;">{{ old('description') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="price">Цена</label>
                        <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}" placeholder="Заголовок поста">
                    </div>

                    <div class="form-group">
                        <label for="duration">Продолжительность</label>
                        <input type="text" class="form-control" id="duration" name="duration" value="{{ old('duration') }}" placeholder="Заголовок поста">
                    </div>

                    <div class="form-group">
                        <label for="age">Допустимый возраст</label>
                        <input type="text" class="form-control" id="age" name="age" value="{{ old('age') }}" placeholder="Заголовок поста">
                    </div>

                    <div class="form-group">
                        <label for="place">Места показа</label>
                        <input type="text" class="form-control" id="place" name="place" value="{{ old('place') }}" placeholder="Заголовок поста">
                    </div>

                    <div class="form-group">
                        <label for="summernote2">Программа тура</label>
                        <textarea id="summernote2" class="summernote" name="program" style="display: none;">{{ old('program') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="including">В стоимость тура включено (Перечислить через ;)</label>
                        <input type="text" class="form-control" id="including" name="including" value="{{ old('including') }}" placeholder="Заголовок поста">
                    </div>



                    <div class="form-group">
                        <label for="picture">Картинки (Формат: jpg, png)</label>
                        <div class="input-group">
                            <div class="custom-files">
                                <input type="file" name="images[]" multiple id="picture">
                            </div>
                        </div>
                    </div>


                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Создать</button>
                </div>
            </form>
        </div>

    </div>
</div>


@endsection
