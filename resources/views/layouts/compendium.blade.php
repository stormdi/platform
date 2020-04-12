<div class="row py-3">
    <div class="col">
        <p class="font-bold text-black mb-2">General</p>
        @foreach($list as $key => $value)
            <dl>
                <dt>{{ $key }}</dt>
                <dd>{{ $value }}</dd>
            </dl>
        @endforeach
    </div>
</div>
