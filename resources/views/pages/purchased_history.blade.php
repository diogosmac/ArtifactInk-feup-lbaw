@extends('layouts.profile')

@section('info')
<div class="tab-pane fade" id="v-pills-history" role="tabpanel" aria-labelledby="v-pills-history-tab">
    <section id="history">
            @include('partials.historyItem')
            @include('partials.historyItem')
            @include('partials.historyItem')
    </section>
</div>
@endsection