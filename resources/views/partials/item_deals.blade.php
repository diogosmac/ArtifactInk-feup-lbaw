@if (isset($data['items']) && isset($data['prices']) && isset($data['pictures']))
    @if (count($data['items']) >= 4)
    <div class="my-4 mx-auto d-flex flex-column justify-content-center" style="max-width: 65em;">
        <div class="mx-3 mx-sm-5 mx-lg-3 d-flex justify-content-between align-items-end">
            <h1 class="my-1"> {{$data['title']}} </h1>
            <a class="a_link my-1" href="{{ url('/' . $data['slug']) }}">View all</a>
        </div>
        <div class="container justify-content-center">
            <div class="row">
                @for ($i = 0; $i < 4; $i++)
                    <?php
                        $item = $data['items'][$i];
                        $price = $data['prices'][$i];
                        $picture = $data['pictures'][$i];
                    ?>
                    <div class="p-0 col-12 col-sm-6 col-lg-3 d-flex justify-content-center">
                        @include('partials.item.item_card', [
                            'item' => $item, 
                            'price' => $price, 
                            'picture' => $picture])
                    </div>
                @endfor
            </div>
        </div>
    </div>
    @endif
@endif
