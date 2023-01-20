@extends('backend.layouts.app')


@section('page_title') Изменение экскурсии @endsection


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
            <h3 class="card-title">Изменение экскурсии</h3>
            </div>


            <form method="POST" action="{{ route('admin.excursion.update') }}" enctype="multipart/form-data">
                @CSRF
                <input type="hidden" name="id" value="{{ $excursion->id }}">
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Заголовок</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $excursion->title }}" placeholder="Заголовок поста">
                    </div>
                    <div class="form-group">
                        <label for="summernote">Описание</label>
                        <textarea id="summernote" class="summernote" name="description" style="display: none;">{{ $excursion->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="price">Цена</label>
                        <input type="text" class="form-control" id="price" name="price" value="{{ $excursion->price }}" placeholder="Заголовок поста">
                    </div>

                    <div class="form-group">
                        <label for="duration">Продолжительность</label>
                        <input type="text" class="form-control" id="duration" name="duration" value="{{ $excursion->duration }}" placeholder="Заголовок поста">
                    </div>

                    <div class="form-group">
                        <label for="age">Допустимый возраст</label>
                        <input type="text" class="form-control" id="age" name="age" value="{{ $excursion->age }}" placeholder="Заголовок поста">
                    </div>

                    <div class="form-group">
                        <label for="place">Места показа</label>
                        <input type="text" class="form-control" id="place" name="place" value="{{ $excursion->place }}" placeholder="Заголовок поста">
                    </div>

                    <div class="form-group">
                        <label for="summernote2">Программа тура</label>
                        <textarea id="summernote2" class="summernote" name="program" style="display: none;">{{ $excursion->program }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="including">В стоимость тура включено (Перечислить через ;)</label>
                        <input type="text" class="form-control" id="including" name="including" value="{{ $excursion->including }}" placeholder="Заголовок поста">
                    </div>


                    <div class="form-group">
                        <label for="picture">Картинки (Формат: jpg, png)</label>
                        <div class="input-group">
                            <div class="custom-files">
                                <input type="file" name="images[]" multiple id="picture">
                            </div>
                        </div>
                    </div>

                    @if(count($excursion->images))
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Прикрепленные картинки</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Имя</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($excursion->images as $image)
                                            <tr>
                                                <td>{{ $image->fileName }}</td>
                                                <td class="text-right py-0 align-middle">
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="{{ asset('storage/excursion'.$image->link) }}" target="_blank" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                        <a href="{{ route('admin.excursion.delete.image') }}" class="btn btn-danger delete-image" data-id="{{ $image->id }}"><i class="fas fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Обновить</button>
                </div>
            </form>
        </div>

    </div>
</div>


@endsection


@section('custom_script')
    <script>
        const deleteLinks = document.querySelectorAll('.delete-image');

        deleteLinks.forEach(link => {
            link.addEventListener('click', async (e) => {
                e.preventDefault()
                const csrf = "{{ csrf_token() }}";
                const link = e.currentTarget.href;
                const id = Number(e.currentTarget.dataset.id);

                try {
                    const response = await fetch(link, {
                        method: 'POST',
                        body: JSON.stringify({id: id}),
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrf
                        }
                    })

                    window.location.reload()
                }catch (e) {
                    console.log('error');
                }



            })
        })
    </script>
@endsection
