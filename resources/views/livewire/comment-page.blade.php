<div class="jumbotron" style="background:none">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
            <button class="btn btn-primary" wire:click="check" >Click</button>
                <h3 class="font-weight-bold">Comment Section</h3>
                <small>{{ $authUser }}</small>
                <hr>
                <form wire:submit.prevent="addComment">
                    <div class="row">

                        <div class="col-md-10">
                            <div class="form-group">
                                <input id="my-input" class="form-control @error('commentBox') is-invalid @enderror" type="text" name="commentBox" wire:model="commentBox" placeholder="What's in your mind.">
                                
                                @if(session()->has('success'))
                                <div class="alert alert-dismissible disappear-alert" id="alert" role="alert">
                                    <strong class="text-success">{{ session('success') }}</strong>
                                </div>        
                                
                                @endif
                                @if(session()->has('unauth'))
                                <div class="text-danger disappear-alert" role="alert" id="alert">
                                    <strong>{{ session('unauth') }}</strong>
                                </div>        
                                @endif

                                @if(session()->has('removed'))
                                <div class="text-success disappear-alert" role="alert" id="alert">
                                    <strong>{{ session('removed') }}</strong>
                                </div>        
                                @endif
                                
                                @if(session()->has('error'))
                                <div class="text-danger disappear-alert" role="alert" id="alert">
                                    <strong>{{ session('error') }}</strong>
                                </div>        
                                @endif


                                @error('commentBox')
                                <span class="text-danger invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>        
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit" >Add</button>
                            </div>
                        </div>
                    </div>
                </form>
                <hr>
                <ul class="list-group" wire:poll.2000ms>

                    {{-- render comments --}}
                    @if (count($allComments) > 0)
                        @foreach ($allComments as $cmt)
                        <li class="list-group-item" aria-disabled="true">
                            <h5 class="close text-danger" data-toggle="tooltip" data-placement="top" title="Remove Comment" style="cursor: pointer" wire:click="removeComment({{ $cmt->id }})">&times;</h5>
                            <span class="font-weight-bold" style="font-size: 1.2em">{{ ucfirst($cmt->title) }}</span>
                            
                            <br>
                            <span class="p-1 text-muted">- {{ucfirst($cmt->users->name) }}</span><br>
                            <small class="p-1 text-muted">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($cmt->created_at))->diffForHumans()  }}</small>
                        </li>  
                        @endforeach    

                        {{-- print total --}}
                        {{ count($allComments) }}
                    @else    
                        <li class="list-group-item bg-warning text-light">
                            Empty! 
                        </li>
                    @endif
                    
                </ul>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
            $('[data-toggle="tooltip"]').tooltip();       
    });

</script>
<script>
        // Echo.private('messageChannel')
        //     .listen('messageEvent',(e) => {
        //             console.log(e);
        //     });
</script>