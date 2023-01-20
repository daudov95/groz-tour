@extends('frontend.layouts.layout')

<style>
    .details-info__value {
        width: 100%;
        margin-bottom: 10px;
        display: inline-block;
    }
    .details-info__value:hover {
        color: #000;
    }

</style>

@section('content')
    <section class="section details">
        <div class="container">
            <div class="details__wrap">

                <h1 class="page-title">Законодательство</h1>

                <div class="details-info">
                    <a href="{{ asset('storage/documents/file_1.pdf') }}" class="details-info__value">Федеральный закон о социальной защие инвалидов в Российской Федерации</a>
                    <a href="{{ asset('storage/documents/file_2.pdf') }}" class="details-info__value">Федеральный закон о контрактной системе в сфере закупок товаров</a>
                    <a href="{{ asset('storage/documents/file_3.rtf') }}" class="details-info__value">Федеральный закон о некоммерческих организациях</a>
                </div>
            </div>
        </div>

    </section>
@endsection
