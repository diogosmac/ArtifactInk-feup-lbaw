@php
  $keys = array_keys((array) $card);
  $values = array_values((array) $card);
@endphp
<div class="col-lg-3 col-md-6 col-sm-6 py-2">
  <div class="card text-center">
    <div class="card-body">
      <h4 class="card-title">{{ $values[0] }}</h4>
      <table class="table table-sm mb-0">
        <tbody>
          @foreach((array)$card as $key => $value)
          @continue($loop->first)
          <tr>
            <td scope="row">{{ $key }}</td>
            <td>{{ $value }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>