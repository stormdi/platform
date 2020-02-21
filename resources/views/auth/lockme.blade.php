<div class="form-group v-center">
    <span class="thumb-sm avatar mr-3">
        <img src="{{ $lockUser->getAvatar() }}" class="b bg-light" alt="test">
    </span>
    <span style="width:125px;font-size: 0.85em;">
        <span class="text-ellipsis">{{ $lockUser->getNameTitle() }}</span>
        <span class="text-muted d-block text-ellipsis">{{ $lockUser->getSubTitle() }}</span>
    </span>
    <input type="hidden" name="email" required value="{{ $lockUser->email }}">
</div>

@error('email')
    <span class="d-block invalid-feedback text-danger">
            {{ $errors->first('email') }}
    </span>
@enderror

<div class="form-group">
    <label class="form-label w-full">
        {{__('Password')}}
        <a href="{{ route('platform.password.request') }}" class="float-right small">{{__('Forgot your password?')}}</a>
    </label>

    {!!  \Orchid\Screen\Fields\Password::make('password')
        ->required()
        ->placeholder(__('Enter your password'))
    !!}
</div>

<div class="row">
    <div class="form-group col-md-6 col-xs-12">
        <a href="{{ route('platform.login.lock') }}" class="small">
            {{__('Sign in with another user.')}}
        </a>
    </div>
    <div class="form-group col-md-6 col-xs-12">
        <button id="button-login" type="submit" class="btn btn-default btn-block">
            <i class="icon-login text-xs mr-2"></i> {{__('Login')}}
        </button>
    </div>
</div>
