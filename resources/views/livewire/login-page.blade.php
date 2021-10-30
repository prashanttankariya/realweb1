<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <br><br>
            <div class="border">
                <div class="card-header"><h4>{{ __('Its Login Time!') }}</h4></div>

                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible" role="alert" id="alert">
                            <a class="close" data-dismiss="alert">&times;</a>
                            {{ session('success') }}
                        </div>    
                    @endif

                    @if (session()->has('error'))
                        <div class="alert alert-danger alert-dismissible" role="alert" id="alert">
                            <a class="close" data-dismiss="alert">&times;</a>
                            <span class="text-light">{{ session('error') }}</span>
                        </div>    
                    @endif

                    <form wire:submit.prevent="loginUser">
                        @csrf
                        
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('form.email') is-invalid @enderror" name="email" wire:model="form.email">

                                @error('form.email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('form.password') is-invalid @enderror" name="password" wire:model="form.password">

                                @error('form.password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
