<div class="toast-wrapper" data-controller="layouts--toast">
    <template id="toast">
        <div class="toast"
             role="alert"
             aria-live="assertive"
             aria-atomic="true"
             data-delay="5000"
             data-autohide="true">
            <div class="toast-body p-3 bg-light">
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <p class="mb-0">
                    <span class="circle text-{type} mr-2">
                    {!! \Orchid\Support\Facades\Dashboard::icon('circle') !!}
                    </span>

                    {message}</p>
            </div>
        </div>
    </template>


    @if (session()->has(\Orchid\Alert\Toast::SESSION_MESSAGE))
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true"
             data-delay="{{ session(\Orchid\Alert\Toast::SESSION_DELAY) }}"
             data-autohide="{{ session(\Orchid\Alert\Toast::SESSION_AUTO_HIDE) }}">
            <div class="toast-body p-3 bg-light">
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <p class="mb-0">
                    <span class="circle text-{{ session(\Orchid\Alert\Toast::SESSION_LEVEL) }} mr-2">
                        {!! \Orchid\Support\Facades\Dashboard::icon('circle') !!}
                    </span>
                    {{ session(\Orchid\Alert\Toast::SESSION_MESSAGE) }}
                </p>
            </div>
        </div>
    @endif

</div>


