@extends('backend.layouts.app')

@section('page_title') Все транзакции @endsection

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

        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success')}}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Все транзакции</h3>
            </div>

            <div class="card-body">
                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">

                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                                <thead>
                                    <tr>
                                        <th class="sorting sorting_desc" rowspan="1" >Имя</th>
                                        <th class="sorting" rowspan="1" >Телефон</th>
                                        <th class="sorting" rowspan="1" >E-mail</th>
                                        <th class="sorting" rowspan="1" >Цена(руб)</th>
                                        <th class="sorting" rowspan="1" >Статус</th>
                                        <th class="sorting" rowspan="1" >Дата</th>
                                        <th class="sorting" rowspan="1" >Действие</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($transactions)
                                        @foreach ($transactions as $transaction)
                                            <tr class="{{ $loop->odd ? 'odd' : 'even' }}">
                                                <td class="dtr-control sorting_1">{{ $transaction->name }}</td>
                                                <td class="dtr-control sorting_1">{{ $transaction->phone }}</td>
                                                <td class="dtr-control sorting_1">{{ $transaction->email }}</td>
                                                <td class="dtr-control sorting_1">{{ $transaction->price }}</td>
                                                <td class="dtr-control sorting_1">{{ $transaction->description ? $transaction->description : 'Ожидание оплаты/истекло время' }}</td>
                                                <td class="dtr-control sorting_1">{{ $transaction->updated_at }}</td>

                                                <td>
                                                    <div class="table-action">
{{--                                                        <a href="{{ route('admin.excursion.schedule.index', ['id' => $transaction->id]) }}"  class="btn btn-block btn-outline-primary table-action__btn-edit"><i class="fas fa-calendar-alt"></i></a>--}}
                                                        <form action="{{ route('admin.transaction.delete') }}" class="delete-route" method="POST">
                                                            @CSRF
                                                            <input type="hidden" name="id" value="{{ $transaction->id }}">
                                                            <button type="submit" class="delete-btn btn btn-block btn-outline-danger table-action__btn-delete"><i class="nav-icon far fa-trash-alt"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            {{ $transactions->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection


@section('custom_script')
    <script>
        let deleteBtns = document.querySelectorAll('.table-action__btn-delete');

        deleteBtns.forEach(link => {
            link.addEventListener('click', e => {
                e.preventDefault()
                let form = e.currentTarget.closest('.delete-route');
                let question = confirm('Вы действительно хотите удалить ?');
                if(question) {
                    form.submit()
                }
            })
        })
    </script>
@endsection
